<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OpenEvent;
use Illuminate\Http\Request;

class OpenEventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = OpenEvent::all();
        return view('admin.open-event.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.open-event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        OpenEvent::create($data);
        return redirect()->route('admin.open-events.index')->with('success', 'Data has been save successfully.');
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
        $data = OpenEvent::findOrFail($id);
        return view('admin.open-event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = OpenEvent::findOrFail($id);
        $input = $request->all();
        $data->update($input);
        return redirect()->route('admin.open-events.index')->with('success', 'Data has been Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OpenEvent::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.open-events.index')->with('success', 'Data has been Update successfully.');
    }
}
