@extends('layouts.main')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create User</h1>

<form action="{{ route('users.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm">Name</label>
        <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}" required>
        @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded" value="{{ old('email') }}" required>
        @error('email') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <label class="block text-sm">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded" required>
        @error('password') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
    </div>
    <div>
        <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>
        <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:underline">Cancel</a>
    </div>
</form>
@endsection
