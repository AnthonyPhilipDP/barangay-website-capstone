<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Event;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Business;
use App\Models\Clearance;
use App\Models\Complaint;
use App\Models\Indigency;
use App\Models\Residency;
use App\Models\Achievement;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\Establishment;
use App\Models\BusinessClearance;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified'], ['except' => ['homepage', 'about']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function residentHome()
    {
        if (Auth::user()->admin == 1){
            return redirect()->route('admin.admin.home');
        }
        else {
        return view('resident.home');
        }
    }

    public function adminHome()
    {  
        $users = User::where('admin', '0')->count();
        $newscount = News::count();
        $projectcount = Project::count();
        $announcementcount = Announcement::count();
        $eventcount = Event::count();
        $business = Business::count();
        $achievement = Achievement::count();
        $establishment = Establishment::count();
        $complaintcount = Complaint::count();
        $solvedcomplaintcount = Complaint::where('solved', 'true')->count();
        //False
        $clearance = Clearance::where('done', 'false')->count();
        $businessclearance = BusinessClearance::where('done', 'false')->count();
        $indigency = Indigency::where('done', 'false')->count();
        $residency = Residency::where('done', 'false')->count();
        $totaldocumentcount = $clearance + $businessclearance + $indigency + $residency;
        //True
        $clearance1 = Clearance::where('done', 'true')->count();
        $businessclearance1 = BusinessClearance::where('done', 'true')->count();
        $indigency1 = Indigency::where('done', 'true')->count();
        $residency1 = Residency::where('done', 'true')->count();
        $totaldocumentcount1 = $clearance1 + $businessclearance1 + $indigency1 + $residency1;
        return view('admin.admin', compact(
            'newscount', 
            'projectcount', 
            'announcementcount', 
            'eventcount', 
            'achievement',
            'complaintcount', 
            'solvedcomplaintcount',
            'totaldocumentcount',
            'totaldocumentcount1',
            'business',
            'establishment',
            'users',
        ));
    }

    public function about()
    {  
        return view('pages.about');  
    }
    
    public function showUserlist(){
        
        if (Auth::user()->admin == 1){
            $users = User::all()->except(1);

            return view('admin.userlist', compact('users'));
        }
        else {
        return redirect('/home')->with('error', 'You are unauthorized to perform that action');
        }
        
    }

    public function homepage()
    {  
        
        $news = DB::table('news')
        ->select('title', 'subject', 'body', 'created_at', 'updated_at', 'image_path', DB::raw("'news' AS source"));

        $announcement = DB::table('announcements')
        ->select('title', 'subject', 'body', 'created_at', 'updated_at', 'image_path', DB::raw("'announcements' AS source"));

        $project = DB::table('projects')
        ->select('title', 'subject', 'body', 'created_at', 'updated_at', 'image_path', DB::raw("'projects' AS source"));
        
        $post = DB::table('achievements')
        ->select('title', 'subject', 'body', 'created_at', 'updated_at', 'image_path', DB::raw("'achievements' AS source"))
        ->unionAll($news)
        ->unionAll($announcement)
        ->unionAll($project)
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        $latestpost = DB::table('achievements')
        ->select('title', 'subject', 'body', 'created_at', 'updated_at', 'image_path', DB::raw("'achievements' AS source"))
        ->unionAll($news)
        ->unionAll($announcement)
        ->unionAll($project)
        ->orderBy('created_at', 'desc')
        ->first();

        return view('pages.homepage1', compact('post', 'latestpost'));
    }

}
