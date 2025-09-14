@extends('layouts.admin')
@section('content')
<h1>Create User</h1>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div>
        <label>Name</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Role</label>
        <select name="role" required>
            <option value="Admin">Admin</option>
            <option value="Coordinator">Coordinator</option>
            <option value="User" selected>User</option>
        </select>
    </div>

    <button type="submit">Create User</button>
</form>
@endsection
