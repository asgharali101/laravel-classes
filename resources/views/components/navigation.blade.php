<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <div>
        <div class="min-h-full">
            <nav class="bg-gray-800 shadow-lg">
                <div class="mx-auto max-w-7xl px-6 sm:px-8 lg:px-10">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <img class="size-10"
                                    src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500"
                                    alt="Logo">
                            </div>
                            <div class="hidden md:block">
                                <div class="ml-12 flex items-baseline space-x-6">
                                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                                    <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                                    <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                                    <x-nav-link href="/jobs" :active="request()->is('jobs')">jobs</x-nav-link>


                                    {{-- <a href="/"
                                        class="{{ request()->is('/') ? 'bg-gray-600' : 'text-white hover:bg-gray-600' }} rounded-lg px-4 py-2 text-white ">Home</a>
                                    <a href="/about"
                                        class="{{ request()->is('about') ? 'bg-gray-600' : 'text-white hover:bg-gray-600' }} rounded-lg px-4 py-2 text-white ">About</a>
                                    <a href="/contact"
                                        class="{{ request()->is('contact') ? 'bg-gray-600' : 'text-white hover:bg-gray-600' }} rounded-lg px-4 py-2 text-white ">Contact</a>
                                    <a href="/jobs"
                                        class="{{ request()->is('jobs') ? 'bg-gray-600' : 'text-white hover:bg-gray-600' }} rounded-lg px-4 py-2 text-white ">jobs</a> --}}

                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex items-center space-x-4">
                            {{-- <button
                                class="p-2 rounded-full text-white hover:text-gray-200 focus:outline-none focus:ring-2 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                                </svg>
                            </button> --}}
                            <!-- Login & Register links -->
                            @guest
                                <x-nav-link href="login" :active="request()->is('login')">Login</x-nav-link>
                                <x-nav-link href="register" :active="request()->is('register')">register</x-nav-link>
                            @endguest
                            @auth
                                <form action="/logout" method="">
                                    @csrf
                                    <x-form-button>Logout</x-form-button>
                                </form>
                            @endauth
                            {{-- <div class="relactive">
                                <button class="flex items-center text-white focus:outline-none">
                                    <img class="size-10 rounded-full"
                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                        alt="User">
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="mx-10 my-2 flex justify-center items-center">
            <a class="border border-gray-300 rounded-lg px-6 py-2 shadow rounded-r-none font-bold"
                href="/courses">Courses</a>
            <a class="border border-gray-300  px-6 py-2 shadow  font-bold" href="/employers">Emloyers</a>
            <a class="border border-gray-300  px-6 py-2 shadow  font-bold" href="/companies">companies</a>
            <a class="border border-gray-300 rounded-lg px-6 py-2 shadow rounded-l-none font-bold"
                href="/blogs">Blogs</a>
        </div>
        <div class="px-20 bg-gray-50 py-3 shadow text-2xl font-bold">
            {{ $heading }}
        </div>

        <div class="container mt-5 px-20">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
