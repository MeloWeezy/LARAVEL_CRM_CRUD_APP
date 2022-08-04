@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2 class= "align-middle text-center font-extrabold">Available Organizations</h2>
            </div>
            <br>
           @can('create-organization')
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('organizations.create') }}"> Add New organization</a>
            </div>
            @endcan
           
        </div>
    </div>
    
        
  
    @if ($message = Session::get('success'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br>
    <table class="w-full max-w-full mb-4 bg-transparent table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($organizations as $organization)
        @can('read-organization',$organization)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>
            <td>{{ $organization->name }}</td>
            <td>
                <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST">
                     
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" href="{{ route('organizations.show',$organization->id) }}">Show</a>
                      
                       @can('update-organization',$organization)
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('organizations.edit',$organization->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')

                    @can('delete-organization',$organization)
                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endcan
        @endforeach
    </table>
    {{$organizations->links()}}
    <br>
    <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
            </div>

@endsection
