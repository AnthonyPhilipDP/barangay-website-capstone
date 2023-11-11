<?php

namespace App\Http\Controllers\BarangayControllers;

use App\Models\Clearance;
use App\Models\Indigency;
use App\Models\Residency;
use Illuminate\Http\Request;
use App\Models\BusinessClearance;
use App\Http\Controllers\Controller;

class PrintController extends Controller
{
    public function residencyPrint($id)
    {
        $residency= Residency::find($id);
        return view('requestdocs.print.residency', compact('residency'));
    }

    public function clearancePrint($id)
    {
        $clearance= Clearance::find($id);
        return view('requestdocs.print.clearance', compact('clearance'));
    }

    public function businessclearancePrint($id)
    {
        $businessclearance= BusinessClearance::find($id);
        return view('requestdocs.print.businessclearance', compact('businessclearance'));
    }

    public function indigencyPrint($id)
    {
        $indigency= Indigency::find($id);
        return view('requestdocs.print.indigency', compact('indigency'));
    }
}
