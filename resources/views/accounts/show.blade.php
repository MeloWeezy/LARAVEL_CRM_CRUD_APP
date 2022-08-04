@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2> Show accounts</h2>
            </div>
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('accounts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="flex flex-wrap ">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
            <div class="mb-4">
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