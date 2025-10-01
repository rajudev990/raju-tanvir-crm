<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view package')->only('index');
        $this->middleware('permission:create package')->only(['create', 'store']);
        $this->middleware('permission:edit package')->only(['edit', 'update']);
        $this->middleware('permission:delete package')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Package::all();
        return view('admin.package.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Group::where('status',1)->get();
        return view('admin.package.create',compact('groups'));
    }

    public function store(Request $request)
    {

        $data = $request->all();
        Package::create($data);
        return redirect()->route('admin.package.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Package::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.package.edit', compact('data','groups'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Package::findOrFail($id);
        $groups = Group::where('status',1)->get();
        return view('admin.package.edit', compact('data','groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Package::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.package.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Package::findOrFail($request->id);
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

    public function getPackagesByGroup($group_id)
    {
        $packages = Package::where('group_id', $group_id)->select('id', 'title')->get();
        return response()->json($packages);
    }
}
