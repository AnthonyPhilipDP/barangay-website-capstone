<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {   
        //$this->middleware(['auth', 'verified'], ['except' => ['index', 'show']]);
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        if( Auth::user()->admin == 1){
            $sliders = Slider::all();
            return view('slider.index', compact('sliders'));
        }
        else{
            return redirect('/')->with('error', 'Resident users are unauthorized to perform that action');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::user()->admin == 1){
            return view('slider.create');
        }
        else{
            return redirect('/')->with('error', 'Resident users are unauthorized to perform that action');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'image' => 'required|mimes:jpeg,png,bmp,gif|max: 2000'
        ]);
        $uploadImage = $request->file('image');
        $imageNameWithExt = $uploadImage->getClientOriginalName(); 
        $imageName =pathinfo($imageNameWithExt, PATHINFO_FILENAME);
        $imageExt=$uploadImage->getClientOriginalExtension();
        $storeImage=$imageName . time() . "." . $imageExt;
        $request->image->move(public_path('images'), $storeImage);
        $carousel= slider::create([
            'image' => $storeImage
        ]);
        return redirect('slider');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = Slider::find($id);
        return view('slider.show')->with('slider', $slider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::guest() == false){
            if(auth()->user()->admin == 1){
                $slider = Slider::find($id);
                $image = public_path().'/'.'images/'.$slider->image;
                unlink($image);
                $slider->delete();
                return redirect('/')->with('success', 'Image has been removed.');
            }
            elseif(auth()->user()->admin == 0){
                return redirect('/')->with('error', 'Resident users are unauthorized to perform that action');
            }
        }
        return redirect('/')->with('error', 'Guests are unauthorized to perform that action');
    }
}