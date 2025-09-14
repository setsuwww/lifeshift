<?php

if (!function_exists('roleColor')) {
    function roleColor(string $role): string
    {
        return match ($role) {
            'admin' => 'bg-red-500/20 border-red-500/60 text-red-300',
            'employee' => 'bg-green-500/20 border-green-500/60 text-green-300',
            'user' => 'bg-blue-500/20 border-blue-500/60 text-blue-300',
            default => 'text-gray-500',
        };
    }
}
