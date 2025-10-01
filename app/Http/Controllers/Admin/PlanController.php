<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view plan')->only('index');
        $this->middleware('permission:create plan')->only(['create', 'store']);
        $this->middleware('permission:edit plan')->only(['edit', 'update']);
        $this->middleware('permission:delete plan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Plan::all();
        return view('admin.plans.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::where('status',1)->get();
        return view('admin.plans.create',compact('groups'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        Plan::create($data);
        return redirect()->route('admin.plans.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Plan::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.plans.edit', compact('data','groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Plan::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.plans.edit', compact('data','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Plan::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.plans.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Plan::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Plan::findOrFail($request->id);
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
