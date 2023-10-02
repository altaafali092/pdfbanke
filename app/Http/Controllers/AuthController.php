<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginPage(){
        return view('frontend.auth.login');
    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:7']
        ]);
        if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('admin/dashboard');
        } else {
            return back()->with('error', 'user credential not matched');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('loginPage'));
    }
}
