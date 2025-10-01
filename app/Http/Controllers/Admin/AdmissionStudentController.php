<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guardiant;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AdmissionStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Guardiant::with('students')->latest()->get();
        return view('admin.admission-student-list.index',compact('data'));
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
        $data = Guardiant::with(['students', 'courseFee', 'orders'])->findOrFail($id);
        return view('admin.admission-student-list.view',compact('data'));
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
        $data = Guardiant::findOrFail($id);

        // Related Students Delete
        foreach ($data->students as $student) {
            // Detach all pivot relations
            $student->coreSubjects()->detach();
            $student->additionalSubjects()->detach();
            $student->additionalIslamic()->detach();
            $student->additionalLanguages()->detach();
            $student->additionalHifdh()->detach();

            // Then delete student
            $student->delete();
        }

        // Related data delete
        // $data->students()->delete();
        $data->orders()->delete();

        // Finally delete the data
        $data->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully.');

    }
}
