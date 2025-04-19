<x-form>

    @foreach ($alldata as $data)
        <li> <strong>{{ $data['name'] }}</strong> : pays {{ $data['email'] }} month </li>
    @endforeach

</x-form>
