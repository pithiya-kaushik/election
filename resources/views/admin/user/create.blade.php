@extends('layout.main')
@section('content') 
@section('pageTitle')
User Create
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
      <h5 class="card-title">User Create</h5>
      <form class="row g-3" method="post" action="{{ route('user.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
          @if($errors->has('name'))
            <div class="error text-danger">{{ $errors->first('name') }}</div>
          @endif
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Phone No</label>
          <input type="text" name="phone_no" class="form-control" id="inputNanme4">
          @if($errors->has('phone_no'))
            <div class="error text-danger">{{ $errors->first('phone_no') }}</div>
          @endif
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Voter No</label>
          <input type="text" name="voter_no" class="form-control" id="inputNanme4">
          @if($errors->has('voter_no'))
            <div class="error text-danger">{{ $errors->first('voter_no') }}</div>
          @endif
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputNanme4">
          @if($errors->has('email'))
            <div class="error text-danger">{{ $errors->first('email') }}</div>
          @endif
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Password</label>
          <input type="tex" name="password" class="form-control" id="inputNanme4">
          @if($errors->has('password'))
            <div class="error text-danger">{{ $errors->first('password') }}</div>
          @endif
        </div>
        <div class="col-sm-12">
          <label for="inputNanme4" class="form-label">Date Of Birth</label>
          <input type="date" name="date_of_birth" class="form-control">
        </div>
         <div class="col-md-12">
          <label for="inputState" class="form-label">Location</label>
          <select id="inputState" name="location_id" class="form-select">
            @foreach ( $locations as $location)
            <option value="{{ $location->id }}">{{ $location->name }}</option>
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

