<x-navigation>
    <!DOCTYPE html>
    <html lang="en" class="group" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Register</title>
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
        <x-slot:heading> Register </x-slot:heading>
        <p>TODO</p>
        <form action="/jobs/store" method="POST" class="max-w-lg mx-auto bg-white p-6 rounded-2xl shadow-md space-y-6">
            @csrf

            <h2 class="text-2xl font-bold text-gray-800 text-center">Create New Job</h2>

            <div>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input name="title" value="{{ old('title') }}" />
                <x-form-error name="title" />
            </div>

            <div>
                <x-form-label for="sallary">Sallary</x-form-label>
                <x-form-input name="sallary" value="{{ old('sallary') }}" />
                <x-form-error name="sallary" />
            </div>


            <div class="text-center">
                <x-form-button>Post Job</x-form-button>
            </div>
        </form>




    </body>

    </html>

</x-navigation>
