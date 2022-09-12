@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2 class ="text-center">Organization Details</h2>
            </div>
          
        </div>
    </div>

    
            <div class="mb-4  border-black  bg-gray-200 justify-self-center font-serif">
                <p class ="text-center"><strong>Organization Name:</strong>
                {{ $organization->name}}
                </p>
                <p class ="text-center"><strong>E-mail:</strong>
                {{ $organization->email}}
                </p>
                <p class ="text-center"><strong>City:</strong>
                {{ $organization->city}}
                </p>
                <p class ="text-center"><strong>Phone:</strong>
                {{ $organization->phone}}
                </p>
                <p class ="text-center"><strong>Country:</strong>
                {{ $organization->country}}
                </p>

                <p class ="text-center"> <strong>Region:</strong>
                {{ $organization->region}}
                </p>
                <p class ="text-center"><strong>Address:</strong>
                {{ $organization->address}}
                </p>
                <p class ="text-center"><strong>Postal Code:</strong>
                {{ $organization->postal_code}}
                </p>
                <p class ="text-center"><strong>Organization:</strong>
                {{ $organization->name}}
                </p>
                <p class ="text-center"><strong>Account:</strong>
                {{ $organization->account->name}}
                </p>
                <p class ="text-center"><strong>created_at:</strong>
                {{ $organization->created_at}}
                </p>
                <p class ="text-center"><strong>updated_at:</strong>
                {{ $organization->updated_at}}
                </p>
                <p class ="text-center"><strong>deleted_at:</strong>
                {{ $organization->deleted_at}}
            </div>
      
            <div class="w-fill">
              <a type="submit" href="{{ route('organizations.index') }}" class="border border-gray-400 text-center bg-green-600 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
@endsection

