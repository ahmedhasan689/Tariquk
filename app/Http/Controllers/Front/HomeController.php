<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;
use App\Models\Report;

class HomeController extends Controller
{
    public function index()
    {
        // $profile = Profile::where('user_id', Auth::user()->id)->first();
        // dd($profile);
        $reports = Report::where('show_status', 1)->limit(3)->get();

        $report = Report::where('show_status', 1)->limit(1)->first();

        return view('Front.home', compact('reports', 'report'));
    }

    public function instruct()
    {
        return view('Front.instruct');
    }

    public function contact()
    {
        return view('Front.contact');
    }
}
