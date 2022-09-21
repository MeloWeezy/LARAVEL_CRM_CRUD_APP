
<div class="flex flex-col  space-y-5 justify-between min-h-screen w-60 px-2 py-4 bg-gray-50">

    <div class=" flex items-center justify-between text-gray-600 text-3xl px-5 font-bold">
        <a href="{{ route('dashboard') }}">
            {{ config('app.name') }}
        </a>

    </div>

    <div class="flex flex-col flex-auto">
        <div class="p-2 hover:bg-pink-100">
            <div class="flex flex-row space-x-3 justify-items-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve">
                    <style type="text/css">
                        .st0{fill:none;}
                        .st1{display:none;}
                        .st2{display:inline;}
                        .st3{fill:none;stroke:#CECECE;stroke-width:0.5;stroke-miterlimit:10;}
                        .st4{fill:#c74b16;stroke-width:0.5}
                    </style>
                                        <g id="bounding_box">
                                            <rect x="0" y="0" class="st0" width="24" height="24"/>
                                        </g>
                                        <g id="design">
                                            <path class="st4" d="M17.25,21c-2.21,0-4-1.79-4-4s1.79-4,4-4s4,1.79,4,4S19.46,21,17.25,21z M17.25,14.5c-1.38,0-2.5,1.12-2.5,2.5
                            s1.12,2.5,2.5,2.5s2.5-1.12,2.5-2.5S18.63,14.5,17.25,14.5z"/>
                                            <path class="st4" d="M19.25,10.5h-4c-0.96,0-1.75-0.79-1.75-1.75v-4C13.5,3.79,14.29,3,15.25,3h4C20.21,3,21,3.79,21,4.75v4
                            C21,9.71,20.21,10.5,19.25,10.5z M15.25,4.5C15.11,4.5,15,4.61,15,4.75v4C15,8.89,15.11,9,15.25,9h4c0.14,0,0.25-0.11,0.25-0.25v-4
                            c0-0.14-0.11-0.25-0.25-0.25H15.25z"/>
                                            <path class="st4" d="M10.71,10.5H3.79c-0.27,0-0.52-0.14-0.65-0.38S3,9.61,3.14,9.38l3.46-6c0.27-0.46,1.03-0.46,1.3,0l3.46,6
                            c0.13,0.23,0.13,0.52,0,0.75S10.98,10.5,10.71,10.5z M5.08,9h4.33L7.25,5.25L5.08,9z"/>
                                            <g>
                                                <path class="st4" d="M10.66,19.47c0.29,0.29,0.29,0.77,0,1.06c-0.15,0.15-0.34,0.22-0.54,0.22c-0.19,0-0.38-0.07-0.53-0.22
                                l-2.34-2.34l-2.34,2.34c-0.15,0.15-0.34,0.22-0.53,0.22c-0.2,0-0.39-0.07-0.54-0.22c-0.29-0.29-0.29-0.77,0-1.06l2.35-2.34
                                l-2.35-2.35c-0.29-0.29-0.29-0.77,0-1.06c0.3-0.29,0.77-0.29,1.07,0l2.34,2.34l2.34-2.34c0.3-0.29,0.77-0.29,1.07,0
                                c0.29,0.29,0.29,0.77,0,1.06l-2.34,2.35L10.66,19.47z"/>
                                            </g>
                                        </g>
                    </svg>
                <a href="{{ route('dashboard') }}" class="font-bold text-gray-500 hover:text-pink-600 ">Dashboard</a>
            </div>
        </div>
        <div class="p-2 hover:bg-pink-100">
            <div class="flex flex-row space-x-3">

                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                </svg>

                <a href="{{ route('accounts.index') }}" class="font-bold text-gray-500 hover:text-pink-600 ">Accounts</a>
            </div>
        </div>
        <div class="p-2 hover:bg-pink-100 ">
            <div class="flex flex-row space-x-3 ">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24 "
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                </svg>
                <a href="{{ route('organizations.index') }}"
                   class="font-bold text-gray-500 hover:text-pink-600">Organizations</a>
            </div>
        </div>
        <div class="p-2 hover:bg-pink-100">
            <div class="flex flex-row space-x-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <a href="{{ route('contacts.index') }}" class="font-bold text-gray-500 hover:text-pink-600">Contacts</a>
            </div>
        </div>

        <div class="p-2 hover:bg-pink-100">
            <div class="flex flex-row space-x-3">
                <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                    </path>
                </svg>
                <a href="{{ route('users.index') }}"
                   class="font-bold text-gray-500 hover:text-pink-600">Users</a>
            </div>
        </div>


    </div>
    @csrf
    <div class="flex flex-col ">
        <button href="route('logout')"
                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                class="rounded-full bg-red-500 py-2 text-white text-lg">{{ __('Log Out') }}</button>

    </div>


</div>
