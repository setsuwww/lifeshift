@extends('layouts.main')

@section('content')
<h1 class="text-xl font-bold mb-4">Create Schedule</h1>

<form action="{{ route('schedules.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block">Title</label>
        <input type="text" name="title" class="border rounded px-3 py-1 w-full">
    </div>
    <div>
        <label class="block">Date</label>
        <input type="date" name="date" class="border rounded px-3 py-1 w-full">
    </div>
    <div>
        <label class="block">Assign Users</label>
        <select name="users[]" multiple class="border rounded px-3 py-1 w-full">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
</form>
@endsection
