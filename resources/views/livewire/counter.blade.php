<div class="bg-gray-200 ">
    {{-- The best athlete wants his opponent at his best. --}}
    <h1>My first component in livewire</h1>
    <button class="bg-blue-500 p-2 rounded-md" wire:click="increment">Increase</button>
    <h1>{{ $count ? $count : "0"  }}</h1>
    <button class="bg-blue-500 border p-2 rounded-md animate-pulse hover:bg-white hover:border-lime-500" wire:click="decrement">Decrease</button>
    <button class="bg-blue-500 p-2 rounded-md" wire:click="resetToZero">Reset</button>
    <hr>
    <form wire:submit.prevent="info">
        <input wire:model="name" type="text" name="name">
        <input wire:model="lastname" type="text" name="lastname">
        <input wire:model="email" type="email" name="email">
        <input type="submit" value="Save">
    </form>
    <hr>
    <h1>Personal info:</h1>
    <div>
        <div>
            Name: {{ $name }}
        </div>
        <div>
            Lastname: {{ $lastname }}
        </div>
        <div>
            Email: {{ $email }}
        </div>
    </div>
</div>
