<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view subjects')->only('index');
        $this->middleware('permission:create subjects')->only(['create', 'store']);
        $this->middleware('permission:edit subjects')->only(['edit', 'update']);
        $this->middleware('permission:delete subjects')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Subject::all();
        return view('admin.subjects.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subjects.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:subjects,name',
            // add other fields if needed
        ]);

        $data = $request->all();
        Subject::create($data);
        return redirect()->route('admin.subjects.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Subject::findOrFail($id);
        return view('admin.subjects.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Subject::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:subjects,name,' . $data->id,
            // add other field validations if needed
        ]);
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.subjects.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Subject::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Subject::findOrFail($request->id);
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
