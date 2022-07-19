@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Available Organizations</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('organizations.create') }}"> Add New organization</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($organization as $organization)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>
            <td>{{ $organization->name }}</td>
            <td>
                <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('organizations.show',$organization->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('organizations.edit',$organization->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dashboard') }}"> BACK</a>
            </div>
      
@endsection
