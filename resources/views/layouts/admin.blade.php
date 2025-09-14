<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>@yield('title', 'Admin Dashboard')</title>
      @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

      <div class="flex h-screen">
            {{-- Sidebar --}}
            <aside class="w-64 bg-white shadow-md h-screen p-4 space-y-2">
                  <div class="text-xl font-bold mb-4">Admin Panel</div>

                  @section('sidebar')
                  <x-sidebar-link title="Dashboard" href="{{ route('admin.dashboard') }}"
                        :active="request()->routeIs('admin.dashboard')">
                        <x-slot:icon>
                              <x-lucide-home class="w-5 h-5" />
                        </x-slot:icon>
                  </x-sidebar-link>

                  <x-sidebar-link title="Management" :sub-links="[
                    ['title' => 'Users', 'href' => route('admin.users.index')],
                    ['title' => 'Shifts', 'href' => '#'],
                    ['title' => 'Schedules', 'href' => '#'],
                    ['title' => 'Attendances', 'href' => '#'],
                  ]">
                        <x-slot:icon>
                              <x-lucide-list class="w-5 h-5" />
                        </x-slot:icon>
                  </x-sidebar-link>

                  <x-sidebar-link title="Create" :sub-links="[
                    ['title' => 'Add Users', 'href' => route('admin.users.index')],
                    ['title' => 'Add Shifts', 'href' => '#'],
                    ['title' => 'Add Schedules', 'href' => '#'],
                    ['title' => 'Add Attendances', 'href' => '#'],
                  ]">
                        <x-slot:icon>
                              <x-lucide-settings class="w-5 h-5" />
                        </x-slot:icon>
                  </x-sidebar-link>

                  <x-sidebar-link title="Profile" href="/admin/profile"
                        :active="request()->routeIs('/admin/profile')">
                        <x-slot:icon>
                              <x-lucide-home class="w-5 h-5" />
                        </x-slot:icon>
                  </x-sidebar-link>

                  <x-sidebar-link title="Setting" href="/admin/setting"
                        :active="request()->routeIs('/admin/setting')">
                        <x-slot:icon>
                              <x-lucide-home class="w-5 h-5" />
                        </x-slot:icon>
                  </x-sidebar-link>
                  @show
            </aside>

            {{-- Main Content --}}
            <div class="flex-1 flex flex-col">
                  <header class="bg-white shadow p-4 flex justify-between items-center">
                        <h1 class="text-xl font-semibold">@yield('header', 'Dashboard')</h1>
                        <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors">
                                    Logout
                              </button>
                        </form>
                  </header>

                  {{-- Page Content --}}
                  <main class="p-6 flex-1 bg-gray-100 overflow-auto">
                        @yield('content')
                  </main>
            </div>
      </div>

</body>

</html>