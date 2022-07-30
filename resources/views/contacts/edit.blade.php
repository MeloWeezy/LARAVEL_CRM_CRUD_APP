@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Contact</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contact.index') }}"> Back</a>
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

    <form action="{{ route('contact.update',$contact) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" value="{{ $contact->first_name }}" class="form-control" placeholder="First Name">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" value="{{ $contact->last_name }}" class="form-control" placeholder="Last Name">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $contact->email }}" class="form-control" placeholder="E-Mail">
                <strong>City:</strong>
                <input type="text" name="city" value="{{ $contact->city}}" class="form-control" placeholder="Region">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $contact->phone }}" class="form-control" placeholder="City">
                <strong>Country:</strong>
                <input type="text" name="country" value="{{ $contact->phone}}" class="form-control" placeholder="Name">
                <strong>Region:</strong>
                <input type="text" name="region" value="{{ $contact->phone}}" class="form-control" placeholder="Phone Number">
                <strong>address:</strong>
                <input type="text" name="address" value="{{ $contact->phone }}" class="form-control" placeholder="country">
                <strong>Postal Code:</strong>
                <input type="text" name="postal_code" value="{{ $contact->postal_code}}" class="form-control" placeholder="Address">
                <strong>Account:</strong>
                <select class="form-control" name="account_id">
                    <option value="{{$account->id}}">{{$account->name}}</option>
                </select>
                <br>
                <strong>Organization:</strong>
                <select  class="form-control" name="organization_id">
                    <option  value="{{$organization->id}}">{{$organization->name}}</option>
                </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


@endsection
