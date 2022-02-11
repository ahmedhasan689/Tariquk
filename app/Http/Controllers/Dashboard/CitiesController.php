<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReportCreatedNotification;

use App\Models\Report;
use App\Models\Path;

class CitiesController extends Controller
{

    public function rafah()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 1)->get();
        return view('Dashboard.Cities.rafah', compact('reports'));
    }

    public function khanYouins()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 2)->get();
        return view('Dashboard.Cities.khanyounis', compact('reports'));
    }

    public function middle()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 3)->get();
        return view('Dashboard.Cities.middle', compact('reports'));
    }

    public function gaza()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 4)->get();
        return view('Dashboard.Cities.gaza', compact('reports'));
    }

    public function jabalia()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 5)->get();
        return view('Dashboard.Cities.jabalia', compact('reports'));
    }

    public function beitLahia()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 6)->get();
        return view('Dashboard.Cities.beitlahia', compact('reports'));
    }

    public function beitHanoun()
    {
        $reports = Report::where('show_status', 0)->where('city_id', 7)->get();
        return view('Dashboard.Cities.beithanoun', compact('reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * Update Show_status To => 1
     */
    public function showStatus(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $paths = Path::where('path', 'LIKE', '%' . $report->street . '%')->get();

        foreach($paths as $path){

            $users = $path->user;
        }

        $report->update([
            'show_status' => 1,
        ]);

        // dd($users);

        // Send Notifications To Phone Number
        Notification::send($users, new ReportCreatedNotification($report));

        return redirect()->back();
    }

    public function remove($id)
    {
        $report = Report::findOrFail($id);

        $report->delete();

        // Delete Media
        unlink(public_path('uploads/' . $report->media));

        return redirect()->back();
    }

}
