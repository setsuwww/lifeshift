<header class="bg-gray-800 border-b border-gray-700 
                       h-14 flex items-center px-4 justify-between">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = !sidebarOpen" 
                        class="lg:hidden p-2 rounded-md hover:bg-gray-700">
                    ☰
                </button>
                <div class="flex flex-col">
                    <h4 class="text-sm font-semibold text-gray-300">{{ Auth::user()->name }}</h4>
                    <span class="text-xs font-base text-gray-400">{{ Auth::user()->email }}</span>
                </div>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden md:block">
                    <input type="text" placeholder="Search..."
                           class="border border-gray-600 bg-gray-700 rounded-md px-3 py-1 text-sm 
                                  focus:outline-none focus:ring focus:border-blue-500 focus:ring-blue-700 
                                  text-gray-200 placeholder-gray-400">
                </div>

                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="flex items-center gap-2 hover:bg-gray-700 px-2 py-1 rounded-md">
                        <img src="https://i.pravatar.cc/32" 
                             class="w-8 h-8 rounded-full border border-gray-600">
                    </button>

                    <div x-show="open" @click.away="open = false" 
                         x-transition
                         class="absolute right-0 mt-2 w-44 bg-gray-800 
                                border border-gray-700 
                                rounded-md shadow-lg py-2 z-50">
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-700">Settings</a>
                        <div class="border-t border-gray-700 my-1"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" 
                                    class="w-full text-left block px-4 py-2 text-sm text-red-400 hover:bg-red-900/30">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>