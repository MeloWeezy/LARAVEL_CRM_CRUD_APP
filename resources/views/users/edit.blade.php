@extends('layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit User</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('users.update',$user) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control" placeholder="First Name">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control" placeholder="Last Name">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder="E-Mail">
                <strong>Photo Path:</strong>
                <input type="text" name="photo_path" value="{{ $user->photo_path}}" class="form-control" placeholder="Region">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control" placeholder="City">
                <strong>Account:</strong>
                <select placeholder ="select your account" class = "form-control" name ="accounts_id">
              
                        @foreach($account as $acc)
                        @can('show-accounts',$acc)
                    <option name ="accounts_id" placeholder ="SELECT "value = "{{$acc->id}}">{{$acc->name}}</option>
                        @endcan
                    @endforeach
                </select>
                <select placeholder ="select your organization" class = "form-control" name ="organizations_id">
              
                        @foreach($organization as $org)
                        @can('show-organizations',$org)
                    <option name ="organizations_id" placeholder ="SELECT "value = "{{$org->id}}">{{$org->name}}</option>
                        @endcan
                    @endforeach
                </select>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
   

@endsection