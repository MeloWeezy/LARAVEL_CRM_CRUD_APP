@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2 class ="text-center font-sans  "> AVAILABLE USERS</h2>
            </div>
            
        </div>
    </div>
   
             <br>
            <div class="mb-4  border-black  bg-gray-200 justify-self-center font-serif">
                <p class ="text-center"><strong>First Name:</strong>
                {{ $user->first_name}}
                 </p>
                <p class ="text-center"><strong>Last Name:</strong>
                {{ $user->last_name}}
                </p>
                <p class ="text-center"><strong>E-mail:</strong>
                {{ $user->email}}
                </p>
                <p class ="text-center"><strong>Photo_path:</strong>
                {{ $user->photo_path}}
                </p>
                <p class ="text-center"><strong>Phone:</strong>
                {{ $user->phone}}
                </p>
                <p class ="text-center"><strong>Accounts_id:</strong>
                {{ $user->account->name}}
                </p>
                <p class ="text-center"><strong>Organizations_id:</strong>
                {{ $user->organization->name}}
                </p>
                <p class ="text-center"><strong>created_at:</strong>
                {{ $user->created_at}}
                </p>
                <p class ="text-center"><strong>updated_at:</strong>
                {{ $user->updated_at}}
                </p>
                <p class ="text-center"><strong>deleted_at:</strong>
                {{ $user->deleted_at}}
                </p>
            </div>
            <div class=" flex w-full justify-center items-center" >
              <a type="submit" href="{{ route('users.index') }}" class="  border border-gray-400 text-center bg-green-600 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
     
@endsection

