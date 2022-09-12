@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class= "align-middle text-center font-extrabold">
                <h2> Account Details</h2>
            </div>
            
        </div>
    </div>
   <br>
   
       
            <div class="  border-black  bg-gray-200 justify-self-center font-serif">
                <p class ="text-center "><strong>Name:</strong>{{ $account->name}}</p>
           
                <p class ="text-center"><strong>id:</strong>{{ $account->id}}</p>
           
                <p class ="text-center"><strong>Created at:</strong> {{ $account->created_at}}</p>
          
                <p class ="text-center"><strong>updated_at:</strong>{{ $account->updated_at}}</p>
            
            </div>
            
            
      
 
    <br>
    <div class="w-fill">
              <a type="submit" href="{{ route('accounts.index') }}" class="border border-gray-400 text-center bg-green-600 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
@endsection 