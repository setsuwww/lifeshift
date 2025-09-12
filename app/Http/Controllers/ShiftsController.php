<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    public function index()
    {
        $shifts = Shift::with('users')->get();
        return view('shifts.index', compact('shifts'));
    }

    public function create()
    {
        $users = User::all();
        return view('shifts.create', compact('users'));
    }

    public function store(Request $request)
    {
        $shift = Shift::create($request->only('name', 'start_time', 'end_time'));
        $shift->users()->sync($request->users ?? []);
        return redirect()->route('shifts.index')->with('success', 'Shift created');
    }

    public function edit(Shift $shift)
    {
        $users = User::all();
        $selectedUsers = $shift->users->pluck('id')->toArray();
        return view('shifts.edit', compact('shift', 'users', 'selectedUsers'));
    }

    public function update(Request $request, Shift $shift)
    {
        $shift->update($request->only('name', 'start_time', 'end_time'));
        $shift->users()->sync($request->users ?? []);
        return redirect()->route('shifts.index')->with('success', 'Shift updated');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shifts.index')->with('success', 'Shift deleted');
    }
}
