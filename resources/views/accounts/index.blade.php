<x-layout.layout>
    <x-slot name="content">
        <x-message />
        @if(session('warning'))
        <x-warning />
        @endif
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
                    <tr class="border-b">
                        <td class="border p-1">{{ $account->name }}</td>
                        <td class="border p-1">{{ $account->account_number }}</td>
                        <td class="border p-1">{{ $account->currency }}</td>
                        <td class="border p-1">{{ $account->initial_amount }}</td>
                        <td class="border p-1">{{ $account->account_for }}</td>
                        <td class="border p-1">{{ $account->created_at }}</td>
                        <td class="border p-1">{{ $account->updated_at }}</td>
                        <td class=" p-1 flex">
                            <a class="text-white p-1 bg-blue-500 hover:bg-white hover:text-blue-500 border hover:border-blue-500 text-xs"
                             href="{{ route('accounts.edit',$account) }}">Edit</a>
                            <form action="{{ route('accounts.destroy',$account) }}" onsubmit="return confirm('Are you sure to delete this account')" method="POST">
                                @csrf
                                @method('delete')
                                <button class="bg-red-500 hover:bg-white text-white hover:text-red-500 border hover:border-red-500 text-xs p-1" 
                                type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                   
                    @empty
                    <td colspan="8" class="text-center mt-5 p-2 uppercase">No Account Created Yet!<a class="text-blue-500 font-bold pl-2" href="{{ route('accounts.create') }}">New Account</a></td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-layout.layout>