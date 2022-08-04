@extends('layout')

@section('content')
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                <h2>Edit Organization</h2>
            </div>
            <div class="pull-right">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('organizations.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('organizations.update',$organization) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="flex flex-wrap ">
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                <strong>Organization Name:</strong>
                <input type="text" name=" name" value="{{ $organization->name }}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Organization Name">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $organization->email }}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="E-Mail">
                <strong>City:</strong>
                <input type="text" name="city" value="{{ $organization->city}}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Region">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $organization->phone }}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="City">
                <strong>Country:</strong>
                <input type="text" name="country" value="{{ $organization->phone}}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Name">
                <strong>Region:</strong>
                <input type="text" name="region" value="{{ $organization->phone}}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Phone Number">
                <strong>address:</strong>
                <input type="text" name="address" value="{{ $organization->phone }}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="country">
                <strong>Postal Code:</strong>
                <input type="text" name="postal_code" value="{{ $organization->postal_code}}" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Address">
                <strong>Account:</strong>
                <select placeholder ="select your organization" class = "block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name ="account_id">
                       <option name ="account_id" placeholder ="SELECT "value = "{{$account->id}}">{{$account->name}}</option>
                </select>
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4 text-center">
              <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Submit</button>
            </div>
        </div>

    </form>


@endsection
