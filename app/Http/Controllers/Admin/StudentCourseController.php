<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentCourse;
use App\Models\StudentGroup;
use App\Models\StudentLanguage;
use App\Models\StudentPackage;
use App\Models\StudentSubject;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = StudentCourse::latest()->get();
        return view('admin.student.course.index', compact('data'));
    }

    public function getYears($group_id)
    {
        $years = StudentYear::where('group_id', $group_id)->get();
        return response()->json($years);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group = StudentGroup::where('status', 1)->get();
        $year = StudentYear::where('status', 1)->get();
        $package = StudentPackage::where('status', 1)->get();
        $subject = StudentSubject::where('status', 1)->get();
        $language = StudentLanguage::where('status', 1)->get();
        return view('admin.student.course.create', compact('group', 'year', 'package', 'subject', 'language'));
    }

    public function store(Request $request)
    {
        // Validation (optional but recommended)
        $request->validate([
            'language'  => 'nullable|array',
            'core_subject' => 'nullable|array',
            'islamic_subject' => 'nullable|array',
            'additional_subject' => 'nullable|array',
            'status'    => 'required|in:0,1',
            // Add other fields validation if needed
        ]);

        // Prepare data
        $data = $request->all();

        // Ensure JSON fields are arrays, even if nothing selected
        $data['language'] = $request->language ?? [];
        $data['core_subject'] = $request->core_subject ?? [];
        $data['islamic_subject'] = $request->islamic_subject ?? [];
        $data['additional_subject'] = $request->additional_subject ?? [];

        // Save
        StudentCourse::create($data);

        return redirect()->route('admin.student-course.index')
            ->with('success', 'Data has been saved successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = StudentCourse::findOrFail($id);
        return view('admin.student.course.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StudentCourse::findOrFail($id);

        $group = StudentGroup::where('status', 1)->get();
        $year = StudentYear::where('status', 1)->get();
        $package = StudentPackage::where('status', 1)->get();
        $subject = StudentSubject::where('status', 1)->get();
        $language = StudentLanguage::where('status', 1)->get();

        // If stored as JSON/array in DB, convert to array for checkbox checking
        $selectedLanguages = is_array($data->language) ? $data->language : json_decode($data->language, true) ?? [];
        $selectedCoreSubjects = is_array($data->core_subject) ? $data->core_subject : json_decode($data->core_subject, true) ?? [];
        $selectedIslamicSubjects = is_array($data->islamic_subject) ? $data->islamic_subject : json_decode($data->islamic_subject, true) ?? [];
        $selectedAdditionalSubjects = is_array($data->additional_subject) ? $data->additional_subject : json_decode($data->additional_subject, true) ?? [];

        return view('admin.student.course.edit', compact(
            'data',
            'group',
            'year',
            'package',
            'subject',
            'language',
            'selectedLanguages',
            'selectedCoreSubjects',
            'selectedIslamicSubjects',
            'selectedAdditionalSubjects'
        ));
    }


    /**
     * Update the specified resource in storage.
     */
    // Update Function
    public function update(Request $request, string $id)
    {
        $data = StudentCourse::findOrFail($id);

        $data->group_id = $request->group_id;
        $data->year_id = $request->year_id;
        $data->package_id = $request->package_id;

       // Store checkboxes as JSON arrays
        $data->language = $request->language ? json_encode($request->language) : null;
        $data->core_subject = $request->core_subject ? json_encode($request->core_subject) : null;
        $data->islamic_subject = $request->islamic_subject ? json_encode($request->islamic_subject) : null;
        $data->additional_subject = $request->additional_subject ? json_encode($request->additional_subject) : null;



        $data->hifdh = $request->hifdh;
        $data->hifdh_text = $request->hifdh_text;

        $data->plan_text_one = $request->plan_text_one;
        $data->plan_text_two = $request->plan_text_two;
        $data->plan_text_three = $request->plan_text_three;
        $data->plan_text_four = $request->plan_text_four;
        $data->plan_text_five = $request->plan_text_five;
        $data->plan_text_six = $request->plan_text_six;

        $data->m_regular_price = $request->m_regular_price;
        $data->m_discount_price = $request->m_discount_price;
        $data->m_discount = $request->m_discount;
        $data->m_list_one = $request->m_list_one;
        $data->m_list_two = $request->m_list_two;
        $data->m_list_three = $request->m_list_three;
        $data->m_list_four = $request->m_list_four;
        $data->m_list_five = $request->m_list_five;
        $data->m_list_six = $request->m_list_six;

        $data->a_regular_price = $request->a_regular_price;
        $data->a_discount_price = $request->a_discount_price;
        $data->a_discount = $request->a_discount;
        $data->a_list_one = $request->a_list_one;
        $data->a_list_two = $request->a_list_two;
        $data->a_list_three = $request->a_list_three;
        $data->a_list_four = $request->a_list_four;
        $data->a_list_five = $request->a_list_five;
        $data->a_list_six = $request->a_list_six;

        $data->t_regular_price = $request->t_regular_price;
        $data->t_discount_price = $request->t_discount_price;
        $data->t_discount = $request->t_discount;
        $data->t_list_one = $request->t_list_one;
        $data->t_list_two = $request->t_list_two;
        $data->t_list_three = $request->t_list_three;
        $data->t_list_four = $request->t_list_four;
        $data->t_list_five = $request->t_list_five;
        $data->t_list_six = $request->t_list_six;

        $data->status = $request->status;

        $data->save();

        return redirect()->route('admin.student-course.index')->with('success', 'Student Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StudentCourse::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }

    public function updateStatus(Request $request)
    {
        $item = StudentCourse::findOrFail($request->id);
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
