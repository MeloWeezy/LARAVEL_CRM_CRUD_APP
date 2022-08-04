@extends('layout')
 
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div >
                <h1 class="align-middle text-center font-extrabold">Simple CRM APP</h1>
            </div>
            <br/>
            @can('create-account')
            <div class="pull-left justify-end">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('accounts.create') }}"> Create New Account</a>
            </div>
            <br/>
          
            @endcan
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="w-full max-w-full mb-4 bg-transparent table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($accounts as $account)
        @can('read-account',$account)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>
            <td>{{ $account->name }}</td>
            <td>
                <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
                     @can('read-account',$account)
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" href="{{ route('accounts.show',$account->id) }}">Show</a>
                    @endcan
                     @can('update-account',$account)
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('accounts.edit',$account->id) }}">Edit</a>
                     @endcan
                    @csrf
                    @method('DELETE')
                     @can('delete-account',$account)
                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endcan
        @endforeach
    </table>
     <br>
     {{$accounts->links()}} 
    <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
    </div>
    <br>
  

      
@endsection
