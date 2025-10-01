<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalLanguage;
use App\Models\AdditionalSubject;
use App\Models\CoreSubject;
use App\Models\GroupYear;
use App\Models\Language;
use App\Models\AdditionalIslamicSubject;
use App\Models\Qualification;
use App\Models\Subject;
use Illuminate\Http\Request;

class QualificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view qualifications')->only('index');
        $this->middleware('permission:create qualifications')->only(['create', 'store']);
        $this->middleware('permission:edit qualifications')->only(['edit', 'update']);
        $this->middleware('permission:delete qualifications')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Qualification::with(['coreSubjects', 'additionalSubjects'])->get();
        $subjects = Subject::where('status', 1)->get();
        return view('admin.qualifications.index', compact('data', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::where('status', 1)->get();
        $group_years = GroupYear::all();
        $languages = Language::where('status',1)->get();
        return view('admin.qualifications.create', compact('subjects','group_years','languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'qualification_package_id' => 'required|in:1,2',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'total_subjects' => 'nullable|integer',
            'locked' => 'nullable|',
            'hifdh_programme' => 'nullable|',
            'hifdh_status' => 'nullable|',
            'status' => 'required|boolean',
            'group_year_id' => 'nullable',
            'core_subjects' => 'array',
            'core_subjects.*' => 'integer|exists:subjects,id',
            'additional_subjects' => 'array',
            'additional_subjects.*' => 'integer|exists:subjects,id',
            'additional_islamic_subjects' => 'array',
            'additional_islamic_subjects.*' => 'integer|exists:subjects,id',
        ]);

        // Save Qualification
        $qualification = Qualification::create([
            'qualification_package_id' => $request->qualification_package_id,
            'name' => $request->name,
            'group_year_id' => $request->group_year_id,
            'title' => $request->title,
            'description' => $request->description,
            'total_subjects' => $request->total_subjects,
            'locked' => $request->locked,
            'hifdh_programme' => $request->hifdh_programme,
            'hifdh_status' => $request->hifdh_status,
            'subject_selector' => $request->subject_selector,
            'status' => $request->status,
        ]);

        // Save Core Subjects
        if ($request->has('core_subjects')) {
            foreach ($request->core_subjects as $subjectId) {
                CoreSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }

        // Save Additional Subjects
        if ($request->has('additional_subjects')) {
            foreach ($request->additional_subjects as $subjectId) {
                AdditionalSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }


        // Save Additional Islamic
        if ($request->has('additional_islamic_subjects')) {
            foreach ($request->additional_islamic_subjects as $subjectId) {
                AdditionalIslamicSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }


        // Save Additional Languages
        if ($request->has('additional_languages')) {
            foreach ($request->additional_languages as $languageId) {
                AdditionalLanguage::create([
                    'qualification_id' => $qualification->id,
                    'language_id' => $languageId,
                ]);
            }
        }


        return redirect()->route('admin.qualifications.index')->with('success', 'Qualification created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Qualification::with(['coreSubjects', 'additionalSubjects','additionalIslamic','additionalLanguages'])->findOrFail($id);
        $subjects = Subject::where('status', 1)->get();
        $languages = Language::where('status', 1)->get();

        // Extract subject IDs
        $coreSubjectIds = $data->coreSubjects->pluck('subject_id')->toArray();
        $additionalSubjectIds = $data->additionalSubjects->pluck('subject_id')->toArray();
        $additionalIslamicIds = $data->additionalIslamic->pluck('subject_id')->toArray();
        $additionalLanguageIds = $data->additionalLanguages->pluck('language_id')->toArray();

        $group_years = GroupYear::all();


        return view('admin.qualifications.edit', compact('data', 'subjects', 'coreSubjectIds', 'additionalSubjectIds','additionalLanguageIds','additionalIslamicIds','group_years','languages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Qualification::with(['coreSubjects', 'additionalSubjects','additionalLanguages','additionalIslamic'])->findOrFail($id);
        $subjects = Subject::where('status', 1)->get();
        $languages = Language::where('status', 1)->get();
        // Extract subject IDs
        $coreSubjectIds = $data->coreSubjects->pluck('subject_id')->toArray();
        $additionalSubjectIds = $data->additionalSubjects->pluck('subject_id')->toArray();
        $additionalIslamicIds = $data->additionalIslamic->pluck('subject_id')->toArray();
        $additionalLanguageIds = $data->additionalLanguages->pluck('language_id')->toArray();

        $group_years = GroupYear::all();


        return view('admin.qualifications.edit', compact('data', 'subjects', 'coreSubjectIds', 'additionalSubjectIds','additionalLanguageIds','additionalIslamicIds','group_years','languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'qualification_package_id' => 'required|in:1,2',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'total_subjects' => 'nullable|integer',
            'locked' => 'nullable|',
            'hifdh_programme' => 'nullable|',
            'hifdh_status' => 'nullable|',
            'status' => 'required|boolean',
            'group_year_id' => 'nullable',
            'core_subjects' => 'nullable|array',
            'core_subjects.*' => 'integer|exists:subjects,id',
            'additional_subjects' => 'nullable|array',
            'additional_subjects.*' => 'integer|exists:subjects,id',

            'additional_islamic_subjects' => 'nullable|array',
            'additional_islamic_subjects.*' => 'integer|exists:subjects,id',

            'additional_languages' => 'nullable|array',
            'additional_languages.*' => 'integer|exists:languages,id',
            

        ]);

        $qualification = Qualification::findOrFail($id);

        // Update main qualification data
        $qualification->update([
            'qualification_package_id' => $request->qualification_package_id,
            'name' => $request->name,
            'title' => $request->title,
            'group_year_id' => $request->group_year_id,
            'description' => $request->description,
            'total_subjects' => $request->total_subjects,
            'locked' => $request->locked,
            'hifdh_programme' => $request->hifdh_programme,
            'hifdh_status' => $request->hifdh_status,
            'subject_selector' => $request->subject_selector,
            'status' => $request->status,
        ]);

        // Refresh core subjects
        CoreSubject::where('qualification_id', $qualification->id)->delete();
        if ($request->has('core_subjects')) {
            foreach ($request->core_subjects as $subjectId) {
                CoreSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }

        // Refresh additional subjects
        AdditionalSubject::where('qualification_id', $qualification->id)->delete();
        if ($request->has('additional_subjects')) {
            foreach ($request->additional_subjects as $subjectId) {
                AdditionalSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }


        // Refresh additional subjects
        AdditionalIslamicSubject::where('qualification_id', $qualification->id)->delete();
        if ($request->has('additional_islamic_subjects')) {
            foreach ($request->additional_islamic_subjects as $subjectId) {
                AdditionalIslamicSubject::create([
                    'qualification_id' => $qualification->id,
                    'subject_id' => $subjectId,
                ]);
            }
        }


        // Refresh additional subjects
        AdditionalLanguage::where('qualification_id', $qualification->id)->delete();
        if ($request->has('additional_languages')) {
            foreach ($request->additional_languages as $languageId) {
                AdditionalLanguage::create([
                    'qualification_id' => $qualification->id,
                    'language_id' => $languageId,
                ]);
            }
        }

        return redirect()->route('admin.qualifications.index')->with('success', 'Qualification updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $qualification = Qualification::findOrFail($id);

        // Related records will be deleted automatically if cascade is set in the database
        // OR you can delete them manually like this:
        $qualification->coreSubjects()->delete();
        $qualification->additionalSubjects()->delete();
        $qualification->additionalIslamic()->delete();
        $qualification->additionalLanguages()->delete();

        // Now delete the qualification
        $qualification->delete();

        return redirect()->back()->with('success', 'Qualification and related subjects deleted successfully.');
    }

    // QualificationController.php
    public function getQualificationsByGroupYear($id)
    {
        $groupYear = GroupYear::find($id);

        if (!$groupYear) {
            return response()->json([]);
        }

        // Direct match: GroupYear.group_id == Qualification.qualification_package
        $qualifications = Qualification::where('group_year_id', $groupYear->group_id)
            ->select('id', 'name')
            ->get();

        return response()->json($qualifications);
    }
}
