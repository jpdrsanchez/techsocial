<x-templates.dashboard title="Create Customer | Techsocial">
    <div class="max-w-6xl">
        <div class="flex items-start justify-between gap-2 mb-20">
            <div>
                <h1 class="text-4xl font-bold mb-2">New Customer</h1>
                <p class="text-base font-light">Manage your system's customers.</p>
            </div>
            <a
                href="{{ route('web.dashboard.customers.index') }}"
                class="flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Back
            </a>
        </div>
        <form class="relative bg-white p-10 rounded-md shadow-sm" method="post" action="{{ route('web.dashboard.customers.store') }}">
            @method('POST')
            @csrf
            <div class="relative">
                <label
                    for="first_name"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    First Name
                </label>
                <input
                    value="{{ old('first_name', '') }}"
                    placeholder="John"
                    id="first_name"
                    name="first_name"
                    type="text"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('first_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="last_name"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Last Name
                </label>
                <input
                    value="{{ old('last_name', '') }}"
                    placeholder="Doe"
                    id="last_name"
                    name="last_name"
                    type="text"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('last_name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="document"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Document
                </label>
                <input
                    value="{{ old('document', '') }}"
                    placeholder="00000000000"
                    id="document"
                    name="document"
                    type="text"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('document')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="email"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Email address
                </label>
                <input
                    value="{{ old('email', '') }}"
                    placeholder="email@example.com"
                    id="email"
                    name="email"
                    type="text"
                    autocomplete="email"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="phone_number"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Phone Number
                </label>
                <input
                    value="{{ old('phone_number', '') }}"
                    placeholder="5511999999999"
                    id="phone_number"
                    name="phone_number"
                    type="text"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('phone_number')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="birth_date"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Birth Date
                </label>
                <input
                    value="{{ old('birth_date', '') }}"
                    id="birth_date"
                    name="birth_date"
                    type="date"
                    class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @error('birth_date')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="relative mt-4">
                <label
                    for="password"
                    class="block text-sm font-medium leading-6 text-gray-900 mb-2"
                >
                    Password
                </label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-4 mt-8">
                <button type="submit" class="flex justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Create
                </button>
                <a href="{{ route('web.dashboard.customers.index') }}" class="flex justify-center rounded-md bg-yellow-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-yellow-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-templates.dashboard>
