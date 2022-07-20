@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Contact</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('contacts.index') }}"> Back</a>
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

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                <strong>Last Name:</strong>
                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" placeholder="E-Mail">
                <strong>City:</strong>
                <input type="text" name="city" class="form-control" placeholder="Region">
                <strong>Phone:</strong>
                <input type="text" name="phone" class="form-control" placeholder="City">
                <strong>Country:</strong>
                <input type="text" name="country" class="form-control" placeholder="Name">
                <strong>Region:</strong>
                <input type="text" name="region" class="form-control" placeholder="Phone Number">
                <strong>address:</strong>
                <input type="text" name="address" class="form-control" placeholder="country">
                <strong>Postal Code:</strong>
                <input type="text" name="postal_code" class="form-control" placeholder="Address">
                <strong>Account:</strong>
                <select placeholder ="select your organization" class = "form-control" name ="accounts_id">

                       @foreach($account as $acc)

                       <option name ="accounts_id" placeholder ="SELECT "value = "{{$acc->id}}">{{$acc->name}}</option>
                       @endforeach
                </select>
                <br>
                <strong>Organization:</strong>
                <select placeholder ="select your organization" class = "form-control" name ="organizations_id">

                       @foreach($organization as $org)

                       <option name ="organizations_id" placeholder ="SELECT "value = "{{$org->id}}">{{$org->name}}</option>
                       @endforeach
                </select>
                <br


            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
