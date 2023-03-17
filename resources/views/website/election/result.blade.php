@extends('website.layout.main')
@section('content') 

<form method="post" action="{{ route('vote.result') }}">
	@csrf
	<div class="col-md-4">
	  <label for="inputState" class="form-label">Location</label>
	  <select id="inputState" name="location_id" class="form-select">
	  	@foreach( $results as $result )
	    @endforeach
	    @foreach ( $locations as $location)
		    @if(isset($result->location_id))
		    	<option value="{{ $location->id }}" {{ ($result->location_id == $location->id) ? 'selected' : ''  }}>{{ $location->name }}</option>
		    @else
		    	<option value="{{ $location->id }}"{{ $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
		    @endif
	    @endforeach
	  </select>
	</div>
	<div style="margin-top: 5px">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
<div class="col-lg-12 mt-3">
  <div class="card">
    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Candidate</th>
            <th scope="col">Location</th>
            <th scope="col">Party</th>
            <th scope="col">Image</th>
            <th scope="col">Voting</th>
          </tr>
        </thead>
        <tbody>
          @foreach( $results as $result )
        	<tr>
	            <td>{{ $result->uname }}</td>
	            <td>{{ $result->lname }}</td>
	            <td>{{ $result->pname }}</td>
	            <td><img src="{{ $result->image }}" width="80" height="80"></td>
	            <td>{{ $result->count }}</td>
          	</tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection