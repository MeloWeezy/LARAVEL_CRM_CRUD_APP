@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2> Contact Details</h2>
            </div>
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('contacts.index') }}">Back</a>
            </div>
        </div>
    </div>
   
    <div class="flex flex-wrap ">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
            <div class="mb-4">
                <strong>First Name:</strong>
                {{ $contact->first_name}}
                <br/>
                <strong>Last Name:</strong>
                {{ $contact->last_name}}
                <br/>
                <strong>E-mail:</strong>
                {{ $contact->email}}
                <br/>
                <strong>City:</strong>
                {{ $contact->city}}
                <br/>
                <strong>Phone:</strong>
                {{ $contact->phone}}
                <br/>
                <strong>Country:</strong>
                {{ $contact->country}}
                <br/>
               
                <strong>Region:</strong>
                {{ $contact->region}}
                <br/>
                <strong>Address:</strong>
                {{ $contact->address}}
                <strong>Postal Code:</strong>
                {{ $contact->postal_code}}
                <br/>
                <strong>Organization:</strong>
                {{ $contact->organization->name}}
                <br/>
                <strong>Account:</strong>
                {{ $contact->account->name}}
                <br/>
                <strong>created_at:</strong>
                {{ $contact->created_at}}
                <br/>
                <strong>updated_at:</strong>
                {{ $contact->updated_at}}
                <br/>
                <strong>deleted_at:</strong>
                {{ $contact->deleted_at}}
            </div>
        </div>
        </div>
    </div>
@endsection

