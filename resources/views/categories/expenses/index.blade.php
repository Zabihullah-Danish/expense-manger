<x-layout.layout>
    <x-slot name="content">
        @if(session('message'))
            <x-message />
        @endif
        <div class="p-1 border rounded-md shadow m-1" x-data="{newCategory:false, text: 'New'}">
            <div class="flex flex-row justify-between text-sm">
                <h1 class="p-1 font-bold">Expense Categories</h1>
                <div>
                    <button @click="newCategory = !newCategory" class="block p-1 bg-blue-500 text-white rounded-md hover:bg-blue-600 outline-none"
                     x-text="!newCategory ? 'New' : 'Close'"></button>
                </div>
            </div>
            <div class="pt-3">
                @error(session('expense_category'))
                    <p class="text-sm text-red-500 text-white pl-2">{{ $message }}</p>
                @enderror
                <div style="display:none;" x-show="newCategory">
                    <form class="flex flex-row p-2" action="{{ route('expense-categories.store') }}" method="POST">
                        @csrf
                        <div class="w-5/6">
                            <input class="w-full border rounded-md outline-none px-4" type="text" name="expense_category" placeholder="New category...">
                        </div>
                        <div class="w-1/6 ">
                            <input class="rounded-md px-2 -ml-12 bg-green-400" type="submit" value="Save">
                        </div>
                    </form>
                </div>
                <div class="border overflow-y-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" >
                        <thead class="text-xs text-gray-800 uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Name
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
                            
                            @forelse ($expense_categories as $category)
                                <tr class="bg-white even:bg-gray-100 text-gray-600">
                                    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap">
                                        {{ $category->id }}
                                    </th>
                                    <td class="py-4 px-6">
                                        {{ $category->name }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $category->created_at }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $category->updated_at }}
                                    </td>
                                   
                                    <td>
                                        <div class="flex flex-row">
                                            <a class="bg-blue-500 hover:bg-white border border-blue-500 text-white hover:text-blue-500 p-1" href="">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-slot>
</x-layout.layout>