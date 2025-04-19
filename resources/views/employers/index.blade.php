<x-navigation>
    <x-slot:heading>
        Employers
    </x-slot:heading>
    <a class="border border-green-300 text-green-500 rounded-lg px-6 py-2 shadow  font-bold"
        href="/employers/create">Create
        New</a>
    <div>
        <ul>
            <li class="flex flex-col text-gray-700  space-y-2 pt-6">
                @foreach ($employers as $employer)
                    <div class="border flex justify-between border-green-200 rounded-md py-2 px-4">
                        <a href="/employer/{{ $employer['id'] }}" class=" text-lg font-semibold">
                            {{ $employer['name'] }} </a>
                        <div class="flex space-x-3">
                            <a class="text-blue-500" href="/employer/edit/{{ $employer->id }}">Edit</a>
                            <form action="/employer/delete/{{ $employer->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="text-red-500" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </li>

            <div class="py-4">
                {{ $employers->links() }}
            </div>
        </ul>
    </div>

</x-navigation>
