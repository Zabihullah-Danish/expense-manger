<div>
    <div class="" x-data="{open:false}">
        <button class="p-2 pb-2 w-full flex justify-between  hover:bg-gray-900" @click="open = !open">
            <span>{{ $title }}</span>
            
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon w-4" viewBox="0 0 512 512"><title>Chevron Back</title><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M328 112L184 256l144 144"/></svg>
        </button>
        <ul x-show="open">
            @foreach ($items as $item)
                <li><a href="{{ $item.routeName }}">{{ $item.linkText }}</a></li>
            @endforeach
        </ul>
    </div>
</div>