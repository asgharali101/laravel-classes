<x-navigation>
    <x-slot:heading>
        <h1
            class="text-3xl font-bold text-white bg-gradient-to-r from-green-600 to-blue-500 py-4 px-8 rounded-xl shadow-lg w-fit">
            Create New Blog
        </h1>
    </x-slot:heading>

    <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg mt-8">
        <form action="/blogs/store" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <x-form-label for="title">Title</x-form-label>
                <x-form-input name="title" value="{{ old('title') }}" />
                <x-form-error name="title" />
            </div>

            <!-- Excerpt -->
            <div>
                <x-form-label for="excerpt">excerpt</x-form-label>
                <x-form-input name="excerpt" value="{{ old('excerpt') }}" />
                <x-form-error name="excerpt" />
            </div>

            <!-- Description -->
            <div>
                <x-form-label for="description">description</x-form-label>
                <x-form-text-area name="description" value="{{ old('name') }}"> {{ old('name') }}
                </x-form-text-area>
                <x-form-error name="description" />
            </div>

            <!-- Image Upload -->
            <div>
                <x-form-label for="feature_image">Feature Image</x-form-label>
                <x-form-input-file type="file" name="feature_image" />
                <x-form-error name="feature_image" />
            </div>

            <!-- Video Upload -->
            <div>
                <x-form-label for="video_path">Video Path</x-form-label>
                <x-form-input-file type="file" name="video_path" />
                <x-form-error name="video_path" />
            </div>

            <!-- Submit Button -->
            <div class="pt-6">
                <x-form-button>Save Blog</x-form-button>
            </div>
        </form>
    </div>
</x-navigation>
