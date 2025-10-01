<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\MeetSpeaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MeetSpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MeetSpeaker::all();
        return view('admin.open-event.meet-speaker.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.open-event.meet-speaker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        if ($image)
        {
            $data['image'] = $image;
        }

        MeetSpeaker::create($data);
        return redirect()->route('admin.meet-speakers.index')->with('success', 'Data has been save successfully.');
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
        $data = MeetSpeaker::findOrFail($id);
        return view('admin.open-event.meet-speaker.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = MeetSpeaker::findOrFail($id);
        $image = $request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if ($request->hasFile('image') && $data->image) {
            Storage::disk('public')->delete($data->image);
        }

        $input = $request->all();

        if($image)
        {
            $input['image'] = $image;
        }
        $data->update($input);
        return redirect()->route('admin.meet-speakers.index')->with('success', 'Data has been Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = MeetSpeaker::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.meet-speakers.index')->with('success', 'Data has been Update successfully.');
    }
}
