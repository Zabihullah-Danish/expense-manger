<x-layout.layout>
    <x-slot name="content">
        <div class="p-1 m-1 border rounded-md shadow">
            <div class="flex flex-row justify-between p-2 border-b-2">
                <h1 class="font-bold">Edit account</h1>
                <div>
                    <button onclick="back()" class="px-2 py-1 bg-blue-500 text-white rounded-md text-xs">Back</button>
                </div>
            </div>
            <form action="{{ route('accounts.update',$account) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="flex flex-col px-2 py-5 space-y-5 text-sm">

                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="name">Name</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md border" type="text" name="name" 
                        value="{{ $account->name }}" id="name" placeholder="Enter account name">
                        @error('name') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="account_number">Account Number</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="number"
                        value="{{ $account->account_number }}" name="account_number" id="account_number" placeholder="Enter account number">
                        @error('account_number') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="currency">Currency</label>
                    </div>
                    <div class="w-5/6">
                        <select class="w-full px-2 py-1 rounded-md  border text-gray-600" name="currency" id="currency">
                            <option class="bg-blue-400 text-white" value="{{ $account->currency == "$" ? "$" : "AF" }}" selected>{{ $account->currency }}</option>
                            <option class="@if($account->currency == "$") hidden @endif" value="$">$</option>
                            <option class="@if($account->currency == "AF") hidden @endif" value="AF">AF</option>
                        </select>
                        @error('currency') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="initial_amount">Initial Amount</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="number"
                        value="{{ $account->initial_amount }}"
                         name="initial_amount" id="initial_amount" placeholder="Enter initial amount">
                        @error('initial_amount') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="account_for">Acount For</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="text"
                        value="{{ $account->account_for }}" name="account_for" id="account_for" placeholder="Enter account for">
                        @error('account_for') <p class="text-red-500 text-xs">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div>
                    <div>
                        <button class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md float-right">Update</button>
                        
                    </div>
                </div>

            </div>
            </form>
        </div>
        
    </x-slot>
</x-layout.layout>