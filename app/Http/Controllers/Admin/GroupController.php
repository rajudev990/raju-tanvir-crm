<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
        $data = Group::orderBy('serial')->get();
        return view('admin.groups.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|unique:groups,title',
            // add other field validations if necessary
        ]);

        $data = $request->all();
        Group::create($data);
        return redirect()->route('admin.groups.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Group::findOrFail($id);
        return view('admin.groups.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Group::findOrFail($id);
        return view('admin.groups.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Group::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|unique:groups,title,' . $data->id,
            // Add other fields if needed
        ]);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.groups.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Group::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Group::findOrFail($request->id);
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
