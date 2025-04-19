<x-navigation>
    <x-slot:heading>
        <p class="mx-20 px-10 py-3 rounded-md text-xl inline-block text-yellow-500 bg-black "> Courses
        </p>
    </x-slot:heading>

    <div class="px-20">
        <img src="{{ $course['image_path'] }}" alt="">
        <h2 class="text-xl font-bold">{{ $course['title'] }}</h2>
        <p>{{ $course['body'] }}</p>
        {{-- @foreach ($course->user as $user)
            <p>{{ $user->last_name }}</p>
        @endforeach --}}
    </div>
</x-navigation>
