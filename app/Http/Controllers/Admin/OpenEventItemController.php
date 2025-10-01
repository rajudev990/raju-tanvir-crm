<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\OpenEvent;
use App\Models\OpenEventItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OpenEventItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
    {
        $data = OpenEventItem::all();
        return view('admin.open-event.item.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $event = OpenEvent::where('status',1)->get();
        return view('admin.open-event.item.create',compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $image=$request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;
        $data['image'] = $image;
        OpenEventItem::create($data);
        return redirect()->route('admin.open-event-items.index')->with('success', 'Data has been save successfully.');
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
        $data = OpenEventItem::findOrFail($id);
        $event = OpenEvent::where('status',1)->get();
        return view('admin.open-event.item.edit', compact('data','event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = OpenEventItem::findOrFail($id);

        $image=$request->hasFile('image') ? ImageHelper::uploadImage($request->file('image')) : null;

        if($request->hasFile('image') && $data->image){
            Storage::disk('public')->delete($data->image);
        }

        $input = $request->all();

        if($image)
        {
            $input['image'] = $image;
        }
           
        $data->update($input);
        return redirect()->route('admin.open-event-items.index')->with('success', 'Data has been Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = OpenEventItem::findOrFail($id);
        if($data->image){
        Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.open-event-items.index')->with('success', 'Data has been Update successfully.');
    }
}
