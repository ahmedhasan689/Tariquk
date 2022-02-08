<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Subadmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SubadminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subadmins = Subadmin::all();
        return view('Dashboard.Subadmins.index', compact('subadmins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('Dashboard.Subadmins.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'city' => 'required',
            'avatar' => 'nullable|image',
        ]);

        $image_path = null;

        // Upload Image
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        } else {
            $image_path = null;
        }

        // dd($request);

        if ($request->post('password') == $request->post('re-password')) {
            $subadmin = Subadmin::create([
                'name' => $request->post('name'),
                'phone_number' => $request->post('phone_number'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'city_id' => $request->post('city'),
                'avatar' => $image_path,
            ]);

            return redirect()->route('subadmin.index')->with('success', 'Subadmin ' . ($subadmin->name) . ' Created');
        } else {
            return redirect()->back()->with('Password And Re-Passowrd Not Match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subadmin = Subadmin::findOrFail($id);
        $cities = City::all();
        return view('Dashboard.Subadmins.edit', compact('subadmin', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subadmin = Subadmin::findOrFail($id);

        $request->validate([
            'name' => 'required|min:2',
            'phone_number' => 'required|numeric|min:10',
            'email' => 'required|email',
            'password' => 'nullable|min:8',
            'city' => 'required',
            'avatar' => 'nullable|image',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar'); // UploadedFile Objects

            $image_path = $file->store('/', [
                'disk' => 'uploads',
            ]);
        }


        // Check If THe Password Input Not Empty
        if (!empty($request->post('password')) && !empty($request->post('re-password'))) {
            if ($request->post('password') === $request->post('re-password')) {
                $request->merge([
                    'password' => Hash::make($request->post('password')),
                ]);
            } else {

                return redirect()->route('admin.index')->with('success', 'Password Not Correct');
            }
        }

        // dd($request);
        $subadmin->update([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'avatar' => $image_path ?? $subadmin->avatar,
            'city_id' => $request->post('city'),
        ]);

        return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . $subadmin->name . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subadmin = Subadmin::find($id);
        $subadmin->delete();
        return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . ($subadmin->name) .  ' Deleted');
    }

    public function trash()
    {
        $subadmins = Subadmin::onlyTrashed()->get();
        return view('dashboard.Subadmins.trash', compact('subadmins'));
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $subadmins = Subadmin::onlyTrashed()->findOrFail($id);
            $subadmins->restore();

            // PTG
            return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . $subadmins->name . ' Restored');
        }

        $subadmins = Subadmin::onlyTrashed()->restore();
        return redirect()->route('subadmin.index')->with('success', 'All Sub-Admins Restored');
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $subadmins = Subadmin::onlyTrashed()->findOrFail($id);


            $subadmins->forceDelete();

            // Delete Avatar
            unlink(public_path('uploads/' . $subadmins->avatar));

            // PTG
            return redirect()->route('subadmin.index')->with('success', 'Sub-Admin ' . $subadmins->name . ' Deleted');
        }

        $subadmins = Subadmin::onlyTrashed()->forceDelete();
        return redirect()->route('subadmin.index')->with('success', 'All Sub-Admins Deleted');
    }
}
