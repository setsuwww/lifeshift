<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendancesController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('user')->paginate(10);
        return view('admin.attendances.index', compact('attendances'));
    }

    public function create()
    {
        return view('admin.attendances.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'status'  => 'required|string',
            'date'    => 'required|date',
        ]);

        Attendance::create($data);

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded!');
    }

    public function show(Attendance $attendance)
    {
        return view('admin.attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        return view('admin.attendances.edit', compact('attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $data = $request->validate([
            'status' => 'required|string',
            'date'   => 'required|date',
        ]);

        $attendance->update($data);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated!');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted!');
    }
}
