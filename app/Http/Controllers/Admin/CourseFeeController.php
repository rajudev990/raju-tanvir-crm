<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CourseFee;
use App\Models\GroupYear;
use App\Models\Qualification;
use Illuminate\Http\Request;

class CourseFeeController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view coursefee')->only('index');
        $this->middleware('permission:create coursefee')->only(['create', 'store']);
        $this->middleware('permission:edit coursefee')->only(['edit', 'update']);
        $this->middleware('permission:delete coursefee')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CourseFee::all();
        return view('admin.course-fee.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group_years = GroupYear::all();
        $qualifications = Qualification::all();
        return view('admin.course-fee.create',compact('group_years','qualifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        CourseFee::create($data);
        return redirect()->route('admin.course-fees.index')->with('success', 'Data has been save successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = CourseFee::findOrFail($id);
        $group_years = GroupYear::all();
        return view('admin.course-fee.edit',compact('data','group_years'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = CourseFee::findOrFail($id);
        $update = $request->all();
        $data->update($update);
        return redirect()->route('admin.course-fees.index')->with('success', 'Data has been update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = CourseFee::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been delete successfully.');
    }
}
