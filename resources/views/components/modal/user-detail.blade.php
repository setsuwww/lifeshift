<div x-show="openModal" x-cloak x-transition.opacity.duration.300ms
  class="fixed inset-0 flex items-center justify-center bg-black/60 z-50">
  <!-- Modal box -->
  <div @click.away="openModal = false" x-transition.scale.origin.center.duration.300ms
    class="bg-gray-800 border border-gray-700 rounded-2xl shadow-2xl w-full max-w-md p-6 relative">
    <!-- Header -->
    <header class="flex justify-between items-center border-b border-gray-700 pb-3 mb-4">
      <h3 class="text-xl font-semibold text-white">Users detail</h3>
      <button @click="openModal = false" class="text-gray-400 hover:text-gray-200">
        ✕
      </button>
    </header>

    <!-- Content -->
    <main class="space-y-3 text-gray-300">
      <div class="flex items-center space-x-2">
        <div class="bg-gray-700 p-2 rounded-xl">
          <x-lucide-circle-user-round class="size-10" />
        </div>

        <div class="flex flex-col space-y-1.5 w-full">
          <div class="flex items-center justify-between w-full">
            <span class="text-sm font-semibold text-white" x-text="selectedUser.name"></span>
            <span class="px-2 py-0.5 rounded-md border text-xs font-medium" :class="{
              'bg-red-500/20 border-red-500/60 text-red-300': selectedUser.role === 'admin',
              'bg-green-500/20 border-green-500/60 text-green-300': selectedUser.role === 'employee',
              'bg-blue-500/20 border-blue-500/60 text-blue-300': selectedUser.role === 'user',
              'text-gray-500 border border-gray-600': !['admin','employee','user'].includes(selectedUser.role)
            }" x-text="selectedUser.role">
            </span>
          </div>

          <span class="text-xs text-gray-500" x-text="selectedUser.email"></span>
        </div>
      </div>

      <div class="flex flex-col text-sm">
        <div class="flex items-center space-x-1">
          <p class="text-white font-semibold">Created at: </p>
          <span x-text="new Intl.DateTimeFormat('id-ID', {
                        dateStyle: 'long',
                    }).format(new Date(selectedUser.created_at))">
          </span>
        </div>
        <div class="flex items-center space-x-1">
          <p class="text-white font-semibold">Updated at: </p>
          <span x-text="new Intl.DateTimeFormat('id-ID', {
                        dateStyle: 'long',
                    }).format(new Date(selectedUser.updated_at))">
          </span>
        </div>
      </div>
    </main>

    <!-- Footer -->
    <footer class="mt-6 flex justify-end space-x-2">
      <button @click="openModal = false" class="btn-primary">
        Close
      </button>
    </footer>
  </div>
</div>