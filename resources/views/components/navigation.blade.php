<nav class="w-64 bg-gray-900 py-8 px-4 flex flex-col justify-start gap-7">
    <h1 class="flex items-center gap-3">
        <span class="flex h-9 w-9 items-center justify-center bg-gray-800 rounded-md">
            <img
                src="{{ Vite::asset('resources/images/icons/globe-alt.svg') }}"
                alt=""
                aria-hidden="true"
                class="w-6 h-6"
            />
        </span>
        <span class="text-base font-normal text-white">Tech Social</span>
    </h1>
    <ul class="grid gap-2">
        @foreach($items as $item)
            <li>
                <a href="#" class="flex items-center gap-2 p-1 rounded-md hover:bg-gray-800 group">
                    <span class="flex items-center justify-center h-8 w-8">
                        <img
                            src="{{ Vite::asset('resources/images/icons/' . $item->icon) }}"
                            alt=""
                            aria-hidden="true"
                            class="w-5 h-5"
                        />
                    </span>
                    <span class="text-gray-400 text-base group-hover:text-white">{{ $item->title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</nav>
