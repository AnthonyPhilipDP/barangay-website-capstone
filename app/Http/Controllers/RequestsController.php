<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use App\Models\Clearance;
use App\Models\Indigency;
use App\Models\Residency;
use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\BusinessClearance;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    public function __construct()
    {   
        //$this->middleware(['auth', 'verified'], ['except' => ['index', 'show']]);
        $this->middleware(['auth', 'verified']);
    }
    
    public function pendingrequests()
    {
        //INDIGENCY
        $indigency = Indigency::orderBy('created_at','asc')
        // ->where('done', 'false')
        ->get();
        //BUSINESS CLEARANCE
        $businessclearance = BusinessClearance::orderBy('created_at','asc')
        // ->where('done', 'false')
        ->get();
        //CLEARANCE
        $clearance = Clearance::orderBy('created_at','asc')
        // ->where('done', 'false')
        ->get();
        //RESIDENCY
        $residency = Residency::orderBy('created_at','asc')
        // ->where('done', 'false')
        ->get();

        return view('requestdocs.requests', compact('indigency','clearance','businessclearance','residency'));
    }

    public function pendingbusiness()
    {
        if( Auth::user()->admin == 1 ){
        $business = Business::orderBy('created_at','asc')
        // ->where('pending', 'true')
        ->get();
        $establishment = Establishment::orderBy('created_at','asc')
        // ->where('pending', 'true')
        ->get();
        return view('requestdocs.businesspromotions', compact('business','establishment'));
        }
        else{
            return redirect('/')->with('error', 'Guest and Resident users are unauthorized to perform that action');
        }
    }

    public function pendingestablishment()
    {
        if( Auth::user()->admin == 1 ){
        $business = Business::orderBy('created_at','asc')
        // ->where('pending', 'true')
        ->get();
        $establishment = Establishment::orderBy('created_at','asc')
        // ->where('pending', 'true')
        ->get();
        return view('requestdocs.establishmentpromotions', compact('business','establishment'));
        }
        else{
            return redirect('/')->with('error', 'Guest and Resident users are unauthorized to perform that action');
        }
    }
    
    public function myrequests()
    {
        $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // //INDIGENCY
        // $indigency = $user->indigency
        // ->where('user_id', $user_id)
        // // ->where('done', 'false')
        // ->all();
        // //BUSINESS CLEARANCE
        // $businessclearance = $user->businessclearance
        // ->where('user_id', $user_id)
        // // ->where('done', 'false')
        // ->all();
        // //CLEARANCE
        // $clearance = $user->clearance
        // ->where('user_id', $user_id)
        // // ->where('done', 'false')
        // ->all();
        // //RESIDENCY
        // $residency = $user->residency
        // ->where('user_id', $user_id)
        // // ->where('done', 'false')
        // ->all();
        
        $user = User::find($user_id);
        $indigency = DB::table('indigencies')
        ->where('user_id', $user_id)
        ->select('created_at', 'done', 'notified', 'docuname', DB::raw("'indigencies' AS source"));
 
        $clearance = DB::table('clearances')
        ->where('user_id', $user_id)
        ->select('created_at', 'done', 'notified', 'docuname', DB::raw("'clearances' AS source"));

        $residency = DB::table('residencies')
        ->where('user_id', $user_id)
        ->select('created_at', 'done', 'notified', 'docuname', DB::raw("'residencies' AS source"));
        
        $latest = DB::table('business_clearances')
        ->where('user_id', $user_id)
        ->select('created_at', 'done', 'notified', 'docuname', DB::raw("'business_clearances' AS source"))
        ->unionAll($indigency)
        ->unionAll($clearance)
        ->unionAll($residency)
        ->orderBy('created_at', 'desc')
        ->limit(10)
        ->get();


        return view('requestdocs.myrequest', compact('latest'));
        // return view('requestdocs.myrequest', compact('indigency','clearance','businessclearance','residency'));
    }

    public function mypromotions()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        //Business
        $business = $user->business
        ->where('user_id', $user_id)
        ->where('pending', 'true')
        ->all();
        //Establishments
        $establishment = $user->establishment
        ->where('user_id', $user_id)
        ->where('pending', 'true')
        ->all();
        return view('requestdocs.mypromotions', compact('business', 'establishment'));
    }
}
