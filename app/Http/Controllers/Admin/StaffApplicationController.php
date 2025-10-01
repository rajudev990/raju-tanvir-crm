<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StaffAdmissionForm;

class StaffApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StaffAdmissionForm::latest()->get();
        return view('admin.staff-application.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StaffAdmissionForm::findOrFail($id);
        return view('admin.staff-application.view',compact('data'));
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
        $data = StaffAdmissionForm::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $staff = StaffAdmissionForm::findOrFail($request->id);
        $staff->status = $request->status;
        $staff->save();
        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    }

}
