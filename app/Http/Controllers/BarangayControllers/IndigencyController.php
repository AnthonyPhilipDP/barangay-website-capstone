<?php

namespace App\Http\Controllers\BarangayControllers;

use DateTime;
use App\Mail\ClaimMail;
use App\Models\Indigency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class IndigencyController extends Controller
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
        return view('requestdocs.indigency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requestdocs.indigency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'middle' => 'nullable',
            'lastname' => 'required',
            'suffix' => 'required',
            'block' => 'nullable',
            'lot' => 'nullable',
            'phase' => 'nullable',
            'house' => 'nullable',
            'street' => 'nullable',
            'subdivision' => 'nullable',
            'barangay' => 'required',
            'city_muni' => 'required',
            'province' => 'required',
            'dob' => 'required',
            'pobcity' => 'required',
            'pobprovince' => 'required',
            'age' => 'required',
            'civilstatus' => 'required',
            'citizenship' => 'required',
            'los' => 'required',
            'purpose' => 'required',
            'notified' => 'required',
            'done' => 'required',
        ]);

        $indigency = new indigency;
        $indigency->name = $request->input('name');
        $indigency->middle = $request->input('middle');
        $indigency->lastname = $request->input('lastname');
        $indigency->suffix = $request->input('suffix');
        $indigency->block = $request->input('block');
        $indigency->lot = $request->input('lot');
        $indigency->phase = $request->input('phase');
        $indigency->house = $request->input('house');
        $indigency->street = $request->input('street');
        $indigency->subdivision = $request->input('subdivision');
        $indigency->barangay = $request->input('barangay');
        $indigency->city_muni = $request->input('city_muni');
        $indigency->province = $request->input('province');
        $indigency->dob = $request->input('dob');
        $indigency->pobcity = $request->input('pobcity');
        $indigency->pobprovince = $request->input('pobprovince');
        $indigency->age = $request->input('age');
        $indigency->civilstatus = $request->input('civilstatus');
        $indigency->citizenship = $request->input('citizenship');
        $indigency->los = $request->input('los');
        $indigency->notified = $request->input('notified');
        $indigency->purpose = $request->input('purpose');
        $indigency->done = $request->input('done');
        $indigency->user_id = auth()->user()->id;
        $indigency->docuname = "Barangay Indigency";
        $indigency->user_email = auth()->user()->email;
        $indigency->save();

        return redirect('/indigency')->with('success', 'Certification (Indigency) requested successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if( Auth::user()->admin == 1){
        $indigency= Indigency::find($id);
        return view('requestdocs.indigency.show')->with('indigency', $indigency);
        }
        else{
            return redirect('/indigency')->with('error', 'You are not authorized to perform that action.');
        }
        
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
        //
    }

    public function done(Request $request, $id){
        if (Auth::user()->admin == 1){
            $indigency = Indigency::find($id);
            $indigency->done = 'true';
            $indigency->save();
            return redirect('/requests')->with('success', 'Indigency marked as done.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('pages.homepage')->with('error', 'Authorization error.');
        }
    }

    public function mailIndigency(Request $request, $id){
        if (Auth::user()->admin == 1){
            $indigency = Indigency::find($id);
            Mail::to($indigency->user_email)->send(new ClaimMail());
            $indigency->notified = 'true';
            $indigency->save();
            return redirect('/requests')->with('success', 'Email has been sent to requestor successfuly.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('requestdocs.indigency.index')->with('indigency', $user->indigency);
        }
    }
}
