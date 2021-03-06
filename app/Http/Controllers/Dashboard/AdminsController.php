<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Admin;
use App\Models\City;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $admins = Admin::all();

        // Flash MSG
        $success = session()->get('success');

        return view('dashboard.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('dashboard.admins.create', compact('cities'));
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
            $admin = Admin::create([
                'name' => $request->post('name'),
                'phone_number' => $request->post('phone_number'),
                'email' => $request->post('email'),
                'password' => Hash::make($request->post('password')),
                'city_id' => $request->post('city'),
                'avatar' => $image_path,
            ]);

            return redirect()->route('admin.index')->with('success', 'User ' . ($admin->name) . ' Created');
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
        $admin = Admin::findorFail($id);
        $cities = City::all();
        return view('dashboard.admins.edit', compact('cities', 'admin'));
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
        $admin = Admin::findOrFail($id);

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
        $admin->update([
            'name' => $request->post('name'),
            'phone_number' => $request->post('phone_number'),
            'email' => $request->post('email'),
            'avatar' => $image_path ?? $admin->avatar,
            'city_id' => $request->post('city'),
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin ' . $admin->name . ' Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin ' . ($admin->name) .  ' Deleted');
    }

    public function trash()
    {
        $admins = Admin::onlyTrashed()->get();
        return view('dashboard.admins.trash', compact('admins'));
    }

    public function restore(Request $request, $id = null)
    {
        if ($id) {
            $admins = Admin::onlyTrashed()->findOrFail($id);
            $admins->restore();

            // PTG
            return redirect()->route('admin.index')->with('success', 'Admin ' . $admins->name . ' Restored');
        }

        $admins = Admin::onlyTrashed()->restore();
        return redirect()->route('admin.index')->with('success', 'All Admins Restored');
    }

    public function forceDelete($id = null)
    {
        if ($id) {
            $admins = Admin::onlyTrashed()->findOrFail($id);


            $admins->forceDelete();

            // Delete Avatar
            unlink(public_path('uploads/' . $admins->avatar));

            // PTG
            return redirect()->route('admin.index')->with('success', 'Admin ' . $admins->name . ' Deleted');
        }

        $admins = Admin::onlyTrashed()->forceDelete();
        return redirect()->route('admin.index')->with('success', 'All Admins Deleted');
    }

}
