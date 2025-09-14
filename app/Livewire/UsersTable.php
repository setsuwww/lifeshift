<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';
    public $filterRole = '';
    public $filterShift = '';

    protected $updatesQueryString = ['search', 'filterRole', 'filterShift'];

    public function updating($field)
    {
        if (in_array($field, ['search', 'filterRole', 'filterShift'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = User::query()->with('shifts');

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('name', 'like', "%{$this->search}%")
                  ->orWhere('email', 'like', "%{$this->search}%");
            });
        }

        if ($this->filterRole) {
            $query->where('role', $this->filterRole);
        }

        if ($this->filterShift) {
            $query->whereHas('shift', function ($q) {
                $q->where('type', $this->filterShift);
            });
        }

        return view('livewire.users-table', [
            'users' => $query->latest()->paginate(10),
        ]);
    }
}
