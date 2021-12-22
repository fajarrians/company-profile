<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoregalleryRequest;
use App\Http\Requests\UpdategalleryRequest;
use App\Models\gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = gallery::all();
        return view('gallery.index',[
            'gallery' => $gallery
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregalleryRequest $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'title' => 'required',
        ]);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        gallery::create($validatedData);


        return redirect()->route('gallery.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery)
    {
        return view('gallery.edit',[
            'gallery' => $gallery
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategalleryRequest  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategalleryRequest $request, gallery $gallery)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'title' => 'required',
        ]);
        
        if ($request->file('image')) {
            if($request->oldImg){
                Storage::delete($request->oldImg);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $gallery->update($validatedData);


        return redirect()->route('gallery.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery)
    {
        //
    }
}
