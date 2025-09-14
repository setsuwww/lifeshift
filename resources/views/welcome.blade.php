<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false, sidebarExpanded: true }" class="h-full">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-radial from-violet-950 via-gray-800 to-gray-900">
    <div class="w-full max-w-md bg-gray-900 border border-gray-700 rounded-2xl shadow-2xl p-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-violet-400 tracking-widest"></h1>
            <x-assets.liveshift />
        </div>

        <form method="POST" action="{{ url('/login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="label">Email<span class="text-red-400 pl-1">*</span></label>
                <input type="email" name="email" id="email" required class="input">
            </div>

            <div>
                <label for="password" class="label">Password<span class="text-red-400 pl-1">*</span></label>
                <input type="password" name="password" id="password" required class="input">
            </div>

            <div class="flex items-center justify-between text-sm">
                <label class="flex items-center text-gray-400">
                    <input type="checkbox" class="rounded bg-gray-800 border-gray-700 text-violet-500 focus:ring-violet-600">
                    <span class="ml-2">Remember me</span>
                </label>
                <a href="#" class="text-violet-400 hover:underline">Forgot password?</a>
            </div>

            <button type="submit" class="w-full btn-auth">
                Login
            </button>
        </form>

        <p class="mt-8 text-center text-gray-500 text-sm">
            Don’t have an account?
            <a href="#" class="text-violet-400 hover:underline">Register</a>
        </p>
    </div>
</div>

</body>
</html>
