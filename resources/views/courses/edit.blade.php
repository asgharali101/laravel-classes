<x-navigation>
    <!DOCTYPE html>
    <html lang="en" class="group" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Contact</title>
        <meta name="description" content="web development agency">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="YUCtNVCcqCgR5CLiVKgCJZbPniH2JTCRYZWfRuLz">
        <link rel="shortcut icon" type="image_path/x-icon" href="uploads/3.png">
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
        <x-slot:heading> Edit course </x-slot:heading>
        <p>TODO</p>

        <form action="/courses/update/{{ $course->id }}" method="POST" enctype="multipart/form-data"
            class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-md space-y-6">
            @csrf
            @method('patch');
            <h2 class="text-2xl font-bold text-gray-800 text-center">Edit course</h2>

            <div>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input name="title" value="{{ $course->title }}" />
                <x-form-error name="title" />
            </div>

            <div>
                <x-form-label for="image_path">Image Path</x-form-label>
                <x-form-input type="file" name="image_path" />
                <x-form-error name="image_path" />
                <img class="h-16 w-16 " src="/{{ $course->image_path }}" alt="">
            </div>

            <div>
                <x-form-label for="body">body</x-form-label>
                <x-form-text-area name="body" value="{{ $course->body }}"> {{ $course->body }}
                </x-form-text-area>
                <x-form-error name="body" />
            </div>

            <!-- Employers Dropdown -->
            {{-- <div>
                <label for="employer_id" class="block text-sm font-medium text-gray-700">Select Employer</label>
                <select name="employer_id" id="employer_id" required
                    class="mt-1 w-full border border-gray-300 rounded-lg px-4 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                    <option value="">-- Select Employer --</option>
                    @foreach ($employers as $employer)
                        <option value="{{ $employer->id }}">{{ $employer->name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-full shadow hover:bg-blue-700 transition">
                    Post course
                </button>
            </div>
        </form>




    </body>

    </html>

</x-navigation>
