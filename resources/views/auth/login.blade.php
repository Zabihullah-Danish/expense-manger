<x-layout.layout>
    <x-slot name="content"></x-slot>
    <div class="m-20 rounded-md p-2 w-80 mx-auto bg-white shadow-md border">
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="flex flex-col space-y-3">
                <div>
                    <h1 class="text-xl font-bold text-center">Login</h1>
                    @if(session('message'))
                        <p class="text-xs text-red-500 py-3 text-center">{{ session('message') }}</p>
                    @endif
                    
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="email">Email</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400"
                    value="{{ old('email') }}" type="email" name="email" id="email" placeholder="Enter email..."> 
                    @error('email')
                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col">
                    <label class="text-sm text-gray-600" for="password">Password</label>
                    <input class="border rounded p-1 outline-none focus:border-gray-400" type="password" name="password" id="password" placeholder="Enter password..."> 
                    @error('password')
                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-row justify-between px-2">
                    <span class="text-sm font-thin text-gray-500">create new <a class="text-blue-500 underline" href="{{ route('register') }}">user</a></span>
                    <button class="text-sm bg-blue-500 hover:bg-blue-600 text-white rounded p-1" type="submit">Login</button>
                </div>
                <div>
                    <hr>
                </div>
            </div>
        </form>
    </div>
</x-layout.layout>