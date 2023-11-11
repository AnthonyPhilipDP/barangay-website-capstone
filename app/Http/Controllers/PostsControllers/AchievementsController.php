<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\Achievement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AchievementsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $achievement = Achievement::orderBy('created_at','desc')->paginate(1);
        return view('posts.achievements.index')->with('achievement', $achievement);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.achievements.create');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/achievements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/achievements')->with('error', 'Guests are unauthorized to perform that action');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:max_width=1920,max_height=1080'
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $achievement = new Achievement;
        $achievement->title = $request->input('title');
        $achievement->subject = $request->input('subject');
        $achievement->body = $request->input('body');
        $achievement->image_path = $newImageName;
        $achievement->save();

        return redirect('/achievements')->with('success', 'Achievement has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $achievement = Achievement::find($id);
        return view('posts.achievements.show')->with('achievement', $achievement);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $achievement = Achievement::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.achievements.edit')->with('achievement', $achievement);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/achievements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/achievements')->with('error', 'Guests are unauthorized to perform that action');
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
                $achievement = Achievement::find($id);
                $achievement->title = $request->input('title');
                $achievement->subject = $request->input('subject');
                $achievement->body = $request->input('body');
                $achievement->save();
                return redirect('/achievements')->with('success', 'Achievement has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/achievements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/achievements')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $achievement = Achievement::find($id);
                $image = public_path().'/'.'images/'.$achievement->image_path;
                unlink($image);
                $achievement->delete();
                return redirect('/achievements')->with('success', 'Achievement has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/achievement')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/achievements')->with('error', 'Guests are unauthorized to perform that action');
    }
}
