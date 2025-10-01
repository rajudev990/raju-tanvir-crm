<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentPackage;
use Illuminate\Http\Request;

class StudentPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentPackage::latest()->get();
        return view('admin.student.package.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.package.create');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        StudentPackage::create($data);
        return redirect()->route('admin.student-package.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StudentPackage::findOrFail($id);
        return view('admin.student.package.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StudentPackage::findOrFail($id);
        return view('admin.student.package.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = StudentPackage::findOrFail($id);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.student-package.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StudentPackage::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $item = StudentPackage::findOrFail($request->id);
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
