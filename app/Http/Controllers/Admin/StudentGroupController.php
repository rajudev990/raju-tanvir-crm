<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentGroup::latest()->get();
        return view('admin.student.groups.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.groups.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        StudentGroup::create($data);
        return redirect()->route('admin.student-groups.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StudentGroup::findOrFail($id);
        return view('admin.student.groups.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StudentGroup::findOrFail($id);
        return view('admin.student.groups.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StudentGroup::findOrFail($id);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.student-groups.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StudentGroup::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $item = StudentGroup::findOrFail($request->id);
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
