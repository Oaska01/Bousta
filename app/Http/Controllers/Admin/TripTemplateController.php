<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\TripTemplate;
use Illuminate\Http\Request;

class TripTemplateController extends Controller
{
    public function index()
    {
        $templates = TripTemplate:: with('route')
        -> orderBy('departure_time')
        -> paginate(15);
        return view('admin.trip-templates.index', compact('templates'));
    }

    public function create()
    {
        $routes = Route::orderBy('name') -> get();
        return view('admin.trip-templates.create', compact('routes'));
    }

    public function store(Request $request)
    {
        $fields = $request -> validate([
        'route_id'    => 'required|exists:routes,id',
        'departure_time' => 'required|date_format:H:i',
        'day_of_week' => 'required|in:everyday,monday,tuesday,wednesday,thursday,friday,saturday,sunday',
    ]);

    TripTemplate::create($fields);

    return redirect()->route('admin.trip-templates.index')
                     ->with('success', 'Trip template created successfully.');
    }

    public function edit(TripTemplate $tripTemplate)
    {
        $routes = Route::orderBy('name') -> get();
         return view('admin.trip-templates.edit', [
            'template' => $tripTemplate,
            'routes'   => $routes,
        ]);
    }

    public function update(Request $request, TripTemplate $tripTemplate)
    {
        $fields = $request->validate([
            'route_id'    => 'required|exists:routes,id',
            'departure_time' => 'required|date_format:H:i',
            'day_of_week' => 'required|in:everyday,monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        ]);

        $tripTemplate->update($fields);

        return redirect()->route('admin.trip-templates.index')
                        ->with('success', 'Trip template updated successfully.');
    }

    public function destroy(TripTemplate $tripTemplate)
    {
        $tripTemplate->delete();

        return redirect()->route('admin.trip-templates.index')
                        ->with('success', 'Trip template deleted successfully.');
    }
}
