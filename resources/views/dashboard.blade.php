<x-app-layout>

    <div class="flex flex-row ">
        <div class="flex-auto ">
            <div class="flex flex-col">
                <div class="">
                    <div class=" mt-8 grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10 ">
                        <!--Grid starts here-->
                        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
                            <div>
                                <div class="text-sm text-gray-400 "><a href="{{ route('api/accounts.index') }}"
                                                                       class="font-bold text-gray-500 hover:text-pink-600 ">Accounts</a>
                                </div>
                                <div class="flex items-center pt-1">
                                    <div class="text-3xl font-medium text-gray-600 ">{{$acc_count}}</div>
                                </div>
                            </div>
                            <div class="text-pink-500">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                </svg>


                            </div>
                        </div>

                        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
                            <div>
                                <div class="text-sm text-gray-400 "><a href="{{ route('organizations.index') }}"
                                                                       class="font-bold text-gray-500 hover:text-pink-600">Organizations</a>
                                </div>
                                <div class="flex items-center pt-1">
                                    <div class="text-3xl font-medium text-gray-600 ">{{$org_count}}</div>
                                </div>
                            </div>
                            <div class="text-pink-500">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24 "
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>

                            </div>
                        </div>

                        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
                            <div>
                                <div class="text-sm text-gray-400 "><a href="{{ route('contacts.index') }}"
                                                                       class="font-bold text-gray-500 hover:text-pink-600">Contacts</a>
                                </div>
                                <div class="flex items-center pt-1">
                                    <div class="text-3xl font-medium text-gray-600 ">{{$cont_count}}</div>
                                </div>
                            </div>
                            <div class="text-pink-500">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>

                            </div>
                        </div>


                        <div class="flex items-center justify-between p-5 bg-white rounded shadow-sm">
                            <div>
                                <div class="text-sm text-gray-400 "><a href="{{ route('users.index') }}"
                                                                       class="font-bold text-gray-500 hover:text-pink-600">Users</a>
                                </div>
                                <div class="flex items-center pt-1">
                                    <div class="text-3xl font-medium text-gray-600 ">{{$user_count}}</div>
                                </div>
                            </div>
                            <div class="text-pink-500">
                                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>

                        <!-- Grid ends here..-->

                    </div>


                    <!--Table-->
                    <div class="p-4 font-bold text-gray-600">User info</div>
                    <div class="grid  lg:grid-cols-1  md:grid-cols-1 p-4 gap-3">
                        <div
                            class="col-span-2 flex flex-auto items-center justify-between  p-5 bg-white rounded shadow-sm">
                            <table class="min-w-full divide-y divide-gray-200 table-auto">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Personnel
                                    </th>


                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img alt="{{ $user->first_name }}" src="{{ Vite::asset('resources/images/contacts.png') }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{$user->first_name}} {{$user->last_name}}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{$user->email}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>


                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{$user->role}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('users.edit',$user->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    </td>
                                </tr>
                                <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
