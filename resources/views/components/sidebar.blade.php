<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>EduAdmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="relative min-h-screen flex">

        <!-- Mobile Overlay -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 transition-opacity md:hidden"></div>

        <!-- Sidebar -->
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed z-30 shadow-2xl inset-y-0 left-0 w-60 bg-gray-800 text-white transform transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-0 ">
            <div class="p-4 font-bold text-xl border-b border-gray-500 flex justify-between items-center">
                AliDev
                <button @click="sidebarOpen = false" class="md:hidden text-white text-2xl">&times;</button>
            </div>
            <nav class=" text-base">
                <x-sidebar-link href="jobs" :active="request()->is('jobs')">
                    📘 <span>Students</span>
                </x-sidebar-link>
                <x-sidebar-link href="teachers" :active="request()->is('teachers')">
                    👨‍🏫 <span>Teachers</span>
                </x-sidebar-link>
                <x-sidebar-link href="courses" :active="request()->is('courses')">
                    📚 <span>Courses</span>
                </x-sidebar-link>
                <x-sidebar-link href="enrollments" :active="request()->is('enrollments')">
                    📝 <span>Enrollments</span>
                </x-sidebar-link>
                <x-sidebar-link href="payments" :active="request()->is('payments')">
                    💰 <span>Payments</span>
                </x-sidebar-link>
            </nav>
        </aside>

        <!-- Main Page Content -->
        <div class="flex-1 flex flex-col min-h-screen overflow-hidden">

            <!-- Mobile Topbar -->
            <header class="md:hidden bg-white shadow p-4 z-10">
                <button @click="sidebarOpen = true" class="text-gray-700 text-2xl">&#9776;</button>
            </header>

            <!-- Content Area -->
            <main class="p-6 bg-gray-100 flex-1">
                <div class="max-w-7xl mx-auto space-y-6">
                    <div class="bg-white shadow-md rounded-xl p-6">
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
