<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SelectionController extends Controller
{

    public function index()
    {
        return view('auth.selection');
    }
    
}
