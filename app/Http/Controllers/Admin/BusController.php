<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::latest() -> paginate(15);
        return view('admin.buses.index', compact('buses'));
    }

    public function create(Request $request)
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $fields = $request -> validate([
            'plate_number' => 'required|string|max:20|unique:buses,plate_number',
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1|max:100',
            'status' => 'required|in:active,maintenance,retired'
        ]);

        Bus::create($fields);

        return redirect() -> route('admin.buses.index')
                            -> with('success', 'Bus Added Successfully!');
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $fields = $request -> validate([
            'plate_number' => 'required|string|max:20|unique:buses,plate_number,' . $bus ->id,
            'model' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1|max:100',
            'status' => 'required|in:active,maintenance,retired'
        ]);

        $bus -> update($fields);

        return redirect() -> route('admin.buses.index')
                            -> with('success', 'Bus Updated Successfully');
    }

    public function destroy(Bus $bus)
    {
        $bus -> delete();

         return redirect() -> route('admin.buses.index')
                            -> with('success', 'Bus Deleted Successfully');
    }
}
