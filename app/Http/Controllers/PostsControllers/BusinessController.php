<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;

class BusinessController extends Controller
{

    public function index()
    {
        $business = Business::orderBy('created_at','desc')
        ->where('pending', 'false')
        ->paginate(1);
        return view('posts.businesses.index')->with('business', $business);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            return view('posts.businesses.create');
        }
        return redirect('/login')->with('success', 'Guests are unauthorized to perform that action, please login or register to promote your business.');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'pending' => 'required',
            'body' => 'required',
            'link' => 'nullable',
            'image' => 'required'
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);
        $fullName = auth()->user()->name . ' ' . auth()->user()->middle . '. ' . auth()->user()->lastname;
        $fullNameWithSuffix = auth()->user()->name . ' ' . auth()->user()->middle . '. ' . auth()->user()->lastname . ' ' . auth()->user()->suffix;

        $business = new Business;
        $business->title = $request->input('title');
        $business->subject = $request->input('subject');
        $business->pending = $request->input('pending');
        $business->body = $request->input('body');
        $business->link = $request->input('link');
        $business->image_path = $newImageName;
        $business->user_id = auth()->user()->id;
        $business->fullName = $fullName;
        $business->fullNameWithSuffix = $fullName;
        $business->save();

        return redirect('/businesses')->with('success', 'Business promotion requested.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $business = Business::find($id);
        return view('posts.businesses.show')->with('business', $business);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $business = Business::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.businesses.edit')->with('business', $business);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/businesses')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/businesses')->with('error', 'Guests are unauthorized to perform that action');
    }

    // UPDATE DATA BY ID
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required'
        ]);

        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $business = Business::find($id);
                $business->title = $request->input('title');
                $business->subject = $request->input('subject');
                $business->body = $request->input('body');
                $business->save();
                return redirect('/businesses')->with('success', 'Announcements has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/businesses')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/businesses')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $business = Business::find($id);
                $image = public_path().'/'.'images/'.$business->image_path;
                unlink($image);
                $business->delete();
                return redirect('/businesses')->with('success', 'Businesses has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/businesses')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/businesses')->with('error', 'Guests are unauthorized to perform that action');
    }

    public function pending(Request $request, $id){
        if (Auth::user()->admin == 1){
            $business = Business::find($id);
            $business->pending = 'false';
            $business->save();
            return redirect('/businesses')->with('success', 'Business promotion has been approved to website.');
        }
        else {
            return redirect('/businesses')->with('error', 'You are not authorized to perform that action.');
        }
    }

}
