@extends('layouts.main')

@section('content')
<x-ui.card title="User Info" subtitle="Basic details">
    <x-slot:header>
        <button class="text-xs text-cyan-400 hover:underline">Edit</button>
    </x-slot:header>

    <p>This is the card body content.</p>

    <x-slot:footer>
        Last updated 2 mins ago
    </x-slot:footer>
</x-ui.card>

@endsection
