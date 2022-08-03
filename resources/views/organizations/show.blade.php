@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Organization Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('organizations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Organization Name:</strong>
                {{ $organization->name}}
                <br/>
                <strong>E-mail:</strong>
                {{ $organization->email}}
                <br/>
                <strong>City:</strong>
                {{ $organization->city}}
                <br/>
                <strong>Phone:</strong>
                {{ $organization->phone}}
                <br/>
                <strong>Country:</strong>
                {{ $organization->country}}
                <br/>

                <strong>Region:</strong>
                {{ $organization->region}}
                <br/>
                <strong>Address:</strong>
                {{ $organization->address}}
                <br/>
                <strong>Postal Code:</strong>
                {{ $organization->postal_code}}
                <br/>
                <strong>Organization:</strong>
                {{ $organization->name}}
                <br/>
                <strong>Account:</strong>
                {{ $organization->account->name}}
                <br/>
                <strong>created_at:</strong>
                {{ $organization->created_at}}
                <br/>
                <strong>updated_at:</strong>
                {{ $organization->updated_at}}
                <br/>
                <strong>deleted_at:</strong>
                {{ $organization->deleted_at}}
            </div>
        </div>
        </div>
    </div>
@endsection

