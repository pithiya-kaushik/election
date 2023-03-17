<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\User;
use App\Models\Party;
use App\Models\Location;

class ElectionController extends Controller
{
	public function index()
	{
		$elections = Candidate::Join('users', function($join) {
      		$join->on('candidates.user_id', '=', 'users.id');
    	})->leftJoin('parties', function($join) {
     		 $join->on('candidates.party_id', '=', 'parties.id');
  		})->leftJoin('locations', function($join) {
      		$join->on('candidates.location_id', '=', 'locations.id');
  		})->
  		get(['candidates.*',
  			'users.name as uname',
  			'parties.name as pname',
  			'locations.name as lname'
  		]);

      $locations = Location::where('type' , 'City' )->get();
  		
		return view('website.election.dashboard',compact('elections','locations'));
	}

  public function location(Request $request)
  {
    $elections = Candidate::Join('users', function($join) {
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
      ])->where('candidates.location_id', $request->location_id)->get();
       
       $locations = Location::where('type' , 'City' )->get();

    return view('website.election.dashboard',compact('elections','locations'));
  }
}	