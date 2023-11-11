<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AnnouncementsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $announcement = Announcement::orderBy('created_at','desc')->paginate(1);
        return view('posts.announcements.index')->with('announcement', $announcement);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.announcements.create');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/announcements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/announcements')->with('error', 'Guests are unauthorized to perform that action');
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

        $announcement = new Announcement;
        $announcement->title = $request->input('title');
        $announcement->subject = $request->input('subject');
        $announcement->body = $request->input('body');
        $announcement->image_path = $newImageName;
        $announcement->save();

        return redirect('/announcements')->with('success', 'Announcement has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $announcement = Announcement::find($id);
        return view('posts.announcements.show')->with('announcement', $announcement);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $announcement = Announcement::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.announcements.edit')->with('announcement', $announcement);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/announcements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/announcements')->with('error', 'Guests are unauthorized to perform that action');
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
                $announcement = Announcement::find($id);
                $announcement->title = $request->input('title');
                $announcement->subject = $request->input('subject');
                $announcement->body = $request->input('body');
                $announcement->save();
                return redirect('/announcements')->with('success', 'Announcement has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/announcements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/announcements')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $announcement = Announcement::find($id);
                $image = public_path().'/'.'images/'.$announcement->image_path;
                unlink($image);
                $announcement->delete();
                return redirect('/announcements')->with('success', 'Announcement has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/announcements')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/announcements')->with('error', 'Guests are unauthorized to perform that action');
    }
}
