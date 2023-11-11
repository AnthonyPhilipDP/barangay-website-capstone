<?php

namespace App\Http\Controllers\BarangayControllers;

use App\Mail\ClaimMail;
use App\Models\Clearance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ClearanceController extends Controller
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
        return view('requestdocs.clearance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requestdocs.clearance.create');
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
            'done' => 'required'
        ]);

        $clearance = new Clearance;
        $clearance->name = $request->input('name');
        $clearance->middle = $request->input('middle');
        $clearance->lastname = $request->input('lastname');
        $clearance->suffix = $request->input('suffix');
        $clearance->block = $request->input('block');
        $clearance->lot = $request->input('lot');
        $clearance->phase = $request->input('phase');
        $clearance->house = $request->input('house');
        $clearance->street = $request->input('street');
        $clearance->subdivision = $request->input('subdivision');
        $clearance->barangay = $request->input('barangay');
        $clearance->city_muni = $request->input('city_muni');
        $clearance->province = $request->input('province');
        $clearance->dob = $request->input('dob');
        $clearance->pobcity = $request->input('pobcity');
        $clearance->pobprovince = $request->input('pobprovince');
        $clearance->age = $request->input('age');
        $clearance->civilstatus = $request->input('civilstatus');
        $clearance->citizenship = $request->input('citizenship');
        $clearance->los = $request->input('los');
        $clearance->notified = $request->input('notified');
        $clearance->purpose = $request->input('purpose');
        $clearance->done = $request->input('done');
        $clearance->user_id = auth()->user()->id;
        $clearance->docuname = "Barangay Clearance";
        $clearance->user_email = auth()->user()->email;
        $clearance->save();

        return redirect('/clearance')->with('success', 'Barangay Clearance requested successfully.');
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
        $clearance = Clearance::find($id);
        return view('requestdocs.clearance.show')->with('clearance', $clearance);
        }
        else{
            return redirect('/clearance')->with('error', 'You are not authorized to perform that action.');
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
            $clearance = Clearance::find($id);
            $clearance->done = 'true';
            $clearance->save();
            return redirect('/requests')->with('success', 'Clearance marked as done.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('pages.homepage')->with('error', 'Authorization error.');
        }
    }

    public function mailClearance(Request $request, $id){
        if (Auth::user()->admin == 1){
            $clearance = Clearance::find($id);
            Mail::to($clearance->user_email)->send(new ClaimMail());
            $clearance->notified = 'true';
            $clearance->save();
            return redirect('/requests')->with('success', 'Email has been sent to requestor successfuly.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('requestdocs.clearance.index')->with('clearance', $user->clearance);
        }
    }
}
