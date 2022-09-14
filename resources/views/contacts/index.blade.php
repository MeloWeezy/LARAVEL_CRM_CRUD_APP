<x-app-layout>

{{--@section('content')--}}
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <br>
          @can('create-contact')
            <div class="text-center">
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


    <div class="p-4 font-bold text-gray-600">Contact info</div>
      <div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3">
        <div class="col-span-2 flex flex-auto items-center justify-between  p-5 bg-white rounded shadow-sm">
          <table class="min-w-full divide-y divide-gray-200 table-auto">
            <thead class="bg-gray-50">
           
              <tr>
                <th scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                No
                </th>

                <th scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
            First Name
                </th>
                <th scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               Last Name
                </th>
                
               
               
                <th scope="col"
                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Action
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            @foreach ($contacts as $contact)
            @can('read-contact',$contact)
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900">
                      {{ $contact->id}}
                      </div>
                    </div>
                  </div>
                </td>

               
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $contact->first_name}}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $contact->last_name}}
                </td>
              
                
<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
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
            </tbody>
             
             @endcan
            @endforeach
          
          </table>
</div>
</div>




      {{$contacts->links()}}
 {{--@endsection--}}

</x-app-layout>
