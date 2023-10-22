<x-templates.dashboard title="Customers | Techsocial">
    <div class="max-w-6xl">
        @if (session('status'))
            <div class="mb-5 w-full p-4 rounded-md border border-green-600 bg-green-300">
                <p class="text-base font-light text-green-600">{{ session('status') }}</p>
            </div>
        @endif
        <div class="flex items-start justify-between gap-2 mb-20">
            <div>
                <h1 class="text-4xl font-bold mb-2">Customers</h1>
                <p class="text-base font-light">Manage your system's customers.</p>
            </div>
            <a
                href="{{ route('web.dashboard.customers.create') }}"
                class="flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Create new customer
            </a>
        </div>
        <div class="pb-12 rounded-md shadow-sm bg-white">
            <table class="w-full">
                <thead>
                <tr class="border-b">
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Name</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Birth Date</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Email</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5">Phone Number</th>
                    <th scope="col" class="text-sm text-left px-5 py-3.5"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr class="border-b">
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $customer->first_name }} {{ $customer->last_name }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $customer->birth_date->format('d/m/Y') }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $customer->email }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            {{ $customer->phone_number }}
                        </td>
                        <td class="text-gray-800 text-sm text-left px-5 py-3.5">
                            <form method="post" action="{{ route('web.dashboard.customers.destroy', ['customer' => $customer]) }}" class="w-full h-full relative flex items-center gap-3">
                                @method('DELETE')
                                @csrf
                                <a
                                    title="Edit Customer"
                                    href="{{ route('web.dashboard.customers.edit', ['customer' => $customer]) }}"
                                    class="items-center justify-center flex bg-indigo-600 w-8 h-8 rounded-md cursor-pointer"
                                >
                                    <img alt="" class="w-5 h-5" src={{ Vite::asset('resources/images/icons/pencil-square.svg') }} />
                                </a>
                                @unless(auth()->user()->id === $customer->id)
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
    </div>
</x-templates.dashboard>
