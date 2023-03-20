@extends('layout.main')
@section('content') 
@section('pageTitle')
Candidate List
@endsection

<div class="col-lg-12">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Candidate List</h5>

      <table class="table table-striped">
        <div class="col-3">
          <a href="{{ route('candidate.create') }}" style="color: white; margin-left: 330%">
              <button class="btn btn-secondary w-70" type="submit">Create Cadidate</button>
          </a>
        </div>
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">User</th>
            <th scope="col">Party</th>
            <th scope="col">Location</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $candidates as $candidate)
          <tr>
            <th scope="row">{{ $candidate->id }}</th>
            <td>{{ $candidate->uname }}</td>
            <td>{{ $candidate->pname }}</td>
            <td>{{ $candidate->lname }}</td>
            <td>
              <a href="{{ route('candidate.edit',$candidate->id) }}"><i class="bi bi-box-arrow-in-up-right"></i></a>
              <form class="d-inline-block" method="post" onclick="return confirm('Are you sure you want to delete this item?');" action="{{ route('candidate.delete' , $candidate->id) }}">
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
            <a class="page-link" href="{{$candidates->previousPageUrl()}}">Preview</a>
          </li>
          @for($i=1;$i<=$candidates->lastPage();$i++)
            <li class="page-item">
              <a class="page-link" href="{{$candidates->url($i)}}">
                {{$i}}
              </a>
            </li>
          @endfor
          <li class="page-item">
            <a class="page-link" href="{{$candidates->nextPageUrl()}}">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>
        
@endsection