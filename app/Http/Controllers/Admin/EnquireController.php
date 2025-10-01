<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquire;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class EnquireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 
    public function index(Request $request)
    {
        $page    = $request->query('page', 1);
        $perPage = 20;
        $search  = $request->query('search', '');

        // 🔹 Base Query
        $query = Enquire::query();

        // 🔹 Search (Laravel side)
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('entry_id', 'LIKE', "%{$search}%")
                    ->orWhere('fname', 'LIKE', "%{$search}%")
                    ->orWhere('lname', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('mobile_number', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%")
                    ->orWhere('student_fname', 'LIKE', "%{$search}%")
                    ->orWhere('student_lname', 'LIKE', "%{$search}%")
                    ->orWhere('student_dob', 'LIKE', "%{$search}%")
                    ->orWhere('student_start_date', 'LIKE', "%{$search}%")
                    ->orWhere('student_country', 'LIKE', "%{$search}%")
                    ->orWhere('details1', 'LIKE', "%{$search}%")
                    ->orWhere('details2', 'LIKE', "%{$search}%")
                    ->orWhere('details3', 'LIKE', "%{$search}%")
                    ->orWhere('details4', 'LIKE', "%{$search}%")
                    ->orWhere('submission_date', 'LIKE', "%{$search}%");
            });
        }

        // 🔹 Sort by newest first (entry_id DESC)
        $query->orderByDesc('entry_id');

        // 🔹 Paginate
        $paginatedData = $query->paginate($perPage)->appends($request->query());
        
        return view('admin.enquire.index', [
            'paginatedData' => $paginatedData,
            'search'        => $search,
            'allData'       => $paginatedData->getCollection(), // only current page data
        ]);
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
        $data = Enquire::findOrFail($id);
        return view('admin.enquire.show',compact('data'));
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
        $data = Enquire::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been delete successfully.');
    }
}
