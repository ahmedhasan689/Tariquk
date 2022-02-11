<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Path;

class PathsController extends Controller
{
    
    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'path' => 'required|min:5',
        ]);

        $path = Path::create([
            'user_id' => Auth::user()->id,
            'path' => $request->post('path'),
        ]);

        return redirect()->route('profile.index');
    }

}
