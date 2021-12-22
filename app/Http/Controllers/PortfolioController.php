<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreportfolioRequest;
use App\Http\Requests\UpdateportfolioRequest;
use App\Models\portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = portfolio::all();
        return view('portfolio.index',[
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreportfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreportfolioRequest $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'title' => 'required',
            'keterangan' => 'required',
        ]);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        portfolio::create($validatedData);


        return redirect()->route('portfolio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(portfolio $portfolio)
    {
        return view('portfolio.edit', [
            'portfolio' => $portfolio
        ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateportfolioRequest  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateportfolioRequest $request, portfolio $portfolio)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'title' => 'required',
            'keterangan' => 'required',
        ]);
        
        if ($request->file('image')) {
            if($request->oldImg){
                Storage::delete($request->oldImg);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $portfolio->update($validatedData);


        return redirect()->route('portfolio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio)
    {
        if($portfolio->image){
            Storage::delete($portfolio->image);
        }
        $portfolio->delete();

        return redirect()->route('portfolio.index');
    }
}
