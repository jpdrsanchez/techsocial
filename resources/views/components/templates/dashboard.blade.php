<x-templates.base :title="$title" >
    <div class="relative bg-white grid grid-cols-[auto_1fr] h-screen items-stretch overflow-auto">
        <x-navigation />
        <main class="relative p-10 bg-stone-50">
            {{ $slot }}
        </main>
    </div>
</x-templates.base>
