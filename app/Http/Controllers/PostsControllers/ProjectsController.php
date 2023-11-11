<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $project = Project::orderBy('created_at','desc')->paginate(1);
        return view('posts.projects.index')->with('project', $project);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.projects.create');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/projects')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/projects')->with('error', 'Guests are unauthorized to perform that action');
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

        $project = new Project;
        $project->title = $request->input('title');
        $project->subject = $request->input('subject');
        $project->body = $request->input('body');
        $project->image_path = $newImageName;
        $project->save();

        return redirect('/projects')->with('success', 'Project has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $project = Project::find($id);
        return view('posts.projects.show')->with('project', $project);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $project = Project::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.projects.edit')->with('project', $project);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/projects')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/projects')->with('error', 'Guests are unauthorized to perform that action');
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
                $project = Project::find($id);
                $project->title = $request->input('title');
                $project->subject = $request->input('subject');
                $project->body = $request->input('body');
                $project->save();
                return redirect('/projects')->with('success', 'Project has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/projects')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/projects')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $project = Project::find($id);
                $image = public_path().'/'.'images/'.$project->image_path;
                unlink($image);
                $project->delete();
                return redirect('/projects')->with('success', 'Project has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/projects')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/projects')->with('error', 'Guests are unauthorized to perform that action');
    }
}
