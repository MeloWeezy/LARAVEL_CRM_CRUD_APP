<x-app-layout>
{{--@section('content')--}}
   

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

    <div class="bg-white antialiased flex font-sans text-gray-900">



<form action="{{ route('organizations.update',$organization) }}" method="POST" class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
@csrf
@method('PUT')

<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Organization Name</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="name"
    value = "{{$organization->name}}"
  
  />
</div>
<div class="w-1/2">
  <label for="lastname">email</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="email"
    id="lastname"
    value = "{{$organization->email}}"
  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">City</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="city"
    value = "{{$organization->city}}"
  
  />
</div>
<div class="w-1/2">
  <label for="firstname">Phone</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="phone"
    value = "{{$organization->phone}}"

  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Country</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="country"
    id="firstname"
   value = "{{$organization->country}}"
  />
 
</div>
<div class="w-1/2">
  <label for="lastname">Region</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="region"
    id="lastname"
    value = "{{$organization->region}}"
  />
</div>
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Address:</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="address"
    id="firstname"
    value = "{{$organization->address}}"
  />
</div>
<div class="w-1/2">
  <label for="lastname">Postal Code:</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="postal_code"
    id="lastname"
    value = "{{$organization->postal_code}}"
  />
</div>
</div>
<div class="w-1/2">
  <label for="firstname">Photo Path</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="photo_path"
    value = "{{$organization->photo_path}}"
  
  />
</div>
<div class="flex space-x-4">
<div class="w-1/2">
  <label for="firstname">Account</label>
  <select
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="account_id"
    id="firstname"
    value = "{{$organization->account->name}}"
  >
       <option name ="account_id" placeholder ="SELECT "value = "{{$account->id}}">{{$organization->account->name}}</option>
</select>
</div>

</div>
<div class="flex space-x-4">
   <div class="w-1/2">
              <button type="submit" class="border border-gray-400 bg-red-500 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">Submit</button>
    </div>

    <div class="w-1/2">
              <a type="submit" href="{{ route('organizations.index') }}" class="border border-gray-400 text-center bg-red-500 px-4 py-2 hover:none rounded w-full focus:outline-none focus:border-teal-400">BACK</a>
    </div>
        
</div>

</form>
</div>

{{--@endsection--}}

</x-app-layout>