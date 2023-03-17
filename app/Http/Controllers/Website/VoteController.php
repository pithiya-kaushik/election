<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vote;
use App\Models\Location;
use App\Models\Candidate;
use Validator;
use Illuminate\Support\Facades\Hash;

class VoteController extends Controller
{
	public function index(Request $request)
	{
    // get user entry 

    $voter = User::where('voter_no',$request->voter_no)->first();
    
    $votes = [
      'candidate_id' => $request->candidate_id,
      'voter_no' => $voter ? $voter->id : null,
    ];
    
    $validator = Validator::make($votes,[
      'voter_no' => 'required|unique:votes,user_id',
    ]);
    
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors(),
        ], 422);

    }else{
      Vote::create([
        'user_id' => $voter->id,
        'candidate_id' => $request->candidate_id,
      ]);

       return response()->json(['success' => true , 'message'=> 'Thank you']);
    }
	}

  public function result()
  {
    $results = Candidate::with('user')->Join('votes', function($join) {
          $join->on('candidates.id',"=",'votes.candidate_id');
      })->Join('users', function($join) {
         $join->on('candidates.user_id', '=', 'users.id');
      })->Join('locations', function($join) {
         $join->on('candidates.location_id', '=', 'locations.id');
      })->Join('parties', function($join) {
         $join->on('candidates.party_id', '=', 'parties.id');
      })->
      select(['candidates.*',
        'users.name as uname',
        'locations.name as lname',
        'parties.name as pname',
        \DB::raw("COUNT(votes.candidate_id) as count")
      ])->groupBy('candidates.id')
      ->orderBy('count', 'DESC')
      ->get();
      
      foreach ($results as $key => $result) {
        foreach ($result->user as $key => $value) {
          $image = $value ->getMedia('photos')->first();
        }  
          $result->image = "";
          if($image) {
              $result->image  = $image->getFullUrl();
          }
      }


      $locations = Location::where('type' , 'City' )->get();
      
    return view('website.election.result',compact('results','locations'));
  }

  public function voteResult(Request $request)
  {

    $results = Candidate::with('user')->Join('votes', function($join) {
          $join->on('candidates.id',"=",'votes.candidate_id');
      })->Join('users', function($join) {
         $join->on('candidates.user_id', '=', 'users.id');
      })->Join('locations', function($join) {
         $join->on('candidates.location_id', '=', 'locations.id');
      })->Join('parties', function($join) {
         $join->on('candidates.party_id', '=', 'parties.id');
      })->
      select(['candidates.*',
        'users.name as uname',
        'locations.name as lname',
        'parties.name as pname',
        \DB::raw("COUNT(votes.candidate_id) as count")
      ])->where('candidates.location_id', $request->location_id)
      ->groupBy('candidates.id')
      ->orderBy('count', 'DESC')
      ->get();
      
      foreach ($results as $key => $result) {
        foreach ($result->user as $key => $value) {
          $image = $value ->getMedia('photos')->first();
        }  
          $result->image = "";
          if($image) {
              $result->image  = $image->getFullUrl();
          }
      }
      //echo '<pre>'; print_r($results); echo '</pre>';die;

      $locations = Location::where('type' , 'City' )->get();
      
    return view('website.election.result',compact('results','locations'));
  }
}