<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class AllBlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();    
        return view('blog', [
            'blog' => $blog,
        ]);
    }
}
