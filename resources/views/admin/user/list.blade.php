@extends('layout.main')
@section('content') 
@section('pageTitle')
User List
@endsection

<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">User List</h5>

      <table class="table table-striped">
        <div class="col-3">
          <a href="{{ route('user.create') }}" style="color: white; margin-left: 350%">
              <button class="btn btn-secondary w-70" type="submit">Create User</button>
          </a>
        </div>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Phone No</th>
            <th scope="col">Voter No</th>
            <th scope="col">Email</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">Location</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $users as $user )

          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone_no }}</td>
            <td>{{ $user->voter_no }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->date_of_birth }}</td>
            <td>{{ $user->lname }}</td>
            <td>
                <a href="{{ route('user.edit',$user->id) }}"><i class="bi bi-box-arrow-in-up-right"></i></a>
                <form class="d-inline-block" method="post" onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('user.delete' , $user->id) }}">
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
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="{{$users->previousPageUrl()}}">Preview</a>
          </li>
          @for($i=1;$i<=$users->lastPage();$i++)
            <li class="page-item">
              <a class="page-link" href="{{$users->url($i)}}">
                {{$i}}
              </a>
            </li>
          @endfor
          <li class="page-item">
            <a class="page-link" href="{{$users->nextPageUrl()}}">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
        
@endsection