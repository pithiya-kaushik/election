<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class RegisterController extends Controller
{
    public function index()
    {
    	return view('admin.auth.register');
    }

    public function register(Request $request){
    	$request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'password' => 'required',
            
        ]);

        $params = $request->all();

        $params['password'] = Hash::make($params['password']);

        $user = User::create($params);

        Auth::loginUsingId($user->id);

         return redirect()->route('admin.list');
    }
    
}
