<x-navigation>
    <x-slot:heading>
        <h1 class="mx-8 px-8 py-4 rounded-xl text-xl font-extrabold  shadow-lg w-fit">
            Blog Details
        </h1>
    </x-slot:heading>

    <div class="px-6 md:px-20 py-10 bg-white rounded-xl shadow-lg">
        <!-- Blog Image -->
        {{-- <div class="mb-6">
            <img src="/{{ $blog->feature_image }}" alt="Blog Image"
                class="w-full max-h-[400px] object-cover rounded-xl shadow-md border border-gray-200">
        </div> --}}

        <!-- Blog Title -->
        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
            {{ $blog['title'] }}
        </h2>

        <!-- Blog Description -->
        <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6">
            {{ $blog->description }}
        </p>

        <!-- Blog Video -->
        @if ($blog->video_path)
            <div class="mt-4">
                <video controls class="w-full rounded-lg shadow border border-gray-300">
                    <source src="/{{ $blog->video_path }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        @endif

        <!-- Optional: Author (Uncomment if needed) -->
        {{-- 
        <div class="mt-6 text-gray-600 text-sm">
            @foreach ($blog->user as $user)
                <p>Author: {{ $user->last_name }}</p>
            @endforeach
        </div>
        --}}
    </div>
</x-navigation>
