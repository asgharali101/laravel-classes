<x-navigation>
    <x-slot:heading> Job</x-slot:heading>
    <div style="padding: 20px">
        <h2>Tags:: {{ $job->tag }}</h2>

        {{-- @foreach ($job->tag as $tag)
            <h2>Tags:: {{ $tag->name }}</h2>
        @endforeach --}}
        <h2>{{ $job['title'] }}</h2>
        <p>take his sallary {{ $job['sallary'] }} per Month</p>
        <p>on date {{ $job['created_at'] }}</p>
    </div>

</x-navigation>
