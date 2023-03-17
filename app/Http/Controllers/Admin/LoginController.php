<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function index()
	{
		return view('admin.auth.login');
	}

	public function login(Request $request)
	{

		$credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('location.list');
        }else{
            return view('admin.auth.login');
        }
	}

	public function logout(Request $request)
    {

        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
	
}