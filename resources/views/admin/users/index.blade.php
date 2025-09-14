@extends('layouts.admin')
@section('content')
<h1>Users</h1>
<a href="{{ route('admin.users.create') }}" class="btn">Add User</a>

<table class="table-auto w-full mt-4">
    <thead>
        <tr>
            <th class="border px-2 py-1">Name</th>
            <th class="border px-2 py-1">Email</th>
            <th class="border px-2 py-1">Role</th>
            <th class="border px-2 py-1">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td class="border px-2 py-1">{{ $user->name }}</td>
            <td class="border px-2 py-1">{{ $user->email }}</td>
            <td class="border px-2 py-1">{{ $user->role }}</td>
            <td class="border px-2 py-1 flex space-x-2">
                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-edit">Edit</a>
                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-delete" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}
@endsection
