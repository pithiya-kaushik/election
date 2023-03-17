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
      <form class="row g-3" method="post" action="{{ route('location.store',$location->id) }}">
        @csrf
        <input type="hidden" value="{{ $location->id }}" >
        <div class="col-12">
          <label for="inputNanme4" class="form-label"> Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4" value="{{ $location->name }}">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Type</label>
          <input type="text" name="type" class="form-control" id="inputNanme4" value="{{ $location->type }}">
        </div>
        <div class="col-md-12">
          <label for="inputState" class="form-label">Parent</label>
          <select id="inputState" name="parent_id" class="form-select">
            @foreach ( $locations as $val)
            <option value="{{ $val->id }}" {{ ($location->parent_id == $val->parent_id) ? 'selected' : ''  }}>{{ $val->name }}</option>
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

