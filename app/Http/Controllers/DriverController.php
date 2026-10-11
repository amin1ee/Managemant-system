<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::query()->orderBy('name')->paginate(10);

        return view('drivers.index', compact('drivers'));
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telefon' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:drivers,email'],
        ]);

        Driver::create($validated);

        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver created successfully.');
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'telefon' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('drivers', 'email')->ignore($driver->id),
            ],
        ]);

        $driver->update($validated);

        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver updated successfully.');
    }

    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()
            ->route('drivers.index')
            ->with('success', 'Driver deleted successfully.');
    }
}
