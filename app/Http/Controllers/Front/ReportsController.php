<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReportCreatedNotification;

use App\Models\City;
use App\Models\Admin;
use App\Models\subadmin;
use App\Models\Report;

class ReportsController extends Controller
{

    public function index() 
    {
        $reports = Report::where('show_status', '1')->get();    
        return view('Front.Reports.index', compact('reports'));
    }


    public function create()
    {
        $cities = City::all();
        return view('Front.Reports.create', compact('cities'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'street' => ['required', 'min:3'],
            'content' => ['required', 'min:15'],
            'media' => ['nullable', 'file'],
        ]);

        $media_path = null;
        if ($request->hasFile('media')){
            $file = $request->file('media');

            
            $ext = $file->extension();
            
            $media_path =  $file->store('/', [
                'disk' => 'uploads'
            ]);
            
        }

        $report= Report::create([
            'content' => $request->post('content'),
            'street' => $request->post('street'),
            'media' => $media_path,
            'media_ext' => $ext ?? null,
            'city_id' => $request->post('city'),
            'user_id' => Auth::user()->id,
        ]);

        $subadmin = Subadmin::where('id', 1)->first();

        Notification::send($subadmin, new ReportCreatedNotification($report));

        return redirect()->route('report.index');
    }
}
