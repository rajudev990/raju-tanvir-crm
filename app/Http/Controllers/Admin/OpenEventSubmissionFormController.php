<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpenEventForm;
use Illuminate\Http\Request;

class OpenEventSubmissionFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Base Query
        $query = OpenEventForm::query();

        // 🔹 Search (Laravel side)
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('entry_id', 'LIKE', "%{$search}%")
                    ->orWhere('fname', 'LIKE', "%{$search}%")
                    ->orWhere('lname', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('mobile_number', 'LIKE', "%{$search}%")
                    ->orWhere('country', 'LIKE', "%{$search}%")
                    ->orWhere('sfname', 'LIKE', "%{$search}%")
                    ->orWhere('slname', 'LIKE', "%{$search}%")
                    ->orWhere('dob', 'LIKE', "%{$search}%")
                    ->orWhere('start_date', 'LIKE', "%{$search}%")
                    ->orWhere('submission_date', 'LIKE', "%{$search}%");
            });
        }

        // 🔹 Sort by newest first (entry_id DESC)
        $query->orderByDesc('entry_id');

        // 🔹 Paginate
        $paginatedData = $query->paginate($perPage)->appends($request->query());

        return view('admin.open-event.submission.index', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $paginatedData->getCollection(), // only current page data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    public function show(string $id)
    {
        $data = OpenEventForm::findOrFail($id);
        return view('admin.open-event.submission.show', compact('data'));
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
        $data = OpenEventForm::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been delete successfully.');
    }
}
