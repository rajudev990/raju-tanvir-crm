<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FormStudent;
use App\Models\FormSubmission;
use Illuminate\Http\Request;

class StudentFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FormSubmission::latest()->get();
        return view('admin.form-students.index',compact('data'));
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
        $data = FormSubmission::with('students')->findOrFail($id);
        // সব student_id collect করলাম
        $studentIds = collect($data->packages)->pluck('student_id')->toArray();
        // Student id -> name mapping
        $students = FormStudent::whereIn('id', $studentIds)->pluck('fname','id');
        return view('admin.form-students.edit',compact('data','students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = FormSubmission::with('students')->findOrFail($id);
        // সব student_id collect করলাম
        $studentIds = collect($data->packages)->pluck('student_id')->toArray();
        // Student id -> name mapping
        $students = FormStudent::whereIn('id', $studentIds)->pluck('fname','id');
        return view('admin.form-students.edit',compact('data','students'));
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
        $data = FormSubmission::findOrFail($id);
        $data->delete();
        return back()->with('success', 'Status has been successfully updated.');
    }
}
