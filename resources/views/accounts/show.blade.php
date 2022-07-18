@extends('layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show accounts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('accounts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $account->name}}
                <br/>
                <strong>id:</strong>
                {{ $account->id}}
                <br/>
                <strong>created_at:</strong>
                {{ $account->created_at}}
                <br/>
                <strong>updated_at:</strong>
                {{ $account->updated_at}}
            </div>
        </div>
        </div>
    </div>
@endsection