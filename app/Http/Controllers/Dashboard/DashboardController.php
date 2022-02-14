<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Subadmin;
use App\Models\Path;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $subadmins = Subadmin::all();
        $paths = Path::all();
        $reports = Report::all();
        return view('Dashboard.index', compact('users', 'subadmins', 'paths', 'reports'));
    }
}
