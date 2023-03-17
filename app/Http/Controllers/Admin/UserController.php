<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function index(){
		$users = User::leftJoin('locations', function($join) {
		      $join->on('users.location_id', '=', 'locations.id');
		})
	    ->get([
	        'users.*',
	        'locations.name as lname'
	    ]);
	    
		return view('admin.user.list',compact('users'));
	}

	public function create()
	{
		$locations = Location::where('type' , 'City' )->get();
		return view('admin.user.create',compact('locations'));
	}

	public function save(Request $request)
	{	
		$pass = Hash::make($request->password);
		$request->validate([
			'name' => 'required',
        	'phone_no' => 'required',
        	'voter_no' => 'required',
        	'email' => 'required',
        	'date_of_birth' => 'required',
        	'location_id' => 'required'
        ]);

		$user = User::create(
			$request->all()
		);

		if ($request->photo) {
			$user->addMediaFromRequest('photo')->toMediaCollection('photos');
		}

		return redirect(route('user.list'));
	}

	public function edit(User $user)
	{
		$locations = Location::where('type' , 'City' )->get();
		return view('admin.user.edit',compact('user','locations'));
	}

	public function store(Request $request , User $user)
	{
		$request->validate([
			'name' => 'required',
        	'phone_no' => 'required',
        	'voter_no' => 'required',
        	'email' => 'required',
        	'date_of_birth' => 'required',
        	'location_id' => 'required'
        ]);

		$user->update(
			$request->all()
		);
		
        if($request->hasFile('photo')) {
            $medias = $user->getMedia('photos');
            foreach ($medias as $key => $media) {
            	$media->delete();
            }
            $user->addMedia($request->file('photo'))->toMediaCollection('photos');
        }
		
        return redirect(route('user.list'));
	}

	public function delete(User $user)
	{
		$user->delete();

		return redirect(route('user.list'));
	}
}