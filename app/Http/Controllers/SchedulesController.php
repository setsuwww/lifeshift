<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with('users')->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $users = User::all();
        return view('schedules.create', compact('users'));
    }

    public function store(Request $request)
    {
        $schedule = Schedule::create($request->only('title', 'date'));
        $schedule->users()->sync($request->users); // assign users
        return redirect()->route('schedules.index')->with('success', 'Schedule created');
    }

    public function edit(Schedule $schedule)
    {
        $users = User::all();
        $selectedUsers = $schedule->users->pluck('id')->toArray();
        return view('schedules.edit', compact('schedule', 'users', 'selectedUsers'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $schedule->update($request->only('title', 'date'));
        $schedule->users()->sync($request->users);
        return redirect()->route('schedules.index')->with('success', 'Schedule updated');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted');
    }
}
