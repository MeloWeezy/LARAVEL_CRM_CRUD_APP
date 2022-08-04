@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2>Organization Details</h2>
            </div>
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('organizations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap ">
        <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
            <div class="mb-4">
                <strong>Organization Name:</strong>
                {{ $organization->name}}
                <br/>
                <strong>E-mail:</strong>
                {{ $organization->email}}
                <br/>
                <strong>City:</strong>
                {{ $organization->city}}
                <br/>
                <strong>Phone:</strong>
                {{ $organization->phone}}
                <br/>
                <strong>Country:</strong>
                {{ $organization->country}}
                <br/>

                <strong>Region:</strong>
                {{ $organization->region}}
                <br/>
                <strong>Address:</strong>
                {{ $organization->address}}
                <br/>
                <strong>Postal Code:</strong>
                {{ $organization->postal_code}}
                <br/>
                <strong>Organization:</strong>
                {{ $organization->name}}
                <br/>
                <strong>Account:</strong>
                {{ $organization->account->name}}
                <br/>
                <strong>created_at:</strong>
                {{ $organization->created_at}}
                <br/>
                <strong>updated_at:</strong>
                {{ $organization->updated_at}}
                <br/>
                <strong>deleted_at:</strong>
                {{ $organization->deleted_at}}
            </div>
        </div>
        </div>
    </div>
@endsection

