<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::with(['route', 'driver', 'bus'])
                    ->orderBy('date', 'desc')
                    ->paginate(15);

        return view('admin.shifts.index', compact('shifts'));
    }

    public function create(Request $request)
    {
        $routes = Route::where('status', 'active') -> orderBy('name') -> get();
        $drivers = User::where('role', 'driver') -> orderBy('name') -> get();
        $buses = Bus::where('status', 'active') -> orderBy('plate_number') -> get();

        return view('admin.shifts.create', compact('routes', 'drivers', 'buses'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'date'      => 'required|date|after_or_equal:today',
            'route_id'  => 'required|exists:routes,id',
            'driver_id' => [
                'required',
                'exists:users,id',
                Rule::unique('shifts')->where(fn ($query) =>
                    $query->where('date', $request->date)
                ),
            ],
            'bus_id'    => [
                'required',
                'exists:buses,id',
                Rule::unique('shifts')->where(fn ($query) =>
                    $query->where('date', $request->date)
                ),
            ],
            'status'    => 'required|in:scheduled,in_progress,completed,cancelled',
        ], [
        'driver_id.unique' => 'This driver is already assigned to a shift on this date.',
        'bus_id.unique'    => 'This bus is already assigned to a shift on this date.',
        ]);

        Shift::create($fields);

        return redirect()->route('admin.shifts.index')
                     ->with('success', 'Shift created successfully.');
    }

    public function edit(Shift $shift)
    {
        $routes  = Route::where('status', 'active')->orderBy('name')->get();
        $drivers = User::where('role', 'driver')->orderBy('name')->get();
        $buses   = Bus::where('status', 'active')->orderBy('plate_number')->get();

        return view('admin.shifts.edit', compact('shift', 'routes', 'drivers', 'buses'));
    }

    public function update(Request $request, Shift $shift)
    {
        $fields = $request->validate([
            'date'      => 'required|date',
            'route_id'  => 'required|exists:routes,id',
            'driver_id' => [
                'required',
                'exists:users,id',
                Rule::unique('shifts')
                    ->where(fn ($query) => $query->where('date', $request->date))
                    ->ignore($shift->id),
            ],
            'bus_id'    => [
                'required',
                'exists:buses,id',
                Rule::unique('shifts')
                    ->where(fn ($query) => $query->where('date', $request->date))
                    ->ignore($shift->id),
            ],
            'status'    => 'required|in:scheduled,in_progress,completed,cancelled',
        ], [
            'driver_id.unique' => 'This driver is already assigned to a shift on this date.',
            'bus_id.unique'    => 'This bus is already assigned to a shift on this date.',
        ]);

        $shift->update($fields);

        return redirect()->route('admin.shifts.index')
                        ->with('success', 'Shift updated successfully.');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();

        return redirect()->route('admin.shifts.index')
                        ->with('success', 'Shift deleted successfully.');
    }
}
