<x-templates.dashboard title="Orders | Techsocial">
    <div class="max-w-6xl">
        @if (session('status'))
            <div class="mb-5 w-full p-4 rounded-md border border-green-600 bg-green-300">
                <p class="text-base font-light text-green-600">{{ session('status') }}</p>
            </div>
        @endif
        <div class="flex items-start justify-between gap-2 mb-20">
            <div>
                <h1 class="text-4xl font-bold mb-2">Orders</h1>
                <p class="text-base font-light">Manage your system's orders.</p>
            </div>
            <a
                href="{{ route('web.dashboard.orders.create') }}"
                class="flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Create new order
            </a>
        </div>
        <div class="pb-12 rounded-md shadow-sm bg-white">
            <table class="w-full">
                <thead>
                <tr class="border-b">
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Description</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Quantity</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Price</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Created by</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr class="border-b">
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $order->description }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $order->quantity }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $order->price }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $order->customer->first_name }} {{ $order->customer->last_name }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            <form method="post" action="{{ route('web.dashboard.orders.destroy', ['order' => $order]) }}" class="w-full h-full relative flex items-center gap-3">
                                @method('DELETE')
                                @csrf
                                <a
                                    title="Edit Customer"
                                    href="{{ route('web.dashboard.orders.edit', ['order' => $order]) }}"
                                    class="items-center justify-center flex bg-indigo-600 w-8 h-8 rounded-md cursor-pointer"
                                >
                                    <img alt="" class="w-5 h-5" src={{ Vite::asset('resources/images/icons/pencil-square.svg') }} />
                                </a>
                                @unless(auth()->user()->id !== $order->customer->id)
                                    <button
                                        type="submit"
                                        title="Delete Customer"
                                        class="items-center justify-center flex bg-red-500 w-8 h-8 rounded-md cursor-pointer"
                                    >
                                        <img alt="" class="w-5 h-5" src={{ Vite::asset('resources/images/icons/trash.svg') }} />
                                    </button>
                                @endunless
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pt-10 max-w-[200px]">
            {{ $orders->links() }}
        </div>
    </div>
</x-templates.dashboard>
