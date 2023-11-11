<?php

namespace App\Http\Controllers\BarangayControllers;

use App\Models\User;
use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Mail\ComplainantMail;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ComplaintsController extends Controller
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

    public function index(Request $request)
    {

        if (Auth::user()->admin == 1){
            $complaint = Complaint::where([
                ['nagrereklamo', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('nagrereklamo', 'LIKE', '%' . $term . '%')->get();//change the search value
                    }
                }]
            ])
            ->orderBy('id', 'asc')
            ->paginate(5);
            return view('admin.complaints.index', compact('complaint'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $complaint = $user->complaint
            ->where('user_id', $user_id)
            ->where('solved', 'false')
            ->all();
            return view('complaints.index')->with('complaint', $complaint);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('complaints.create');
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
            'nagrereklamo' => 'required',
            'address' => 'required',
            'number' => 'nullable',
            'inirereklamo' => 'required',
            'address1' => 'required',
            'number1' => 'nullable',
            'subject' => 'required',
            'salaysay' => 'required',
            'notified' => 'required',
            'solved' => 'required'
        ]);

        $complaint = new Complaint;
        $complaint->nagrereklamo = $request->input('nagrereklamo');
        $complaint->address = $request->input('address');
        $complaint->number = $request->input('number');
        $complaint->inirereklamo = $request->input('inirereklamo');
        $complaint->address1 = $request->input('address1');
        $complaint->number1 = $request->input('number1');
        $complaint->subject = $request->input('subject');
        $complaint->salaysay = $request->input('salaysay');
        $complaint->notified = $request->input('notified');
        $complaint->solved = $request->input('solved');
        $complaint->user_id = auth()->user()->id;
        $complaint->user_email = auth()->user()->email;
        $complaint->save();

        return redirect('/complaints')->with('success', 'Complaint has been filed, always check your email for updates.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::find($id);
        return view('complaints.show')->with('complaint', $complaint);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaint::find($id);
        //Check for correct user
        if(Auth::user()->guest == true){
            return redirect('/complaints')->with('error', 'Unauthorized to perform that action');
        }
        return view('complaints.edit')->with('complaint', $complaint);
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
        $this->validate($request, [
            'nagrereklamo' => 'required',
            'address' => 'required',
            'number' => 'required',
            'inirereklamo' => 'required',
            'address1' => 'required',
            'number1' => 'required',
            'subject' => 'required',
            'salaysay' => 'required'
        ]);

        $complaint = Complaint::find($id);
        $complaint->nagrereklamo = $request->input('nagrereklamo');
        $complaint->address = $request->input('address');
        $complaint->number = $request->input('number');
        $complaint->inirereklamo = $request->input('inirereklamo');
        $complaint->address1 = $request->input('address1');
        $complaint->number1 = $request->input('number1');
        $complaint->subject = $request->input('subject');
        $complaint->salaysay = $request->input('salaysay');
        $complaint->user_id = $request->input('user_id');
        $complaint->user_email = $request->input('user_email');
        $complaint->save();

        return redirect('/complaints')->with('success', 'Complaint has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //baguhin mo to sige
        $complaint = Complaint::find($id);
        //Check for correct user
        // if(){
        //     return redirect('/complaints')->with('error', 'Unauthorized to perform that action');
        // }
        $complaint->delete();
        return redirect('/complaints')->with('success', 'Complaint has been removed.');
    }

    public function notifyUser(Request $request, $id){
        if (Auth::user()->admin == 1){
            $complaint = Complaint::find($id);
            Mail::to($complaint->user_email)->send(new ComplainantMail());
            $complaint->notified = 'true';
            $complaint->save();
            return redirect('/complaints')->with('success', 'Email has been sent to Complainant successfuly.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('complaints.index')->with('complaint', $user->complaint);
        }
    }

    public function solved(Request $request, $id){
        if (Auth::user()->admin == 1){
            $complaint = Complaint::find($id);
            $complaint->solved = 'true';
            $complaint->save();
            return redirect('/complaints')->with('success', 'Complaint marked as solved.');
        }
        else {
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            //$complaint = Complaint::orderBy('created_at','desc')->get();//->paginate(1);
            return view('complaints.index')->with('complaint', $user->complaint);
        }
    }

}
