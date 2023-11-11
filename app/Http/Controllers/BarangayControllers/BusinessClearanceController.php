<?php

namespace App\Http\Controllers\BarangayControllers;

use App\Mail\ClaimMail;
use Illuminate\Http\Request;
use App\Models\BusinessClearance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BusinessClearanceController extends Controller
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
        return view('requestdocs.businessclearance.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('requestdocs.businessclearance.create');
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
            'businessname' => 'required',
            'notified' => 'required',
            'done' => 'required',
        ]);

        $businessclearance = new BusinessClearance;
        $businessclearance->name = $request->input('name');
        $businessclearance->middle = $request->input('middle');
        $businessclearance->lastname = $request->input('lastname');
        $businessclearance->suffix = $request->input('suffix');
        $businessclearance->block = $request->input('block');
        $businessclearance->lot = $request->input('lot');
        $businessclearance->phase = $request->input('phase');
        $businessclearance->house = $request->input('house');
        $businessclearance->street = $request->input('street');
        $businessclearance->subdivision = $request->input('subdivision');
        $businessclearance->barangay = $request->input('barangay');
        $businessclearance->city_muni = $request->input('city_muni');
        $businessclearance->province = $request->input('province');
        $businessclearance->businessname = $request->input('businessname');
        $businessclearance->done = $request->input('done');
        $businessclearance->notified = $request->input('notified');
        $businessclearance->user_id = auth()->user()->id;
        $businessclearance->docuname = "Business Clearance";
        $businessclearance->user_email = auth()->user()->email;
        $businessclearance->save();

        return redirect('/businessclearance')->with('success', 'Business Clearance requested successfully.');
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
            $businessclearance= BusinessClearance::find($id);
        return view('requestdocs.businessclearance.show')->with('businessclearance', $businessclearance);
        }
        else{
            return redirect('/businessclearance')->with('error', 'You are not authorized to perform that action.');
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
            $businessclearance = BusinessClearance::find($id);
            $businessclearance->done = 'true';
            $businessclearance->save();
            return redirect('/requests')->with('success', 'Business Clearance marked as done.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('pages.homepage')->with('error', 'Authorization error.');
        }
    }

    public function mailBusinessClearance(Request $request, $id){
        if (Auth::user()->admin == 1){
            $businessclearance = BusinessClearance::find($id);
            Mail::to($businessclearance->user_email)->send(new ClaimMail());
            $businessclearance->notified = 'true';
            $businessclearance->save();
            return redirect('/requests')->with('success', 'Email has been sent to requestor successfuly.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('requestdocs.businessclearance.index')->with('businessclearance', $user->businessclearance);
        }
    }
}
