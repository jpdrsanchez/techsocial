<x-templates.dashboard title="Edit Order | Techsocial">
    <div class="max-w-6xl">
        <div class="flex items-start justify-between gap-2 mb-20">
            <div>
                <h1 class="text-4xl font-bold mb-2">Edit Order</h1>
                <p class="text-base font-light">Manage your system's orders.</p>
            </div>
            <a
                href="{{ route('web.dashboard.orders.index') }}"
                class="flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Back
            </a>
        </div>
        <form class="relative bg-white p-10 rounded-md shadow-sm" method="post" action="{{ route('web.dashboard.orders.update', ['order' => $order]) }}">
            @method('PUT')
            @csrf
            <div class="relative">
                <label
                    for="description"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Description
                </label>
                <input
                    value="{{ old('description', $order->description) }}"
                    placeholder="Lorem Ipsum"
                    id="description"
                    name="description"
                    type="text"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('description')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="quantity"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Quantity
                </label>
                <input
                    value="{{ old('quantity', $order->quantity) }}"
                    placeholder="123"
                    id="quantity"
                    name="quantity"
                    type="number"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('quantity')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="price"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Price
                </label>
                <input
                    value="{{ old('price', $order->price) }}"
                    placeholder="In cents, ex: $ 12,24 should be written as 1224"
                    id="price"
                    name="price"
                    type="number"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('price')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-4 mt-8">
                <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Update
                </button>
                <a href="{{ route('web.dashboard.orders.index') }}" class="flex justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-templates.dashboard>
