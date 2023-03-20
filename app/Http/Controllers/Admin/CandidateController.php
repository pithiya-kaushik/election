<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Party;
use App\Models\Location;

class CandidateController extends Controller
{
	public function index()
	{
		$candidates = Candidate::leftJoin('users', function($join) {
      		$join->on('candidates.user_id', '=', 'users.id');
    	})->leftJoin('parties', function($join) {
     		 $join->on('candidates.party_id', '=', 'parties.id');
  		})->leftJoin('locations', function($join) {
      		$join->on('candidates.location_id', '=', 'locations.id');
  		})->
  		select(['candidates.*',
  			'users.name as uname',
  			'parties.name as pname',
  			'locations.name as lname'
  		])->paginate(4);
		return view('admin.candidate.list',compact('candidates'));
	}

	public function create()
	{
		$users = User::all();
		$parties = Party::all();
		$locations = Location::where('type' , 'City' )->get();
		return view('admin.candidate.create',compact('users','parties','locations'));
	}

	public function save(Request $request)
	{
		$request->validate([
			'user_id' => 'required',
			'party_id' => 'required',
			'location_id' => 'required'
		]);

		Candidate::create(
			$request->all()
		);
		return redirect(route('candidate.list'));
	}	

	public function edit(Candidate $candidate)
	{
		$users = User::all();
		$parties = Party::all();
		$locations = Location::where('type' , 'City' )->get();
		return view('admin.candidate.edit',compact('candidate','users','parties','locations'));
	}

	public function store(Request $request , Candidate $candidate)
	{
		$request->validate([
			'user_id' => 'required',
			'party_id' => 'required',
			'location_id' => 'required'
		]);
		
		$candidate->update(
			$request->all()
		);
		return redirect(route('candidate.list'));
	}

	public function delete(Candidate $candidate)
	{
		$candidate->delete();
		return redirect(route('candidate.list'));
	}
}	