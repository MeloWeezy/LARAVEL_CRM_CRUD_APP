@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> AVAILABLE USERS</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $contact->first_name}}
                <br/>
                <strong>Last Name:</strong>
                {{ $contact->last_name}}
                <br/>
                <strong>E-mail:</strong>
                {{ $contact->email}}
                <br/>
                <strong>City:</strong>
                {{ $contact->city}}
                <br/>
                <strong>Phone:</strong>
                {{ $contact->phone}}
                <br/>
                <strong>Country:</strong>
                {{ $contact->country}}
                <br/>
               
                <strong>Region:</strong>
                {{ $contact->region}}
                <br/>
                <strong>Address:</strong>
                {{ $contact->address}}
                <strong>Postal Code:</strong>
                {{ $contact->postal_code}}
                <br/>
                <strong>Organization:</strong>
                {{ $contact->organizations_id}}
                <br/>
                <strong>Accounts_id:</strong>
                {{ $contact->accounts_id}}
                <br/>
                <strong>created_at:</strong>
                {{ $contact->created_at}}
                <strong>updated_at:</strong>
                {{ $contact->updated_at}}
                <strong>deleted_at:</strong>
                {{ $contact->deleted_at}}
            </div>
        </div>
        </div>
    </div>
@endsection

