<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>All Users</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">

    <h1 class="text-3xl font-bold mb-6">Registered Users</h1>

    <ul>
        @foreach ($users as $user)
            <li>{{ $user->first_name }}</li>
        @endforeach
    </ul>

</body>

</html>
