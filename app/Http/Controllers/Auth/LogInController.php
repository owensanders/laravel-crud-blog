<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogInController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login details');
        }

        return redirect()->route('dashboard');
    }
}
