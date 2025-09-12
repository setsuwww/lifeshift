@extends('layouts.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Shifts</h1>

<a href="{{ route('shifts.create') }}" class="px-3 py-2 bg-green-600 text-white rounded">+ New</a>

<table class="w-full mt-4 border">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-2 py-1 border">Name</th>
            <th class="px-2 py-1 border">Time</th>
            <th class="px-2 py-1 border">Users</th>
            <th class="px-2 py-1 border">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($shifts as $shift)
        <tr>
            <td class="border px-2 py-1">{{ $shift->name }}</td>
            <td class="border px-2 py-1">{{ $shift->start_time }} - {{ $shift->end_time }}</td>
            <td class="border px-2 py-1">
                @foreach($shift->users as $user)
                    <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs">{{ $user->name }}</span>
                @endforeach
            </td>
            <td class="border px-2 py-1">
                <a href="{{ route('shifts.edit', $shift) }}" class="text-blue-600">Edit</a>
                <form action="{{ route('shifts.destroy', $shift) }}" method="POST" class="inline">
                    @csrf @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
