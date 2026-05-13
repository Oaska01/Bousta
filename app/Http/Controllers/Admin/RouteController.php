<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Stop;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::with(['startStop', 'endStop'])
        ->latest()
        ->paginate(15);
        return view('admin.routes.index', compact('routes'));
    }

    public function create()
    {
        $stops = Stop::orderBy('name') -> get();
        $routes = Route::orderBy('name') -> get();

        return view('admin.routes.create', compact('stops', 'routes'));
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string|max:255|regex:/^[A-Za-z\s→]+$/|unique:routes,name',
            'description' => 'nullable|string|max:500',
            'start_stop_id' => 'required|exists:stops,id',
            'end_stop_id' => 'required|exists:stops,id|different:start_stop_id',
            'return_route_id' => 'nullable|exists:routes,id',
            'status' => 'required|in:active,suspended',
        ]
        ,
        ['name.regex' => 'Route name can only contain letters, spaces, and arrows.']);

        Route::create($fields);

        return redirect() -> route('admin.routes.index')
                            -> with('success', 'Route Added Successfully.');
    }

    public function edit(Route $route)
    {
        $stops = Stop::orderBy('name') -> get();
        $routes = Route::where('id', '!=', $route->id)
                    -> orderBy('name')
                    -> get();

                    return view('admin.routes.edit', compact('route', 'stops', 'routes'));
    }

    public function update(Request $request, Route $route)
    {
        $fields = $request->validate([
        'name' => 'required|string|max:255|regex:/^[A-Za-z\s→]+$/|unique:routes,name,' . $route->id,
        'description' => 'nullable|string|max:500',
        'start_stop_id' => 'required|exists:stops,id',
        'end_stop_id' => 'required|exists:stops,id|different:start_stop_id',
        'return_route_id' => 'nullable|exists:routes,id|different:id',
        'status' => 'required|in:active,suspended',
        ], [
        'name.regex' => 'Route name can only contain letters, spaces, and arrows.',
        ]);

        $route->update($fields);

        return redirect()->route('admin.routes.index')
                     ->with('success', 'Route updated successfully.');
    }

    public function destroy(Route $route)
    {
        $route->delete();

        return redirect()->route('admin.routes.index')
                        ->with('success', 'Route deleted successfully.');
    }
}
