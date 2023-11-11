<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $event = Event::orderBy('created_at','desc')->paginate(1);
        return view('posts.events.index')->with('event', $event);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.events.create');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/events')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/events')->with('error', 'Guests are unauthorized to perform that action');
    }

    // STORE DATA
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'subject' => 'required',
            'body' => 'required',
            'image' => 'required'
        ]);

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $event = new Event;
        $event->title = $request->input('title');
        $event->subject = $request->input('subject');
        $event->body = $request->input('body');
        $event->image_path = $newImageName;
        $event->save();

        return redirect('/events')->with('success', 'Event has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $event = Event::find($id);
        return view('posts.events.show')->with('event', $event);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $event = Event::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.events.edit')->with('event', $event);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/events')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/events')->with('error', 'Guests are unauthorized to perform that action');
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
                $event = Event::find($id);
                $event->title = $request->input('title');
                $event->subject = $request->input('subject');
                $event->body = $request->input('body');
                $event->save();
                return redirect('/events')->with('success', 'Announcement has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/events')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/events')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $event = Event::find($id);
                $image = public_path().'/'.'images/'.$event->image_path;
                unlink($image);
                $event->delete();
                return redirect('/events')->with('success', 'Event has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/events')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/events')->with('error', 'Guests are unauthorized to perform that action');
    }
}
