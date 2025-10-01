<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentGroup;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentYear::latest()->get();
        return view('admin.student.year.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group=StudentGroup::where('status',1)->get();
        return view('admin.student.year.create', compact('group'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        StudentYear::create($data);
        return redirect()->route('admin.student-years.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StudentYear::findOrFail($id);
        $group=StudentGroup::where('status',1)->get();
        return view('admin.student.year.edit', compact('data','group'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StudentYear::findOrFail($id);
        $group=StudentGroup::where('status',1)->get();
        return view('admin.student.year.edit', compact('data','group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StudentYear::findOrFail($id);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.student-years.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StudentYear::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $item = StudentYear::findOrFail($request->id);
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
