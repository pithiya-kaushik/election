@extends('layout.main')
@section('content') 
@section('pageTitle')
Location List
@endsection

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Location List</h5>

      <table class="table table-striped">
        <div class="col-3">
          <a href="{{ route('location.create') }}" style="color: white; margin-left: 280%">
              <button class="btn btn-secondary w-100" type="submit">Create Location</button>
          </a>  
        </div>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Parent</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $locations as $location)
          <tr>
            <th scope="row">{{ $location->id }}</th>
            <td>{{ $location->name }}</td>
            <td>{{ $location->type }}</td>
            <td>{{ $location->parent_id }}</td>
            <td>
                <a href="{{ route('location.edit',$location->id) }}"><i class="bi bi-box-arrow-in-up-right"></i></a>
                <form class="d-inline-block" method="post" onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('location.delete' , $location->id) }}">
                  @csrf
                  @method('DELETE')
                  <div class="text">
                    <button type="submit"><i class="bi bi-trash"></i></button>
                  </div>
                </form>
            </td>
          </tr>
          
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
        
@endsection