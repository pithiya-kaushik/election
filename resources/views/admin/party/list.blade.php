@extends('layout.main')
@section('content') 
@section('pageTitle')
Party List
@endsection

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Party List</h5>

        <div class="col-3">
            <a href="{{ route('party.create') }}" style="color: white; margin-left: 280%;">
              <button class="btn btn-secondary w-100" type="submit">Create Party</button>
            </a>
        </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Logo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $parties as $party)
          <tr>
            <th scope="row">{{ $party->id }}</th>
            <td>{{ $party->name }}</td>
            <td><img src="{{ $party->photo }}" width="60" height="60"></td>
            <td>
                <a href="{{ route('party.edit',$party->id) }}"><i class="bi bi-box-arrow-in-up-right"></i></a>
                <form class="d-inline-block" method="post" onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('party.delete' , $party->id) }}">
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