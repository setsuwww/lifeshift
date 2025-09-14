<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

use Livewire\Livewire;

class ComponentsProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Blade::componentNamespace('App\\View\\Components\\Table', 'table');

        Livewire::component('users-table', \App\Livewire\UsersTable::class);
    }
}
