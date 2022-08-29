@extends('layout')
 
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                @role('user')
                <h2 class ="align-middle text-center font-extrabold">User Profile</h2>
                @endrole

                @role('admin')
                <h2 class ="align-middle text-center font-extrabold">Users</h2>
                @endrole

            </div>
            </div>
        </div>
    </div>
    <br>
   
    @if ($message = Session::get('success'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class=" table-auto w-full  mb-4 table-bordered">
        <thead class ="bg-gray-100 border-b-4 border-black">
            <tr>
            <th class="p-2text-sm font-semibold tracking-wide text-center" >No</th>
            <th class="p-2 text-sm font-semibold tracking-wide text-center">First Name</th>
            <th class="p-2 text-sm font-semibold tracking-wide text-center">Last Name</th>
          <!--<th>E-MAIL</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Region</th>
            <th>Postal_code</th>
         -->
            <th class="p-2 text-sm font-semibold tracking-wide text-center">Action</th>
</tr>
        </thead>
        @foreach ($users as $user)
        <tbody>
    
        <tr class ="bg-gray-300">
    
            <td class="p-2 text-sm font-semibold tracking-wide text-center ">{{ $user->id}}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center">{{ $user->first_name }}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center">{{ $user->last_name }}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center ">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
   
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" href="{{ route('users.show',$user->id) }}">Show</a>
    
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('users.edit',$user->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                </form>
            </td>
        </tr>
        <tbody>
   
  
        @endforeach
    </table>

        {{$users->links()}}  
  
    <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
            </div>
      
@endsection
