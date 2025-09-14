<div>
    <x-container.content title="Users" subtitle="Manage all users in this table"
        x-data="{ openModal: false, selectedUser: {}, filterOpen: false }">

        <x-modal.user-detail />

        <x-slot:create>
            <a href="{{ route('admin.users.create') }}" class="flex items-center space-x-2 btn-primary">
                <x-lucide-plus class="size-6" />
                <span>Add User</span>
            </a>
        </x-slot:create>

        <x-slot:action>
            <div class="flex space-x-2 relative">
                <!-- Search + Filter -->
                <div class="flex items-center w-full md:w-1/3 bg-gray-800 border border-gray-700 rounded-lg overflow-hidden focus-within:ring-2 focus-within:ring-blue-500">
                    <button @click="filterOpen = !filterOpen" class="px-3 text-gray-400 hover:text-blue-400">
                        <x-lucide-filter class="w-5 h-5" stroke-width="1" />
                    </button>

                    <div class="h-6 w-px bg-gray-700"></div>

                    <!-- Input search -->
                    <input type="text" wire:model.debounce.300ms="search" placeholder="Search users..."
                        class="flex-1 px-3 py-2 bg-gray-800 text-sm text-gray-200 focus:outline-none" />
                </div>

                <!-- Dropdown filter -->
                <div x-show="filterOpen" @click.outside="filterOpen=false"
                    class="absolute top-12 left-0 w-64 bg-gray-800 border border-gray-700 rounded-lg shadow-lg p-4 z-50 space-y-4">

                    <!-- Filter Role -->
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Role</label>
                        <select wire:model="filterRole"
                            class="w-full bg-gray-900 border border-gray-700 rounded-lg px-2 py-1 text-sm text-gray-200">
                            <option value="">All</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="staff">Staff</option>
                            <option value="accountant">Accountant</option>
                            <option value="user">User</option>
                        </select>
                    </div>

                    <!-- Filter Shift -->
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Shift</label>
                        <select wire:model="filterShift"
                            class="w-full bg-gray-900 border border-gray-700 rounded-lg px-2 py-1 text-sm text-gray-200">
                            <option value="">All</option>
                            <option value="morning">Morning</option>
                            <option value="afternoon">Afternoon</option>
                            <option value="evening">Evening</option>
                            <option value="night">Night</option>
                        </select>
                    </div>
                </div>
            </div>
        </x-slot:action>

        <!-- Table -->
        <x-table.index>
            <x-table.head>
                <x-table.cell class="font-bold">Name</x-table.cell>
                <x-table.cell class="font-bold">Shift</x-table.cell>
                <x-table.cell class="font-bold">Role</x-table.cell>
                <x-table.cell class="font-bold">Created & Updated</x-table.cell>
                <x-table.cell class="font-bold">Action</x-table.cell>
            </x-table.head>

            <x-table.body>
                @forelse($users as $user)
                    <x-table.row>
                        <x-table.cell>
                            <div class="flex items-center space-x-2">
                                <div class="bg-gray-700 p-2 rounded-md">
                                    <x-lucide-circle-user-round class="w-5 h-5 " />
                                </div>
                                <div class="flex flex-col space-y-0.5">
                                    <h4 class="text-sm">{{ $user->name }}</h4>
                                    <span class="text-xs text-gray-500">{{ $user->email }}</span>
                                </div>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex flex-col">
                                <h4 class="text-sm">{{ ucfirst($user->shift ?? '-') }}</h4>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <span class="badge {{ roleColor($user->role) }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex flex-col">
                                <h4 class="text-sm">{{ $user->created_at->format('d F y') }}</h4>
                                <span class="text-xs text-gray-500">{{ $user->updated_at->format('d F y') }}</span>
                            </div>
                        </x-table.cell>
                        <x-table.cell>
                            <div class="flex items-center space-x-2">
                                <button @click='openModal = true; selectedUser = @json($user)'
                                    class="px-4 py-1 bg-transparent border border-gray-500 rounded-md hover:bg-gray-600/20">
                                    Show
                                </button>
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="px-4 py-1 bg-transparent border border-gray-500 rounded-md hover:bg-gray-600/20">
                                    Edit
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-1 bg-red-600 rounded-md hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </x-table.cell>
                    </x-table.row>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-gray-500 py-4">No users found.</td>
                    </tr>
                @endforelse
            </x-table.body>
        </x-table.index>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </x-container.content>
</div>
