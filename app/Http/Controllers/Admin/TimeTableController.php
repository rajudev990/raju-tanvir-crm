<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view group')->only('index');
        $this->middleware('permission:create group')->only(['create', 'store']);
        $this->middleware('permission:edit group')->only(['edit', 'update']);
        $this->middleware('permission:delete group')->only('destroy');
    }
   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TimeTable::all();
        return view('admin.time-table.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.time-table.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:time_tables,name',
            // add other field validations if necessary
        ]);

        $data = $request->all();
        TimeTable::create($data);
        return redirect()->route('admin.time-tables.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TimeTable::findOrFail($id);
        return view('admin.time-table.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TimeTable::findOrFail($id);
        return view('admin.time-table.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TimeTable::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:time_tables,name,' . $data->id,
            // Add other fields if needed
        ]);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.time-tables.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TimeTable::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = TimeTable::findOrFail($request->id);
        $item->status = $request->status;
        $item->save();

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'status' => $item->status,
                'message' => $item->status == 1
                    ? 'Status has been successfully activated.'
                    : 'Status has been successfully deactivated.'
            ]);
        }

        // In case it's not an AJAX request, redirect with a success message
        return back()->with('success', 'Status has been successfully updated.');
    }
}