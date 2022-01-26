<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class AllGalleryController extends Controller
{
    public function index(){
        $gallery = gallery::all();
        return view('gallery',[
            'gallery' => $gallery
        ]);
    }
}
