<x-navigation>
    <x-slot:heading>
        <h1 class="text-2xl text-gray-800 font-bold mb-4">Blogs</h1>
    </x-slot:heading>

    <div class="mb-6">
        <a href="/blogs/create"
            class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-5 rounded-md shadow transition duration-300">
            + Create New Blog
        </a>
    </div>
    <div>

        <div class="grid gap-6 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($blogs as $blog)
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-2xl transform hover:-translate-y-1 transition duration-300 border border-gray-200">
                    <a href="/blog/{{ $blog->id }}">
                        <img class="w-full h-48 object-cover" src="{{ $blog['feature_image'] }}" alt="Blog Image">
                        <div class="p-5">
                            <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $blog->title }}</h2>
                            <p class="text-gray-600 text-sm mb-3">{{ Str::limit($blog->excerpt, 100) }}</p>
                            <div class="flex justify-between items-center pt-3 border-t border-gray-200">
                                <a href="/blogs/edit/{{ $blog->id }}"
                                    class="text-blue-600 hover:underline text-sm font-medium">Edit</a>
                                <form action="/blogs/delete/{{ $blog->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 text-sm font-medium">Delete</button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $blogs->links() }}
        </div>
    </div>
</x-navigation>
