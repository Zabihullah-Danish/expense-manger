<x-layout.layout>
    <x-slot name="content">
        @if(session('message'))
        <div class="absolute top-0 right-0 bg-lime-500 p-2 text-sm text-white">
            <p class="">{{ session('message') }}</p>
        </div>
        @endif
        <div class="p-1 border rounded-md shadow m-1">
            <div class="flex flex-row justify-between">
                <h1 class=" font-bold text-base">Add income</h1>
                <a class="rounded-md bg-blue-500 text-white px-2 py-1" href="{{ route('incomes.index') }}">List incomes</a>
            </div>
            <div class="p-10">
                <form action="{{ route('incomes.store') }}" method="POST">
                    @csrf
                <div class="flex flex-col space-y-3">

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="account_id">Select account</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="account_id" id="account_id">
                                @forelse ($accounts as $account)
                                    <option value="{{ $account->id }}">{{ $account->name }}</option>
                                @empty
                                <option value="">No category</option>
                                @endforelse
                                
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_title">Income title</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="name" name="income_title" id="income_title" placeholder="Title...">
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_category">Income category</label>
                        </div>
                        <div class="w-5/6">
                            <select class="w-full border rounded-md p-1 outline-none" name="income_category" id="income_category">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                                @empty
                                <option value="">No category</option>
                                @endforelse
                                
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="description">Description</label>
                        </div>
                        <div class="w-5/6">
                            <textarea class="w-full border rounded-md p-1 outline-none" rows="6" name="description" id="description" placeholder="income descritption..."></textarea>
                        </div>
                    </div>

                    <div class="flex flex-row text-xs">
                        <div class="w-1/6">
                            <label class="p-2" for="income_amount">Income amount</label>
                        </div>
                        <div class="w-5/6">
                            <input class="w-full border rounded-md p-1 outline-none" type="number" name="income_amount" id="income_amount" placeholder="100$">
                        </div>
                    </div>

                    <div>
                        <div class="float-right">
                            <button class="px-2 py-1 bg-blue-500 hover:bg-blue-600 text-white rounded-md text-sm">Add</button>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-layout.layout>