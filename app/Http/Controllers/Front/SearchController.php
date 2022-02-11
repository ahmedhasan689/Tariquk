<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Report;

class SearchController extends Controller
{
    function search(Request $request)
    {
        if(isset($_GET['search'])){
            $search_text = $_GET['search'];
            $reports = Report::where('street', 'LIKE', '%' . $search_text . '%')->get();
            return view('Front.search', compact('reports'));
        }
    }
}