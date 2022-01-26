<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\gallery;
use App\Models\profil;
use App\Models\home;
use App\Models\portfolio;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        $home = home::all();
        $profil = profil::all();
        $portfolio = portfolio::all();
        $blog = Blog::all();
        $gallery = gallery::all();
        return view('welcome', [
            'home' => $home,
            'profil' => $profil,
            'portfolio' => $portfolio,
            'blog' => $blog,
            'gallery' => $gallery,
        ]);
    }

    public function blogDetail() {
        $blog = blog::all();
        $blog->get('slug');
        ddd($blog);
        return view('detail_blog', [
            'blog' => $blog
        ]);
    }
   
}
