@extends('layout.main')
@section('content') 
@section('pageTitle')
Party List
@endsection

<div class="col-lg-6">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Parti List</h5>

      <table class="table table-striped">
        <div class="col-3">
              <button class="btn btn-primary w-100" type="submit"><a href="{{ route('party.create') }}" style="color: white">Create Party</a></button>
            </div>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $parties as $party)
          <tr>
            <th scope="row">{{ $party->id }}</th>
            <td>{{ $party->name }}</td>
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