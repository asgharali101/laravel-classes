<x-navigation>
    <x-slot:heading>Register</x-slot:heading>
    <form method="POST" action="/register/store" class="flex justify-center items-center pb-10">
        @csrf
        <div class=" w-full md:w-2/3 lg:w-2/4 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">



            <!-- Email Address -->
            <div class="mt-4">
                <x-form-label for="email">Email</x-form-label>
                <x-form-input name="email" value="{{ old('email') }}" autocomplete="email" required />
                <x-form-error name="email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form-label for="password">Password</x-form-label>
                <x-form-input name="password" value="{{ old('password') }}" autocomplete="password" required />
                <x-form-error name="password" />
            </div>



            <div class="flex items-center justify-end mt-4 space-x-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="/register">
                    create new acoount? </a>

                <x-form-button type="submit">
                    Login
                </x-form-button>
            </div>
        </div>
    </form>
</x-navigation>
