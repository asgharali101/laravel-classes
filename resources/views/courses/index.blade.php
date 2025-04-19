<x-navigation>
    <x-slot:heading>
        <p class=" text-gray-800 rounded-lg  py-2  inline-block font-bold"> Courses
        </p>
    </x-slot:heading>
    <a class="border border-green-300 text-green-500 rounded-lg px-6 py-2 shadow  font-bold" href="/courses/create">Create
        New</a>
    <div>
        <ul>
            <li class="flex flex-col  text-gray-700  space-y-2 pt-6">
                @foreach ($courses as $course)
                    <div class="flex justify-between items-center border border-green-200 rounded-md py-2 px-4">
                        <div class="flex gap-x-6 ">
                            <img class="h-10 w-10 rounded-full" src="{{ $course['image_path'] }}" alt="">

                            <a class=" text-lg font-semibold" href="/course/{{ $course['id'] }}">
                                {{ $course['title'] }}
                            </a>
                        </div>
                        <div class="flex space-x-2">
                            <a class="text-blue-500" href="/course/edit/{{ $course->id }}">Edit</a>
                            <form action="/courses/delete/{{ $course->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="py-4">
                    {{ $courses->links() }}
                </div>
            </li>
        </ul>
    </div>
</x-navigation>
