<aside class="fixed inset-y-0 left-0 z-30 flex flex-col bg-gray-800 
                  border-r border-gray-700 transform transition-all duration-200 lg:translate-x-0"
           :class="{
               'w-64': sidebarExpanded,
               'w-16': !sidebarExpanded,
               '-translate-x-full': !sidebarOpen
           }">

        <div class="h-14 flex items-center justify-between px-4 border-b border-gray-700">
            <span x-show="sidebarExpanded" 
                  class="lifeshift-logo font-bold text-lg text-blue-400 tracking-wide">
                Liveshift
            </span>
            <button @click="sidebarExpanded = !sidebarExpanded" 
                    class="p-1 text-gray-300 hover:bg-gray-700 rounded-lg">
                ⇔
            </button>
        </div>

        <nav class="flex-1 p-3 space-y-1 overflow-y-auto text-sm font-medium">
            <x-sidebar-link href="{{ route('admin.dashboard') }}" icon="home">
                Dashboard
            </x-sidebar-link>

            <x-sidebar-group title="Management">
                <x-sidebar-sublink href="{{ route('admin.users.index') }}">Users</x-sidebar-sublink>
                <x-sidebar-sublink href="{{ route('admin.schedules.index') }}">Schedules</x-sidebar-sublink>
                <x-sidebar-sublink href="{{ route('admin.shifts.index') }}">Shifts</x-sidebar-sublink>
                <x-sidebar-sublink href="{{ route('admin.attendances.index') }}">Attendances</x-sidebar-sublink>
            </x-sidebar-group>

            <x-sidebar-link href="#" icon="settings">
                Settings
            </x-sidebar-link>
        </nav>

        <div class="p-3 border-t border-gray-700 space-y-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="w-full flex items-center gap-2 px-3 py-2 rounded-lg
                               text-red-400 hover:bg-red-900/30 transition">
                    <span>🚪</span> 
                    <span x-show="sidebarExpanded">Logout</span>
                </button>
            </form>
        </div>
    </aside>