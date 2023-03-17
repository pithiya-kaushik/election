@extends('layout.main')
@section('content') 
@section('pageTitle')
Location Edit
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
      <h5 class="card-title">Party Create</h5>
      <form class="row g-3" method="post" action="{{ route('user.store',$user->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $user->id }}" >
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Phone No</label>
          <input type="text" name="phone_no" value="{{ $user->phone_no }}" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Voter No</label>
          <input type="text" name="voter_no" value="{{ $user->voter_no }}" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Email</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputNanme4">
        </div>
        <div class="col-sm-12">
          <label for="inputNanme4" class="form-label">Date Of Birth</label>
          <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control">
        </div>
         <div class="col-md-12">
          <label for="inputState" class="form-label">Location</label>
          <select id="inputState" name="location_id"  class="form-select">
            @foreach ( $locations as $val)
            <option value="{{ $val->id }}" {{ ($user->location_id == $val->id) ? 'selected' : ''  }}>{{ $val->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-sm-12">
          <label for="inputState" class="form-label">Photo</label>
          <input class="form-control" name="photo" type="file" id="formFile">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

