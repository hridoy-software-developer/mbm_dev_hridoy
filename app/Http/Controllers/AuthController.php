<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    # index
    public function index() {
        return Inertia::render('Login');
    }

    # login
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return redirect()->back()->with('error','Oppes! You have entered invalid credentials or Unauthorized'); 
        }

        return redirect('admin/dashboard')->with('info','Welcome ! you are ready to go'); 
    }

    # logout
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success','Successfully logged out');
    }
}
