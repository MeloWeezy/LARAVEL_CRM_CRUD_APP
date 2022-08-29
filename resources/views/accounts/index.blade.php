@extends('layout')
 
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="text-center">
                <h1 class="align-middle text-center font-extrabold">Simple CRM APP</h1>
            </div>
            <br/>
            @can('create-account')
            <div class="text-center">
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
        <thead class="bg-gray-300 border-b-4 border-black">
        <tr>
            <th class="p-2text-sm font-semibold tracking-wide text-center">No</th>
            <th class="p-2text-sm font-semibold tracking-wide text-center">Name</th>
            <th class="p-2text-sm font-semibold tracking-wide text-center">Action</th>
        </tr>
       </thead>
        @foreach ($accounts as $account)
        @can('read-account',$account)
        <tbody>
        <tr class ="bg-gray-100">
            <td class="p-2text-sm font-semibold tracking-wide text-center">{{$account->id }}</td>
            <td class="p-2text-sm font-semibold tracking-wide text-center">{{ $account->name }}</td>
            <td class="p-2text-sm font-semibold tracking-wide text-center">
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
        </tbody>
        @endcan
        @endforeach
    </table>
     <br>
     {{$accounts->links()}} 
    <div class="text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
    </div>
    <br>
  

      
@endsection
