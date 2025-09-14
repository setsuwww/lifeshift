<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, sidebarExpanded: true }">
<head>
    <meta charset="UTF-8">
    <title>L - Dashboard</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="h-full flex bg-gray-900 text-gray-200">

    <div class="fixed inset-0 bg-black bg-opacity-40 z-20 md:hidden" 
         @click="sidebarOpen = false" 
         x-show="sidebarOpen" 
         x-transition.opacity>
    </div>

    <x-sidebar />

    <div class="flex-1 flex flex-col min-h-screen transition-all"
         :class="{ 'lg:ml-64': sidebarExpanded, 'lg:ml-16': !sidebarExpanded }">

        <x-header />

        <main class="p-6 overflow-y-auto flex-1">
            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
</body>
</html>
