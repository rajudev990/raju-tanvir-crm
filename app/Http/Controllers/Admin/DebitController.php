<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Debit;
use Illuminate\Http\Request;

class DebitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Debit::latest()->get();
        return view('admin.debit.index', compact('data'));
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
        $data = Debit::findOrFail($id);
        return view('admin.debit.show', compact('data'));
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
        $data = Debit::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
}
