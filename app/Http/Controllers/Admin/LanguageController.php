<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view languages')->only('index');
        $this->middleware('permission:create languages')->only(['create', 'store']);
        $this->middleware('permission:edit languages')->only(['edit', 'update']);
        $this->middleware('permission:delete languages')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Language::all();
        return view('admin.languages.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:languages,name',
            // add other fields if needed
        ]);

        $data = $request->all();
        Language::create($data);
        return redirect()->route('admin.languages.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Language::findOrFail($id);
        return view('admin.languages.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Language::findOrFail($id);
        return view('admin.languages.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Language::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:languages,name,' . $data->id,
            // add other field validations if needed
        ]);
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.languages.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Language::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Language::findOrFail($request->id);
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
