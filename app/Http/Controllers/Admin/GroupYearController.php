<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\GroupYear;
use Illuminate\Http\Request;

class GroupYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GroupYear::all();
        return view('admin.group-years.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Group::where('status',1)->get();
        return view('admin.group-years.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:group_years,name',
        ]);

        $data = $request->all();
        GroupYear ::create($data);
        return redirect()->route('admin.group-years.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = GroupYear::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.group-years.edit',compact('data','groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = GroupYear::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.group-years.edit',compact('data','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = GroupYear::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:group_years,name,' . $data->id,
        ]);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.group-years.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = GroupYear::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
}
