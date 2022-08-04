@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2> AVAILABLE USERS</h2>
            </div>
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('users.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="flex flex-wrap ">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
            <div class="mb-4">
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

