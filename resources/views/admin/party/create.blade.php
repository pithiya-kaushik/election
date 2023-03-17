@extends('layout.main')
@section('content') 
@section('pageTitle')
Party Create
@endsection

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Party Create</h5>
      <form class="row g-3" method="post" action="{{ route('party.save') }}" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Your Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>
        <div class="col-sm-12">
          <label for="inputState" class="form-label">Image</label>
          <input class="form-control" name="image" type="file" id="formFile">
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

