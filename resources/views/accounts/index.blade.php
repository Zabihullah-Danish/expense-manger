<x-layout.layout>
    <x-slot name="content">
        <div class="p-1 border rounded-md shadow m-1">
            <table class="w-full text-sm border border-collapse">
                <thead class="bg-gray-100 text-gray-600 text-left">
                    <tr>
                        <th class="border p-1">Name</th>
                        <th class="border p-1">Account Number</th>
                        <th class="border p-1">Currency</th>
                        <th class="border p-1">Initial Amount</th>
                        <th class="border p-1">Account For</th>
                        <th class="border p-1">Created At</th>
                        <th class="border p-1">Updated At</th>
                        <th class="border p-1">Option</th>
                    </tr>
                    
                </thead>
                <tbody class="border">
                    @forelse ($accounts as $account)
                    <tr>
                        <td class="border p-1">{{ $account->name }}</td>
                        <td class="border p-1">{{ $account->account_number }}</td>
                        <td class="border p-1">{{ $account->currency }}</td>
                        <td class="border p-1">{{ $account->initial_amount }}</td>
                        <td class="border p-1">{{ $account->account_for }}</td>
                        <td class="border p-1">{{ $account->created_at }}</td>
                        <td class="border p-1">{{ $account->updated_at }}</td>
                        <td class="border p-1"><a class="text-white rounded-md px-1 bg-blue-500" href="{{ route('accounts.edit',$account) }}">Edit</a></td>
                    </tr>
                   
                    @empty
                    <td colspan="8" class="text-center mt-5 p-2 uppercase">No Account Created Yet!<a class="text-blue-500 font-bold pl-2" href="{{ route('accounts.create') }}">New Account</a></td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout.layout>