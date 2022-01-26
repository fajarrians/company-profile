<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreblogRequest;
use App\Http\Requests\UpdateblogRequest;
use App\Models\blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::all();
        return view('blog.index',[
            'blog' => $blog,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreblogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreblogRequest $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'author' => 'required',
            'date' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);
        
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        blog::create($validatedData);


        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        $blog = Blog::get()->where('slug', $blog->slug);
        return view('detail_blog', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        return view('blog.edit',[
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateblogRequest  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateblogRequest $request, blog $blog)
    {
        $validatedData = $request->validate([
            'image' => 'image|file|max:1024',
            'author' => 'required',
            'date' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'content' => 'required'
        ]);
        
        if ($request->file('image')) {
            if($request->oldImg){
                Storage::delete($request->oldImg);
            }
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['content'] = strip_tags($request->content);

        $blog->update($validatedData);


        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        if($blog->image){
            Storage::delete($blog->image);
        }
        $blog->delete();

        return redirect()->route('blog.index');
    }
}
