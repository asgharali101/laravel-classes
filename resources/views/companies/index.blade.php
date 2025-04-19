<x-navigation>
    <!DOCTYPE html>
    <html lang="en" class="group" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Companies</title>
        <meta name="description" content="web development agency">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="YUCtNVCcqCgR5CLiVKgCJZbPniH2JTCRYZWfRuLz">
        <link rel="shortcut icon" type="image/x-icon" href="uploads/3.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">

        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Public+Sans:ital,wght@0,100..900;1,100..900&display=swap">
        <link rel="stylesheet" href="css/toastr.min.css">
        <link rel="stylesheet" href="css/swiper-bundle.min.css">
        <script src="js/lozad.min.js"></script>
        <link rel="stylesheet" href="css/output.min.css">

        <script src="js/flasher.min.js" type="text/javascript" nonce=""></script>
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body>
        <x-slot:heading> Companies Page </x-slot:heading>

        <a class="border border-green-300 text-green-500 rounded-lg px-6 py-2 shadow  font-bold"
            href="/companies/create">Create
            New</a>
        <div class="isolate bg-white my-10 ">
            <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
                aria-hidden="true">
                <div class="relative left-1/2 -z-10 aspect-1155/678 w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>

            <ul class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 mt-6">
                @foreach ($companies as $company)
                    <li class="bg-white shadow-md rounded-2xl p-5 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg font-semibold text-gray-700 mb-1">
                            <span class="text-blue-600">Employer:</span> {{ $company->employer->name }}
                        </h3>
                        <a href="/company/{{ $company->id }}" class="block mt-2 group">
                            <h2 class="text-xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                                {{ $company->name }}
                            </h2>
                            <p class="text-sm text-gray-600 mt-2">
                                {{ $company->description }}
                            </p>
                            <div class="flex justify-between items-center">
                                <span class="inline-block mt-4 text-blue-500 text-sm font-medium group-hover:underline">
                                    View Details →
                                </span>
                                <div class="space-x-2">
                                    <a href="/company/edit/{{ $company->id }}"
                                        class="inline-block mt-4 text-green-500 text-sm font-medium group-hover:underline">
                                        Edit
                                    </a>
                                    <form action="/company/delete/{{ $company->id }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 text-sm font-medium hover:underline bg-transparent border-none cursor-pointer p-0 m-0">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="mt-8">
                {{ $companies->links() }}
            </div>


        </div>


    </body>

    </html>

</x-navigation>
