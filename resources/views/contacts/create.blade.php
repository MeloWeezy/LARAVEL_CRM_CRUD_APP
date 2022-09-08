@extends('layout')

@section('content')
<div class="flex flex-wrap ">
    <div class="lg:w-full pr-4 pl-4 margin-tb">
        <div class="pull-left">
            <h2>Add New Contact</h2>
        </div>
        <div class="pull-right">
            <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('contacts.index') }}"> Back</a>
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
<!--action="{{ route('contacts.store') }}" method="POST"-->
<div class="bg-white antialiased flex font-sans text-gray-900">



<form action="{{ route('contacts.store') }}" method="POST"class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
@csrf
@method('PUT')
<div>
<h1 class="text-4xl font-bold">Edit Contact</h1>

</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">First Name</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="first_name"
    id="firstname"
  />
</div>
<div class="w-1/2">
  <label for="lastname">Last Name</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="last_name"
    id="lastname"
  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="Email">E-Mail</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="email"
  
  />
</div>
<div class="w-1/2">
  <label for="firstname">Phone</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="phone"

  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">City</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="first_name"
    id="firstname"
  />
</div>
<div class="w-1/2">
  <label for="lastname">Country</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="last_name"
    id="lastname"
  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Region</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="first_name"
    id="firstname"
  />
</div>
<div class="w-1/2">
  <label for="lastname">Address</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="last_name"
    id="lastname"
  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Postal code</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="photo_path"
  
  />

</div>
<div class="w-1/2">
  <label for="firstname">Photo Path</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="photo_path"
  />

</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Account</label>
  <select
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="account_id"
    id="firstname"
  >
       <option name ="account_id" placeholder ="SELECT "value = "{{$account->id}}">{{$organization->account->name}}</option>
</select>

</div>
<div class="w-1/2">
  <label for="Organization">Organization</label>
  <select
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="organization_id"
    id="organization"
  >
  <option name ="organization_id" placeholder ="SELECT "value = "{{$organization->id}}">{{$organization->name}}</option>
</select>
</div>
</div>
<div class="flex space-x-4">
   <div class="w-1/2">
              <button type="submit" class="border border-gray-400 bg-green-600 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">Submit</button>
    </div>

    <div class="w-1/2">
              <a type="submit" href="{{ route('contacts.index') }}" class="border border-gray-400 text-center bg-green-600 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
        
</div>

</form>
</div>
@endsection
