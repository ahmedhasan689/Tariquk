<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // dd($request);
        if ($request->type == 'admin') {
            $guardName = 'admin';
        } elseif ($request->type == 'subadmin') {
            $guardName = 'subadmin';
        } else {
            $guardName = 'web';
        }

        if (Auth::guard($guardName)->attempt([
            'email' => $request->email, 
            'password' => $request->password,
            ])) {
            if ($request->type == 'admin') {

                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::ADMIN);

            } elseif ($request->type == 'subadmin') {

                return redirect()->intended(RouteServiceProvider::SUBADMIN);

            } else {

                return redirect()->intended(RouteServiceProvider::HOME);

            }
        };

        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $type)
    {
        // dd($type);
       
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }
}
