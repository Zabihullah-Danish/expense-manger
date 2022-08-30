<div>
    <div class="" x-data="{isOpen:false}">
        <button @click="isOpen = !isOpen" class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900">
            <span>{{ $title }}</span>
            
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
        </button>
        <ul x-show="isOpen">
            @foreach ($items as $item)
                <li class="pl-3 hover:bg-gray-900"><livewire:link routeName="" linkText="" /></li>
            @endforeach
        </ul>
    </div>
</div>
