<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EstablishmentsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $establishment = Establishment::orderBy('created_at','desc')
        ->where('pending', 'false')
        ->paginate(1);
        return view('posts.establishments.index')->with('establishment', $establishment);
    }
    
    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            return view('posts.establishments.create');
        }
        return redirect('/login')->with('success', 'Guests are unauthorized to perform that action, please login or register to promote your establishment.');
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

        $establishment = new Establishment;
        $establishment->title = $request->input('title');
        $establishment->subject = $request->input('subject');
        $establishment->pending = $request->input('pending');
        $establishment->body = $request->input('body');
        $establishment->link = $request->input('link');
        $establishment->image_path = $newImageName;
        $establishment->user_id = auth()->user()->id;
        $establishment->fullName = $fullName;
        $establishment->fullNameWithSuffix = $fullName;
        $establishment->save();

        return redirect('/establishments')->with('success', 'Establishments has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $establishment = Establishment::find($id);
        return view('posts.establishments.show')->with('establishment', $establishment);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $establishment = Establishment::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.establishments.edit')->with('establishment', $establishment);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/establishments')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/establishments')->with('error', 'Guests are unauthorized to perform that action');
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
                $establishment = Establishment::find($id);
                $establishment->title = $request->input('title');
                $establishment->subject = $request->input('subject');
                $establishment->body = $request->input('body');
                $establishment->save();
                return redirect('/establishments')->with('success', 'Establishment has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/establishments')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/establishments')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $establishment = Establishment::find($id);
                $image = public_path().'/'.'images/'.$establishment->image_path;
                unlink($image);
                $establishment->delete();
                return redirect('/establishments')->with('success', 'Establishment has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/establishments')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/establishments')->with('error', 'Guests are unauthorized to perform that action');
    }

    public function pending(Request $request, $id){
        if (Auth::user()->admin == 1){
            $establishment = Establishment::find($id);
            $establishment->pending = 'false';
            $establishment->save();
            return redirect('/establishments')->with('success', 'Establishment promotion has been approved to website.');
        }
        else {
            return redirect('/establishments')->with('error', 'You are not authorized to perform that action.');
        }
    }
    
}
