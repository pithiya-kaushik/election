@extends('layout.main')
@section('content') 
@section('pageTitle')
Location Create
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
      <h5 class="card-title">Location Create</h5>
      <form class="row g-3" method="post" action="{{ route('location.save') }}">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
          @if($errors->has('name'))
            <div class="error text-danger">{{ $errors->first('name') }}</div>
          @endif
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Type</label>
          <input type="text" name="type" class="form-control" id="inputNanme4">
          @if($errors->has('type'))
            <div class="error text-danger">{{ $errors->first('type') }}</div>
          @endif
        </div>
        <div class="col-md-12">
          <label for="inputState" class="form-label">Parent</label>
          <select id="inputState" name="parent_id" class="form-select">
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

