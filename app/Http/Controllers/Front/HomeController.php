<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Profile;

class HomeController extends Controller
{
    public function index()
    {
        // $profile = Profile::where('user_id', Auth::user()->id)->first();
        // dd($profile);
        return view('Front.home');
    }

}
