<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
	public function index(){
		$locations = Location::all();
		return view('admin.location.list',compact('locations'));
	}

	public function create()
	{
		$locations = Location::all();

		return view('admin.location.create',compact('locations'));
	}

	public function save(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'type' => 'required',
			'parent_id' => 'required'
		]);

		Location::create(
			$request->all()
		);

		return redirect(route('location.list'));
	}

	public function edit(Location $location)
	{
		$locations = Location::all();
		return view('admin.location.edit',compact('location','locations'));
	}

	public function store(Request $request , Location $location)
	{
		$request->validate([
			'name' => 'required',
			'type' => 'required',
			'parent_id' => 'required'
		]);
		
		$location->update(
			$request->all()
		);
		return redirect(route('location.list'));
	}
	
	public function delete(Location $location)
	{
		$location->delete();

		return redirect(route('location.list'));
	}	
}