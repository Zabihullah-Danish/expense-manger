<x-layout.layout>
    <x-slot name="content"></x-slot>
    <div class="m-20 rounded-md p-2 w-80 mx-auto bg-white  shadow-md border">
        <form action="{{ route('registeration') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-3">
                <div>
                    <h1 class="text-xl font-bold text-center">Sign Up</h1>
                    @if(session('message'))
                        <p class="text-xs text-red-500 py-3 text-center">{{ session('message') }}</p>
                    @endif
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="name">Name</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400"
                    value="{{ old('name') }}" type="text" name="name" id="name" placeholder="Enter name...">
                    @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="lastname">Lastname</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400"
                    value="{{ old('lastname') }}" type="text" name="lastname" id="lastname" placeholder="Enter lastname...">
                    @error('lastname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror 
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="email">Email</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400"
                    value="{{ old('email') }}" type="email" name="email" id="email" placeholder="Enter email...">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="password">Password</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400" type="password" name="password" id="password" placeholder="Enter password...">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror 
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="password_confirmation">Password Confirmation</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password"> 
                </div>
                <div class="flex flex-row justify-between px-2">
                    <span class="text-sm font-thin text-gray-500">Login to your <a class="text-blue-500 underline" href="{{ route('login') }}">user</a></span>
                    <button class="text-sm bg-blue-500 hover:bg-blue-600 text-white rounded p-1" type="submit">Sign Up</button>
                </div>
                <div>
                    <hr>
                </div>
            </div>
        </form>
    </div>
</x-layout.layout>