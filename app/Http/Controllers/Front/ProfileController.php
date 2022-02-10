<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('Front.Profiles.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $profile = Profile::findOrFail($id);
        return view('Front.Profiles.edit', compact('profile'));
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
        $profile = Profile::findOrFail($id);
        $user = User::findOrfail(Auth::user()->id);


        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'nullable|email',
            'phone_number' => 'nullable|numeric|min:10',
            'avatar' => 'nullable',
            'password' => 'nullable|min:8|max:20',
            'new-password' => 'nullable|min:8|max:20',
            're-password' => 'nullable|min:8|max:20',
        ]);

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            
            $avatar_path = $file->store('/', [
                'disk' => 'uploads'
            ]);
          
        }

        $password_input = null;

        if ($request->post('password')) {
            if (Hash::check($request->password, Auth::user()->password) && $request->post('new-password') ==  $request->post('re-password')) {
                $password_input =  Hash::make($request->post('new-password'));
            }
        } else {
            $password_input = $user->password;
        }

        // dd($request);

        if ($request->has('first_name') || $request->has('last_name') || $request->has('new-password') || $request->has('email') || $request->has('phone_number') || $request->has('avatar')) {

            $profile->update([
                'avatar' => $avatar_path ?? $profile->avatar,
            ]);

            $user->update([
                'first_name' => $request->post('first_name'),
                'last_name' => $request->post('last_name'),
                'email' => $request->post('email'),
                'password' => $password_input,
                'phone_number' => $request->post('phone_number'),
            ]);
        }

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
