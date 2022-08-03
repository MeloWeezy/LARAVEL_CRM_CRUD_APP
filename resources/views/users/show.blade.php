@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> AVAILABLE USERS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $user->first_name}}
                <br/>
                <strong>Last Name:</strong>
                {{ $user->last_name}}
                <br/>
                <strong>E-mail:</strong>
                {{ $user->email}}
                <br/>
                <strong>Photo_path:</strong>
                {{ $user->photo_path}}
                <br/>
                <strong>Phone:</strong>
                {{ $user->phone}}
                <br/>
                <strong>Accounts_id:</strong>
                {{ $user->account->name}}
                <br/>
                <strong>Organizations_id:</strong>
                {{ $user->organization->name}}
                <br/>
                <strong>created_at:</strong>
                {{ $user->created_at}}
                <br/>
                <strong>updated_at:</strong>
                {{ $user->updated_at}}
                <br/>
                <strong>deleted_at:</strong>
                {{ $user->deleted_at}}
            </div>
        </div>
        </div>
    </div>
@endsection

