<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stop;
use Illuminate\Http\Request;

class StopController extends Controller
{
    // to show list
    public function index()
    {
        // it gives the latest added stops and devide them into 15 per page
        $stops = Stop::latest()->paginate(15);
        return view('admin.stops.index', compact('stops'));
    }

    // stop form fiew
    public function create()
    {
        return view('admin.stops.create');
    }

    // create stop
    public function store(Request $request)
    {
        $fileds = $request -> validate([
            'name' => 'string | required | max:255| unique:stops,name',
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180'
        ]);

        Stop::create($fileds);

        return redirect() -> route('admin.stops.index')
                            -> with('success', 'Stop Added Successfully');
    }

    // edit stops view
    public function edit(Stop $stop)
    {
        return view('admin.stops.edit', compact('stop'));
    }

    // update stops
    public function update(Request $request, Stop $stop)
    {
        $fields = $request -> validate([
            // does any row have this name EXCEPT the row with this id
            'name' => 'required|string|max:255|unique:stops,name,' . $stop -> id,
            'lat' => 'nullable|numeric|between:-90,90',
            'lng' => 'nullable|numeric|between:-180,180'
        ]);

        $stop -> update($fields);
        return redirect() -> route('admin.stops.index')
                            -> with('success', 'Stop Updated Successfully');
    }

    public function destroy(Stop $stop)
    {
        return redirect() -> route('admin.stops.index')
        -> with('success', 'Stop Is Deleted Successfully');
    }
}
