<x-navigation>
    <x-slot:heading> Company</x-slot:heading>
    <div style="padding: 20px">

        <h2><strong>Company Name:: </strong>{{ $company['name'] }}</h2>
        <p> <strong>Description:: </strong>{{ $company['description'] }}</p>
        <p><strong>on date:: </strong> {{ $company['created_at'] }}</p>
    </div>

</x-navigation>
