<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, sidebarExpanded: true }" class="h-full bg-gradient-to-br from-violet-50 via-white to-violet-100">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Login' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="h-full flex items-center justify-center bg-radial from-violet-300 via-violet-50 to-white">
    <div class="w-full max-w-md bg-white border border-gray-300 rounded-xl shadow-sm p-8 animate-fade-in">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-violet-500 tracking-tight">Login</h1>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-600">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-violet-400 focus:border-violet-400 transition duration-200 outline-none"
                    placeholder="you@example.com"
                    value="{{ old('email') }}">
            </div>

            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-600">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-violet-400 focus:border-violet-400 transition duration-200 outline-none"
                    placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-500">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-violet-500 focus:ring-violet-400">
                    <span class="ml-2">Remember me</span>
                </label>
                <a href="#" class="text-violet-500 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full py-3 bg-violet-500 hover:bg-violet-600 text-white font-semibold rounded-xl shadow-md transition duration-200 ease-in-out">
                Login
            </button>
        </form>
    </div>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</body>
</html>
