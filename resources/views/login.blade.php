<x-templates.auth title="Login | Techsocial">
    <h1 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
        Login
    </h1>
    <form class="relative" action="{{ route('web.authenticate') }}" method="post">
        @method('POST')
        @csrf
        <div class="relative mt-8">
            <label
                for="email"
                class="block text-sm font-medium leading-6 text-gray-900 mb-2"
            >
                Email address
            </label>
            <input
                placeholder="email@example.com"
                id="email"
                name="email"
                type="text"
                autocomplete="email"
                required
                class="block w-full rounded-md border-0 py-1.5 px-2.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                required
                class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 outline-0 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            >
            <button type="submit" class="mt-8 flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            <a href="{{ route('web.register') }}" class="mt-4 text-center text-sm block font-semibold leading-6 text-indigo-600">Register</a>
        </div>
    </form>
</x-templates.auth>
