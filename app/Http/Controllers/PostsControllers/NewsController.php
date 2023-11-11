<?php

namespace App\Http\Controllers\PostsControllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    // SHOW ALL DATA
    public function index()
    {
        $news = News::orderBy('created_at','desc')->paginate(1);//->get();
        return view('posts.news.index')->with('news', $news);
    }

    // CREATE DATA
    public function create()
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.news.create');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/news')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/news')->with('error', 'Guests are unauthorized to perform that action');
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

        $news = new News;
        $news->title = $request->input('title');
        $news->subject = $request->input('subject');
        $news->body = $request->input('body');
        $news->image_path = $newImageName;
        $news->save();

        return redirect('/news')->with('success', 'News has been posted.');
    }

    // SHOW DATA BY ID
    public function show($id)
    {
        $news = News::find($id);
        return view('posts.news.show')->with('news', $news);
    }

    // EDIT DATA BY ID
    public function edit($id)
    {
        $news = News::find($id);
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                return view('posts.news.edit')->with('news', $news);
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/news')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/news')->with('error', 'Guests are unauthorized to perform that action');
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
                $news = News::find($id);
                $news->title = $request->input('title');
                $news->subject = $request->input('subject');
                $news->body = $request->input('body');
                $news->save();
                return redirect('/news')->with('success', 'News has been updated.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/news')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/news')->with('error', 'Guests are unauthorized to perform that action');
    }

    // DELETE DATA BY ID
    public function destroy(Request $request, $id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $news = News::find($id);
                $image = public_path().'/'.'images/'.$news->image_path;
                unlink($image);
                $news->delete();
                return redirect('/news')->with('success', 'News has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/news')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/news')->with('error', 'Guests are unauthorized to perform that action');
    }
}
