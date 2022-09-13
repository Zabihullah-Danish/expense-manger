<x-layout.layout>
    <x-slot name="content">
        @if(session('message'))
            <x-message />
        @endif
        <div class="p-1 border rounded-md shadow m-1">
            <div class="flex flex-row justify-between">
                <h1 class=" font-bold text-base">Add income</h1>
                <div class="flex flex-row space-x-1">
                    <a class="rounded-md bg-blue-500 text-white px-2 py-1" href="{{ route('incomes.index') }}">List incomes</a>
                    <button onclick="back()" class="rounded-md bg-gray-500 hover:bg-gray-600 text-white text-sm px-2 py-1">Back</button>
                </div>
                
            </div>
            <div class="py-10 px-1">
                <form action="{{ route('incomes.update',$income) }}" method="POST">
                    @csrf
                    @method('put')
                <div class="flex flex-col space-y-3">

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="account_id">Account</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="account_id" id="account_id">
                                <option value="{{ $income->account->id }}">{{ $income->account->name }}</option>
                            </select>
                            @error('account_id') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_title">Income title</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="name" name="income_title"
                             value="{{ $income->income_title }}" id="income_title" placeholder="Title...">
                            @error('income_title') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_category">Income category</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="income_category" id="income_category">
                                <option value="{{ $income->income_category }}">{{ $income->income_category }}</option>
                                @forelse ($categories as $category)
                                    <option class="@if($category->name === $income->income_category) hidden @endif" value="{{ $category->name }}">{{ $category->name }}</option>
                                @empty
                                <option value="">No category</option>
                                @endforelse
                                
                            </select>
                            @error('income_category') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="description">Description</label>
                        </div>
                        <div class="w-5/6">
                            <textarea class="w-full border rounded-md p-1 outline-none" rows="6" name="description" id="description"
                             placeholder="income descritption...">{{ $income->description }}</textarea>
                            @error('description') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_amount">Income amount</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="number" name="income_amount" id="income_amount"
                             value="{{ $income->income_amount }}" placeholder="100$">
                            @error('income_amount') <p class="text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <div class="float-right">
                            <button class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm">Update</button>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout.layout>