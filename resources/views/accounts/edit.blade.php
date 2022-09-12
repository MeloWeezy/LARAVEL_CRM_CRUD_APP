@extends('layout')
   
@section('content')
   
   
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
 <!--action="{{ route('accounts.update',$account) }}"-->
 <div class="bg-white antialiased flex font-sans text-gray-900">



<form action="{{ route('accounts.update',$account) }}" method="POST" class="px-4 rounded mx-auto max-w-3xl w-full  inputs space-y-6">
@csrf
@method('PUT')
<div>
<h1 class="text-4xl font-bold">Edit Account</h1>

</div>

<div class="w-1/2">
  <label for="Account_name">Account Name</label>
  <input
    class="border border-gray-400 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400"
    type="text"
    name="name"
    id="firstname"
    value = "{{$account->name}}"
  />
</div>

<div class="w-1/2">
              <button type="submit" class="border border-gray-400 bg-green-600 px-4 py-2 rounded w-full focus:outline-none focus:border-teal-400">Submit</button>
    </div>
</form>
</div>     
@endsection