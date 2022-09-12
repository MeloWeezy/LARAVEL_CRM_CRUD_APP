@extends('layout')
  
@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2 class="text-center font-sans"> Contact Details</h2>
            </div>
          
        </div>
    </div>
    <br>
   
    
            <div class="mb-4  border-black  bg-gray-200 justify-self-center font-serif">
                <p class="text-center"><strong>First Name:</strong>
                {{ $contact->first_name}}
                 </p>
                <p class="text-center"><strong>Last Name:</strong>
                {{ $contact->last_name}}
                </p>
                <p class="text-center"><strong>E-mail:</strong>
                {{ $contact->email}}
                </p>
                <p class="text-center"><strong>City:</strong>
                {{ $contact->city}}
                </p>
                <p class="text-center"><strong>Phone:</strong>
                {{ $contact->phone}}
                </p>
                <p class="text-center"><strong>Country:</strong>
                {{ $contact->country}}
                </p>
               
                <p class="text-center"><strong>Region:</strong>
                {{ $contact->region}}
                </p>
                <p class="text-center"><strong>Address:</strong>
                {{ $contact->address}}
                </p>
                <p class="text-center">
                <strong>Postal Code:</strong>
                {{ $contact->postal_code}}
                </p>
                <p class="text-center"><strong>Organization:</strong>
                {{ $contact->organization->name}}
                </p>
                <p class="text-center"><strong>Account:</strong>
                {{ $contact->account->name}}
                </p>
                <p class="text-center"><strong>created_at:</strong>
                {{ $contact->created_at}}
                </p>
                <p class="text-center"><strong>updated_at:</strong>
                {{ $contact->updated_at}}
                </p>
                <p class="text-center"><strong>deleted_at:</strong>
                {{ $contact->deleted_at}}
                </p>
            </div>

            <div class="w-fill">
              <a type="submit" href="{{ route('contacts.index') }}" class="border border-gray-400 text-center bg-green-600 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
   
@endsection

