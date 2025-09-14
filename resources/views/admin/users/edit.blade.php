@extends('layouts.admin')
@section('content')
<h1>Edit User</h1>

<form action="{{ route('admin.users.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
    </div>

    <div>
        <label>Password (Leave blank to keep current)</label>
        <input type="password" name="password">
    </div>

    <div>
        <label>Role</label>
        <select name="role" required>
            <option value="Admin" @selected($user->role=='Admin')>Admin</option>
            <option value="Coordinator" @selected($user->role=='Coordinator')>Coordinator</option>
            <option value="User" @selected($user->role=='User')>User</option>
        </select>
    </div>

    <button type="submit">Update User</button>
</form>
@endsection
