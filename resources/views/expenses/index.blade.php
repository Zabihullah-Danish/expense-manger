<x-layout.layout>
    <x-slot name="content">
        <div class="p-1 border rounded-md shadow m-1">
            <div class="flex flex-row justify-between text-xs border-b">
                <h1 class="p-2 font-bold text-base">Expenses List</h1>
                <div class="flex flex-row space-x-1">
                    <div>
                        <a class="px-2 py-1 bg-green-500 hover:bg-green-600 text-sm text-white rounded-md block" href="{{ route('expenses.create') }}">Add New</a>
                    </div>
                    <form method="get">
                        <select class="p-1 rounded-md bg-gray-200 text-gray-600 text-sm" onchange="this.form.submit()" name="accounts" id="accounts">
                            <option class="@isset($selected_account) hidden @endisset" selected disabled>select account</option>
                            @isset($selected_account)
                                <option class="border-b-2 bg-blue-500 text-white font-bold" value="{{ $selected_account->id }}" selected >&rArr; {{  $selected_account->name }}</option>
                            @endisset
                            @foreach ($accounts as $account)
                            <option class="" value="{{ $account->id }}">{{ $account->name }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                
                
            </div>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-800 uppercase bg-gray-300">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Title
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Category
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Created at
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Updated at
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($selected_account)
                        @forelse ($selected_account_expenses as $expense)
                            <tr class="bg-white even:bg-gray-100 text-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                    {{ $expense->expense_title }}
                                </th>
                                <td class="py-4 px-6">
                                    {{ $expense->expense_category }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $expense->expense_amount }} {{ $expense->account->currency }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $expense->created_at }}
                                </td>
                                <td class="py-4 px-6">
                                    {{ $expense->updated_at }}
                                </td>
                                <td>
                                    <div class="flex flex-row">
                                        <a class="bg-green-500 hover:bg-white border border-green-500 text-white hover:text-green-500 p-1" href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>View</title><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        </a>
                                        <a class="bg-blue-500 hover:bg-white border border-blue-500 text-white hover:text-blue-500 p-1" href="{{ route('expenses.edit',$expense) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Edit</title><path d="M384 224v184a40 40 0 01-40 40H104a40 40 0 01-40-40V168a40 40 0 0140-40h167.48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M459.94 53.25a16.06 16.06 0 00-23.22-.56L424.35 65a8 8 0 000 11.31l11.34 11.32a8 8 0 0011.34 0l12.06-12c6.1-6.09 6.67-16.01.85-22.38zM399.34 90L218.82 270.2a9 9 0 00-2.31 3.93L208.16 299a3.91 3.91 0 004.86 4.86l24.85-8.35a9 9 0 003.93-2.31L422 112.66a9 9 0 000-12.66l-9.95-10a9 9 0 00-12.71 0z"/></svg>
                                        </a>
                                        <form action="">
                                            <button class="bg-red-400 hover:bg-white border border-red-500 text-white hover:text-red-500 p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Trash</title><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="text-left">
                                <td colspan="6" class="bg-red-500 text-white text-center">No Record Found</td>
                            </tr>
                        @endforelse
                        @endisset
                        <tr class="@isset($selected_account) hidden @endisset bg-blue-500 text-center text-white">
                            <td colspan="7" class="p-1">No account selected, please select an account</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

        </div>
    </x-slot>
</x-layout.layout>