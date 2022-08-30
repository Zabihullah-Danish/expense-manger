<x-layout.layout>
    <x-slot name="content">
        @if(session('message'))
        <x-message />
        @endif
        <div class="p-2">
            <div class="">
                <h1 class="p-2 text-xl font-mono">Update your profile</h1>
            </div>
            <form action="{{ route('updateProfile',auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="flex flex-col space-y-2 border border-gray-200 rounded-md p-3 text-sm">
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="name">Name</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="text" name="name" id="name" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="lastname">Lastname</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="text" name="lastname" id="lastname" value="{{ auth()->user()->lastname }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="email">Email</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="text" name="email" id="email" value="{{ auth()->user()->email }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="phone">Phone</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="number" name="phone" id="phone" value="{{ auth()->user()->phone }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="address">Address</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="text" name="address" id="address" value="{{ auth()->user()->address }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="province">Province</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="text" name="province" id="province" value="{{ auth()->user()->province }}">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 block" for="photo">Photo</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full border rounded-md p-1" type="file" name="photo" id="photo">
                    </div>
                </div>
                <div class="">
                    <div class="float-right p-2">
                        <input class="bg-blue-500 hover:bg-blue-600 text-white rounded-md p-2" type="submit" value="Update" >
                    </div>
                </div>

            </div>
            </form>
        </div>
    </x-slot>
</x-layout.layout>