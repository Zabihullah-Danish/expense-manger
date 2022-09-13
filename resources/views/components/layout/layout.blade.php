<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}" />
    @livewireStyles
    <title>Document</title>
</head>
<body class="bg-gray-200">
    <div class="max-w-5xl mx-auto flex flex-row justify-center  text-white">
        <h1 class="text-3xl text-zinc-700 font-bold pt-12 animate-pulse">Expense Management</h1>
        <img class="" src="{{ asset('storage/icons/logo.png') }}" alt="">
    </div>
    <div class="max-w-5xl h-[700px] overflow-hidden mx-auto @if(!Auth::user()) bg-gray-800 @else bg-white @endif rounded-b-md border shadow-2xl">
        <div class="@if(!Auth::user()) hidden @endif">
            <div class="flex flex-col" x-data="{IsMenuOpen: true}">
                <div class="flex flex-row top-0 sticky bg-white">
                    <div class="w-1/6  mx-auto text-center" x-show="IsMenuOpen">
                        <img class="mx-auto w-16" src="{{ asset('storage/icons/logo.png') }}" alt="">
                    </div>
                    <div class="w-5/6 border">
                        <div class="flex flex-row justify-between p-4">
                            <div class="flex flex-row ">
                                <button class="p-2" @click="IsMenuOpen = !IsMenuOpen">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-6" viewBox="0 0 512 512"><title>Menu</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                                </button>
                            </div>
                            <div class="flex flex-row space-x-1">
                                <div>
                                    @auth
                                    <h1 class="p-2">{{ auth()->user()->name . " " . auth()->user()->lastname }}</h1>
                                    @endauth
                                </div>
                                <div>
                                    <img class="bg-gray-400 w-10 h-10 rounded-full object-cover" src="@auth{{ asset('storage/'. auth()->user()->photo) }}@endauth" alt="profile image">
                                </div>
                                <div x-data="{open:false}">
                                    <button @click="open = !open" class="p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg> 
                                    </button>
                                    <ul @click.away="open = false" x-show="open"
                                        x-transition.duration.100ms.origin.top 
                                        class="absolute bg-white border border-gray-500 rounded-md w-auto mt-4 text-xs -ml-24 shadow-md z-50" style="display: none;">
                                        <li><a class=" hover:bg-gray-100 p-2 rounded flex flex-row space-x-2" href="{{ route('profile') }}">
                                            
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Person Circle</title><path d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1 117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48zm126.42 327.25a4 4 0 01-6.14-.32 124.27 124.27 0 00-32.35-29.59C321.37 329 289.11 320 256 320s-65.37 9-90.83 25.34a124.24 124.24 0 00-32.35 29.58 4 4 0 01-6.14.32A175.32 175.32 0 0180 259c-1.63-97.31 78.22-178.76 175.57-179S432 158.81 432 256a175.32 175.32 0 01-46.68 119.25z"/><path d="M256 144c-19.72 0-37.55 7.39-50.22 20.82s-19 32-17.57 51.93C191.11 256 221.52 288 256 288s64.83-32 67.79-71.24c1.48-19.74-4.8-38.14-17.68-51.82C293.39 151.44 275.59 144 256 144z"/></svg>
                                            <span>Profile</span>
                                        </a></li>
                                        <li><a class=" hover:bg-gray-100 p-2 rounded flex flex-row space-x-2" href="">
                                               
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Key</title><path d="M218.1 167.17c0 13 0 25.6 4.1 37.4-43.1 50.6-156.9 184.3-167.5 194.5a20.17 20.17 0 00-6.7 15c0 8.5 5.2 16.7 9.6 21.3 6.6 6.9 34.8 33 40 28 15.4-15 18.5-19 24.8-25.2 9.5-9.3-1-28.3 2.3-36s6.8-9.2 12.5-10.4 15.8 2.9 23.7 3c8.3.1 12.8-3.4 19-9.2 5-4.6 8.6-8.9 8.7-15.6.2-9-12.8-20.9-3.1-30.4s23.7 6.2 34 5 22.8-15.5 24.1-21.6-11.7-21.8-9.7-30.7c.7-3 6.8-10 11.4-11s25 6.9 29.6 5.9c5.6-1.2 12.1-7.1 17.4-10.4 15.5 6.7 29.6 9.4 47.7 9.4 68.5 0 124-53.4 124-119.2S408.5 48 340 48s-121.9 53.37-121.9 119.17zM400 144a32 32 0 11-32-32 32 32 0 0132 32z" fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"/></svg>
                                            <span>Change password</span> 
                                        </a></li>
                                        <li>
                                            <a class=" text-red-500 block hover:bg-gray-100 p-2 rounded flex flex-row space-x-2" href="{{ route('logout') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Log Out</title><path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>     
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row  h-[625px]">
                    <div class="w-1/6"  x-show="IsMenuOpen">
                        <div class="flex h-[625px] flex-col bg-gray-500 text-gray-200 text-sm" x-data="{
                            incomes:false,
                            expenses:false,
                            categories:false,
                            reports:false,
                            accounts:false,

                        }">
                            <div class="bg-gray-900">
                                <a class="p-2 inline-block" href="{{ route('dashboard') }}">Dashboard</a>
                            </div>
                            {{-- @livewire('button',['title'=>"Incomes",'items'=>['one']]) --}}
                            <div>
                                <button @click="incomes = !incomes" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
                                    <span>Incomes</span>
                                    
                                    <svg style="display: none;" x-show="!incomes" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
                                    <svg style="display: none;" x-show="incomes" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                                  
                                </button>
                                <ul @click.outside = "incomes = false" x-show="incomes" x-transition.duration.100ms class="bg-gray-600 py-2" style="display: none;">
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('incomes.index') }}">&Rarr; List Incomes</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('incomes.create') }}">&Rarr; Create New</a></li>
                                </ul>
                            </div>
                            <div>
                                <button @click="expenses = !expenses" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
                                    <span>Expenses</span>
                                    
                                    <svg style="display: none;" x-show="!expenses" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
                                    <svg style="display: none;" x-show="expenses" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                                  
                                </button>
                                <ul @click.outside = "expenses = false" x-show="expenses" x-transition.duration.100ms class="bg-gray-600 py-2" style="display: none;">
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('expenses.index') }}">&Rarr; List Expenses</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('expenses.create') }}">&Rarr; Create New</a></li>
                                </ul>
                            </div>
                            <div>
                                <button @click="categories = !categories" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
                                    <span>Categories</span>
                                    
                                    <svg style="display: none;" x-show="!categories" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
                                    <svg style="display: none;" x-show="categories" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                                  
                                </button>
                                <ul @click.outside = "categories = false" x-show="categories" x-transition.duration.100ms class="bg-gray-600 py-2" style="display: none;">
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('income-categories.index') }}">&Rarr; Incomes</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('expense-categories.index') }}">&Rarr; Expenses</a></li>
                                </ul>
                            </div>
                            <div>
                                <button @click="reports = !reports" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
                                    <span>Reports</span>
                                    
                                    <svg style="display: none;" x-show="!reports" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
                                    <svg style="display: none;" x-show="reports" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Down</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                                  
                                </button>
                                <ul @click.outside = "reports = false" x-show="reports" x-transition.duration.100ms class="bg-gray-600 py-2" style="display: none;">
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="">&Rarr; Daily</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="">&Rarr; Monthly</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="">&Rarr; Yearly</a></li>
                                </ul>
                            </div>
                            <div>
                                <button @click="accounts = !accounts" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
                                    <span>Accounts</span>
                                    
                                    <svg style="display: none;" x-show="!accounts" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
                                    <svg style="display: none;" x-show="accounts" xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>accounts</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg>
                                  
                                </button>
                                <ul @click.outside = "accounts = false" x-show="accounts" x-transition.duration.100ms class="bg-gray-600 py-2" style="display: none;">
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('accounts.index') }}">&Rarr; All Accounts</a></li>
                                    <li class="pl-3 hover:bg-gray-900"><a class="block p-2" href="{{ route('accounts.create') }}">&Rarr; New Account</a></li>
                                    
                                </ul>
                            </div>
                            
                           
                        </div>
                    </div>
                    <div class="w-5/6 border overflow-y-auto">
                        {{ $content }}
                    </div>
                </div>
                
            </div>
        </div>
        {{ $slot }}
    </div>
    <div class="max-w-5xl mx-auto text-center mt-10">
        <div class="flex flex-col text-sm">
            <p>Powered by <span class="font-mono font-bold">Zabihullah Danish</span></p>
            <hr class="border-1 border-gray-300">
        </div>
    </div>
    
    @livewireScripts
    <script>
        function back(){
            history.back();
        }
    </script>
</body>
</html>