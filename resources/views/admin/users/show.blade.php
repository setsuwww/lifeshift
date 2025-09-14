@extends('layouts.admin')
@section('content')
<h1>User Details</h1>
<p><strong>Name:</strong> {{ $user->name }}</p>
<p><strong>Email:</strong> {{ $user->email }}</p>
<p><strong>Role:</strong> {{ $user->role }}</p>
<a href="{{ route('admin.users.index') }}">Back to Users</a>
@endsection
