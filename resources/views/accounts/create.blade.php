<x-layout.layout>
    <x-slot name="content">
        <div class="p-1 m-1 border rounded-md shadow">
            <form action="{{ route('accounts.store') }}" method="POST">
                @csrf
            <div class="flex flex-col px-8 py-5 space-y-5 text-sm">

                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="name">Name</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md border" type="text" name="name" id="name" placeholder="Enter account name">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="account_number">Account Number</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="number" name="account_number" id="account_number" placeholder="Enter account number">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="currency">Currency</label>
                    </div>
                    <div class="w-5/6">
                        <select class="w-full px-2 py-1 rounded-md  border text-gray-600" name="currency" id="currency">
                            <option value="" disabled selected>Select currency</option>
                            <option value="dollar">$</option>
                            <option value="AF">AF</option>
                        </select>
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="initial_amount">Initial Amount</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="number" name="initial_amount" id="initial_amount" placeholder="Enter initial amount">
                    </div>
                </div>
                <div class="flex flex-row">
                    <div class="w-1/6">
                        <label class="p-1 text-sm" for="account_for">Acount For</label>
                    </div>
                    <div class="w-5/6">
                        <input class="w-full px-2 py-1 rounded-md  border" type="text" name="account_for" id="account_for" placeholder="Enter account for">
                    </div>
                </div>
                <div>
                    <div>
                        <button class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md float-right">Create</button>
                        
                    </div>
                </div>

            </div>
            </form>
        </div>
        
    </x-slot>
</x-layout.layout>