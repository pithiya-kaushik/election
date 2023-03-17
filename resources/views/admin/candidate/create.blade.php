@extends('layout.main')
@section('content') 
@section('pageTitle')
Candidate Create
@endsection

<div class="col-lg-6">
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul >
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Candidate Create</h5>
      <form class="row g-3" method="post" action="{{ route('candidate.save') }}">
        @csrf
        <div class="col-md-12">
          <label for="inputState" class="form-label">User</label>
          <select id="inputState" name="user_id" class="form-select">
            @foreach ( $users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12">
          <label for="inputState" class="form-label">Party</label>
          <select id="inputState" name="party_id" class="form-select">
            @foreach ( $parties as $party)
            <option value="{{ $party->id }}">{{ $party->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-12">
          <label for="inputState" class="form-label">Location</label>
          <select id="inputState" name="location_id" class="form-select">
            @foreach ( $locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

