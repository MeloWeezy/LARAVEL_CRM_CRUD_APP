<x-app-layout>

{{--@section('content')--}}
    <div class="flex flex-wrap ">
        <div class="lg:w-full pr-4 pl-4 margin-tb">
            <div class="pull-left">
                @role('user')
                <h2 class ="align-middle text-center font-extrabold">User Profile</h2>
                @endrole

                @role('admin')
                <h2 class ="align-middle text-center font-extrabold">Users</h2>
                @endrole
            </div>
        </div>
    </div>
    <br>

    @if ($message = Session::get('success'))
        <div class="relative px-3 py-3 mb-4 border rounded bg-green-200 border-green-300 text-green-800">
            <p>{{ $message }}</p>
        </div>
    @endif

<div class="p-4 font-bold text-gray-600">User List</div>
<div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3">
    <div class="flex flex-auto items-center justify-between bg-white rounded shadow-sm">
      <table class="min-w-full table-auto">
        <thead class="border-b-2 border-gray-200">
          <tr>
            <th scope="col"
              class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
            No
            </th>

            <th scope="col"
              class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
            Name
            </th>


              <th scope="col"
                  class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                  Contact Info.
              </th>


              <th scope="col"
                  class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                  Organization
              </th>

              <th scope="col"
                  class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                  Joined
              </th>
            <th scope="col"
              class="px-6 py-4  text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
            Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 divide-dashed ">
        @foreach ($users as $user)
        <tr class="{{ $loop->even ? 'bg-gray-50':'' }}">
            <td class="px-6 py-3 whitespace-nowrap">
              <div class="flex items-center">
                <div class="ml-4">
                  <div class="text-sm font-medium text-gray-900">
                  {{ $user->id}}
                  </div>
                </div>
              </div>
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
            {{$user->fullname}}
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                <div class="flex flex-col">

                <span class="font-bold">{{$user->phone }}</span>
                <span class="text-xs text-gray-400">{{$user->email }}</span>
                </div>
            </td>
            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
                <div class="flex flex-col">

                <a class="underline-offset-1 underline decoration-dotted hover:text-blue-500" href="{{ route('organizations.show', $user->organization->id) }}">{{$user->organization->name}}</a>
                <span class="text-xs text-gray-400">{{ $user->organization->full_address }}</span>
                </div>
            </td>

            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">
{{--                ToDo: @Melusi Display date in this format '23 May 2022, 09h45'--}}
                {{ $user->created_at }}
            </td>

            <td class="px-6 py-3 whitespace-nowrap text-sm font-medium">
                <div class="flex gap-3">

                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600" href="{{ route('users.show',$user->id) }}">Show</a>
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('users.edit',$user->id) }}">Edit</a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                </form>
                </div>
            </td>
          </tr>
        @endforeach         
        </tbody>
      </table>
    </div>
    <div>

        {{$users->links()}}
    </div>
</div>
{{--@endsection--}}

</x-app-layout>
