<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreprofilRequest;
use App\Http\Requests\UpdateprofilRequest;
use App\Models\profil;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = profil::all();
        return view('profil.index', [
            'profil' => $profil
        ]);;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreprofilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreprofilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(profil $profil)
    {
        return view('profil.edit',[
            'profil' => $profil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateprofilRequest  $request
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateprofilRequest $request, profil $profil)
    {
        $profil->sejarah = $request->sejarah;
        $profil->visi = $request->visi;
        $profil->misi = $request->misi;
        $profil->profil = $request->profil;
        $profil->save();

        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(profil $profil)
    {
        //
    }
}
