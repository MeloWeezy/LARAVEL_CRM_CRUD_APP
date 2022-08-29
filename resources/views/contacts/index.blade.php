@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            @role('admin')
            <div class="pull-left">
                <h2 class ="align-middle text-center font-extrabold">CONTACTS YOUR ACCOUNT</h2>
            </div>
            @endrole
            @role('User')
            <div class="pull-left">
                <h2 class ="align-middle text-center font-extrabold">CONTACTS OF YOUR ORGANIZATION</h2>
            </div>
            @endrole
            @role('super_admin')
            <div class="pull-left">
                <h2 class ="align-middle text-center font-extrabold">CONTACTS OF THE SYSTEM</h2>
            </div>
            @endrole
            <br>
          @can('create-contact')
            <div class="text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
            @endcan
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="w-full max-w-full mb-4 bg-transparent table-bordered">
        <thead class ="bg-gray-300 border-b-4 border-black">
        <tr>
            <th class="p-2text-sm font-semibold tracking-wide text-center">No</th>
            <th class="p-2text-sm font-semibold tracking-wide text-center">First Name</th>
            <th class="p-2text-sm font-semibold tracking-wide text-center">Last Name</th>
          <!--<th>E-MAIL</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Region</th>
            <th>Postal_code</th>
         -->
            <th class="p-2text-sm font-semibold tracking-wide text-center">Action</th>
        </tr>
       </thead>
        @foreach ($contacts as $contact)
        @can('read-contact',$contact)
        <tbody>
        <tr class ="bg-gray-100">
            <td class="p-2 text-sm font-semibold tracking-wide text-center">{{ $contact->id}}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center">{{ $contact->first_name }}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center">{{ $contact->last_name }}</td>
            <td class="p-2 text-sm font-semibold tracking-wide text-center">
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">

                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" href="{{ route('contacts.show',$contact->id) }}">Show</a>
                    @can('update-contact',$contact)
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('delete-contact',$contact)
                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
       </tbody>
       @endcan
        @endforeach
    </table>
  {{$contacts->links()}}
  <br>
    <div class="text-center">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
            </div>
            <br>

@endsection
