<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Party;

class PartyController extends Controller
{
	public function index(){

		$parties = Party::all();

		foreach ($parties as $key => $party) {
          	$images = $party ->getMedia('images')->first();
          	$party->photo = "";
	        if($images) {
	            $party->photo  = $images->getFullUrl();
	        }
      	}
		return view('admin.party.list',compact('parties'));
	}

	public function create()
	{
		return view('admin.party.create');
	}

	public function save(Request $request)
	{
		$request->validate([
			'name' => 'required'
		]);

		$party = Party::create([
			'name' => $request->get('name')
		]);

		if ($request->image) {
			$party->addMediaFromRequest('image')->toMediaCollection('images');
		}
		return redirect(route('party.list'));
	}

	public function edit(Party $party)
	{
		return view('admin.party.edit',compact('party'));
	}

	public function store(Request $request , Party $party)
	{
		$party->update([
			'name' => $request->get('name')
		]);

		if($request->hasFile('image')) {
            $medias = $party->getMedia('images');
            foreach ($medias as $key => $media) {
            	$media->delete();
            }
            
            $party->addMedia($request->file('image'))->toMediaCollection('images');
        }
		return redirect(route('party.list'));
	}

	public function delete(Party $party)
	{
		$party->delete();
		return redirect(route('party.list'));
	}

}