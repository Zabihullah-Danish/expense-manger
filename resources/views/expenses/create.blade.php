<x-layout.layout>
    <x-slot name="content">
        @if(session('message'))
            <x-message />
        @endif
        <div class="p-1 border rounded-md shadow m-1">
            <div class="flex flex-row justify-between">
                <h1 class=" font-bold text-base">Add Expense</h1>
                <div class="flex flex-row space-x-1">
                    <a class="rounded-md bg-blue-500 text-white px-2 py-1" href="{{ route('expenses.index') }}">All Expenses</a>
                    <button onclick="back()" class="rounded-md bg-gray-500 hover:bg-gray-600 text-white text-sm px-2 py-1">Back</button>
                </div>
                
            </div>
            <div class="py-10 px-1">
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                <div class="flex flex-col space-y-3">

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="account_id">Select account</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="account_id" id="account_id">
                                @forelse ($accounts as $account)
                                    <option value="{{ $account->id }}" {{ old('account_id') == $account->id ? 'selected' : '' }}>{{ $account->name }}</option>
                                @empty
                                <option value="">No category</option>
                                @endforelse
                                
                            </select>
                            @error('account_id') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="expense_title">Expense title</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="text" name="expense_title" id="expense_title"
                             value="{{ old('expense_title') }}" placeholder="Title...">
                            @error('expense_title') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="expense_category">Exepnse category</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="expense_category" id="expense_category">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->name }}" {{ old('expense_category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                @empty
                                <option value="">No category</option>
                                @endforelse
                                
                            </select>
                            @error('expense_category') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="description">Description</label>
                        </div>
                        <div class="w-5/6">
                            <textarea class="w-full border rounded-md p-1 outline-none" rows="6" name="description" id="description"
                             placeholder="expense descritption...">{{ old('description') }}</textarea>
                            @error('description') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="expense_amount">Expense amount</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="number" name="expense_amount" id="expense_amount"
                             value="{{ old('expense_amount') }}" placeholder="100$">
                            @error('expense_amount') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <div class="float-right">
                            <button type="submit" class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm">Add</button>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout.layout>