<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all services from the database
        $services = Service::all();

        // Return the view with the services data
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'unique:services,name'],
            'icon' => ['nullable', 'string'],
            'link' => ['nullable', 'string'],
            'status' => ['required', 'string'],
        ]);

        try {
            Service::create([
                'name' => $request->name,
                'link' => $request->link,
                'icon' => $request->icon,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.services.index')->with('success', 'Service created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Service creation failed');
        }
    }


    public function update_status(Request $request)
    {
        $sevice = Service::find($request->id);
        if ($sevice) {
            $sevice->status = $request->status;
            $sevice->save();
            return response()->json(['message' => 'Service updated successfully']);
        }
        return response()->json(['message' => 'Service not found'], 404);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return redirect()->route('services.index')->with('success', 'Service deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Service not found');
        }
    }
}
