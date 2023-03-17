@extends('website.layout.main')
@section('content') 
@section('pageTitle')
Register
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
      <h5 class="card-title">Register</h5>
      <form class="row g-3" method="post" action="{{ route('register') }}">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Phone No</label>
          <input type="text" name="phone_no" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Password</label>
          <input type="tex" name="password" class="form-control" id="inputNanme4">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

