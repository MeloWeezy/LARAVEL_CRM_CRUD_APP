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
   
       
            <div class=" flex border-black  bg-gray-500 justify-self-center">
                <p ><strong >Name:</strong> {{ $account->name}}</p>
                <break>
                <p><strong>id:</strong> {{ $account->id}}</p>
                <break>
                <p>  <strong>created_at:</strong> {{ $account->created_at}}</p>
                <break>
                <p>  <strong>updated_at:</strong> {{ $account->updated_at}}</p>
                <break>
            </div>
            
      
 
    <br>
    <div class="text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('accounts.index') }}"> Back</a>
            </div>
@endsection 