@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CONTACTS OF THE SYSTEM</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('contacts.create') }}"> Create New Contact</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
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
        @foreach ($contact as $contact)
        <tr>
            <td>{{ ($loop->index)+1 }}</td>
            <td>{{ $contact->first_name }}</td>
            <td>{{ $contact->last_name }}</td>
            <td>
                <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('contact.show',$contact->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('contact.edit',$contact->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
                <a class="btn btn-success" href="{{ route('dashboard') }}"> BACK</a>
            </div>

@endsection
