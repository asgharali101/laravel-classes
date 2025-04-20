<x-navigation>
    <x-slot:heading>Register</x-slot:heading>
    <form method="POST" action="/register" class="flex justify-center items-center pb-10">
        @csrf
        <div class=" w-full md:1/2 mx-auto lg:w-2/4 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Name -->
            <div>
                <x-form-label for="first_name">First Name</x-form-label>
                <x-form-input name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" required />
                <x-form-error name="first_name" />
            </div>

            <div class="mt-4">
                <x-form-label for="last_name">Last Name</x-form-label>
                <x-form-input name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" required />
                <x-form-error name="last_name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-form-label for="email">Email</x-form-label>
                <x-form-input type="email" name="email" value="{{ old('email') }}" autocomplete="email" required />
                <x-form-error name="email" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-form-label for="password">Password</x-form-label>
                <x-form-input type="password" name="password" value="{{ old('password') }}" autocomplete="password"
                    required />
                <x-form-error name="password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-form-label for="confirm_password">Confirm Password</x-form-label>
                <x-form-input type="password" name="confirm_password" value="{{ old('confirm_password') }}"
                    autocomplete="confirm_password" required />
                <x-form-error name="confirm_password" />
            </div>

            <div class="flex items-center justify-end mt-4 space-x-2">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="/login">
                    Already registered? </a>

                <x-form-button type="submit">
                    Register
                </x-form-button>
            </div>
        </div>
    </form>
</x-navigation>
