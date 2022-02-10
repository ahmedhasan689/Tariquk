<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;

class ReportsController extends Controller
{
    public function create()
    {
        $cities = City::all();
        return view('Front.Reports.create', compact('cities'));
    }

    public function store()
    {
        
    }
}
