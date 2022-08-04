@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2 class ="align-middle text-center font-extrabold">CONTACTS OF THE SYSTEM</h2>
            </div>
            <br>
          @can('create-contact')
            <div class="pull-right">
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
        <tr>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
          <!--<th>E-MAIL</th>
            <th>Phone</th>
            <th>Address</th>
            <th>City</th>
            <th>Region</th>
            <th>Postal_code</th>
         -->
            <th width="280px">Action</th>
        </tr>
        @foreach ($contacts as $contact)
        @can('read-contact',$contact)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->last_name }}</td>
            <td>
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
       @endcan
        @endforeach
    </table>
  {{$contacts->links()}}
  <br>
    <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-green-500 text-white hover:bg-green-600" href="{{ route('dashboard') }}"> BACK</a>
            </div>
            <br>

@endsection
