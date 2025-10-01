<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CuponController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view coupon')->only('index');
        $this->middleware('permission:create coupon')->only(['create', 'store']);
        $this->middleware('permission:edit coupon')->only(['edit', 'update']);
        $this->middleware('permission:delete coupon')->only('destroy');
    }
   

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupon::all();
        return view('admin.coupons.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:coupons,name',
            // add other field validations if necessary
        ]);

        $data = $request->all();
        Coupon::create($data);
        return redirect()->route('admin.coupons.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Coupon::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|unique:coupons,name,' . $data->id,
            // Add other fields if needed
        ]);

        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.coupons.index')->with('success', 'Data has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Coupon::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
    public function updateStatus(Request $request)
    {
        $item = Coupon::findOrFail($request->id);
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
