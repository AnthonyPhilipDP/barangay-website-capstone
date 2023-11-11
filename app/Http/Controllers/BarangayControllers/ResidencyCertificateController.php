<?php

namespace App\Http\Controllers\BarangayControllers;

use App\Mail\ClaimMail;
use App\Models\Residency;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResidencyCertificateController extends Controller
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
        return view('requestdocs.residency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requestdocs.residency.create');
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

        $residency = new Residency;
        $residency->name = $request->input('name');
        $residency->middle = $request->input('middle');
        $residency->lastname = $request->input('lastname');
        $residency->suffix = $request->input('suffix');
        $residency->block = $request->input('block');
        $residency->lot = $request->input('lot');
        $residency->phase = $request->input('phase');
        $residency->house = $request->input('house');
        $residency->street = $request->input('street');
        $residency->subdivision = $request->input('subdivision');
        $residency->barangay = $request->input('barangay');
        $residency->city_muni = $request->input('city_muni');
        $residency->province = $request->input('province');
        $residency->dob = $request->input('dob');
        $residency->pobcity = $request->input('pobcity');
        $residency->pobprovince = $request->input('pobprovince');
        $residency->age = $request->input('age');
        $residency->civilstatus = $request->input('civilstatus');
        $residency->citizenship = $request->input('citizenship');
        $residency->los = $request->input('los');
        $residency->notified = $request->input('notified');
        $residency->purpose = $request->input('purpose');
        $residency->done = $request->input('done');
        $residency->user_id = auth()->user()->id;
        $residency->docuname = "Residency Certificate";
        $residency->user_email = auth()->user()->email;
        $residency->save();

        return redirect('/residency')->with('success', 'Certificate of Residency requested successfully.');
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
        $residency = Residency::find($id);
        return view('requestdocs.residency.show')->with('residency', $residency);
        }
        else{
            return redirect('/residency')->with('error', 'You are not authorized to perform that action.');
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
            $residency = Residency::find($id);
            $residency->done = 'true';
            $residency->save();
            return redirect('/requests')->with('success', 'Residency marked as done.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('pages.homepage')->with('error', 'Authorization error.');
        }
    }

    public function mailResidency(Request $request, $id){
        if (Auth::user()->admin == 1){
            $residency = Residency::find($id);
            Mail::to($residency->user_email)->send(new ClaimMail());
            $residency->notified = 'true';
            $residency->save();
            return redirect('/requests')->with('success', 'Email has been sent to requestor successfuly.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('requestdocs.residency.index')->with('residency', $user->residency);
        }
    }
}
