<x-templates.base :title="$title">
    <main class="relative h-screen overflow-auto flex px-6 py-12 lg:px-8 bg-stone-50">
        <div class="m-auto w-full max-w-lg bg-white shadow-sm rounded-md p-10">
            {{ $slot }}
        </div>
    </main>
</x-templates.base>
