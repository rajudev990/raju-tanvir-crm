<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = School::latest()->get();
        return view('admin.student.school.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.student.school.create');
    }

    public function store(Request $request)
    {

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';


        $data = $request->all();
        $data['image'] = $image;
        School::create($data);
        return redirect()->route('admin.student-school.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = School::findOrFail($id);
        return view('admin.student.school.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = School::findOrFail($id);
        return view('admin.student.school.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = School::findOrFail($id);

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : '';

        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $input = $request->all();
        $input['image'] = $image;
        $data->update($input);
        return redirect()->route('admin.student-school.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = School::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $item = School::findOrFail($request->id);
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
