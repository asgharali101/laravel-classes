<x-navigation>
    <x-slot:heading>
        <h1
            class="text-3xl font-bold text-white bg-gradient-to-r from-green-600 to-blue-500 py-4 px-8 rounded-xl shadow-lg w-fit">
            edit New Blog
        </h1>
    </x-slot:heading>

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg mt-8">
        <form action="/blogs/update/{{ $blog->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('patch');

            <!-- Title -->
            <div>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input name="title" value="{{ $blog->title }}" />
                <x-form-error name="title" />
            </div>

            <!-- Excerpt -->
            <div>
                <x-form-label for="excerpt">excerpt</x-form-label>
                <x-form-input name="excerpt" value="{{ $blog->excerpt }}" />
                <x-form-error name="excerpt" />
            </div>

            <!-- Description -->
            <div>
                <x-form-label for="description">description</x-form-label>
                <x-form-text-area name="description" value="{{ $blog->description }}"> {{ $blog->description }}
                </x-form-text-area>
                <x-form-error name="description" />
            </div>

            <!-- Image Upload -->
            <div>
                <x-form-label for="feature_image">Feature Image</x-form-label>
                <x-form-input-file type="file" name="feature_image" />
                <x-form-error name="feature_image" />
                <img class="rounded-md w-64 border border-amber-200" src="/{{ $blog->feature_image }}" alt="">
            </div>

            <!-- Video Upload -->
            <div>
                <x-form-label for="video_path">Feature Image</x-form-label>
                <x-form-input-file type="file" name="video_path" />
                <x-form-error name="video_path" />

                <video width="100%" height="auto" controls>
                    <source src="{{ asset('storage/' . $blog->video_path) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <button type="submit"
                    class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md hover:scale-105 transform transition">
                    Save Blog
                </button>
            </div>
        </form>
    </div>
</x-navigation>
