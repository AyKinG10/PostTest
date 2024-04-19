<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', ['posts'=>Post::all(), 'categories'=>Category::all(),'images'=> Image::all()]);
    }


    public function create()
    {
        $this->authorize('create',Post::class);
        return view('posts.create', ['categories'=>Category::all(),'images'=> Image::all()]);
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'image_id' => 'required|exists:images,id',
        ]);
        Post::create($validated);
        return redirect(route('posts.index'))->with('message','Successfully');
    }

    public function show(Post $post)
    {
        return view('posts.show',['posts'=>$post, 'categories'=>Category::all()]);
    }


    public function edit(Post $post)
    {
        $this->authorize('update', Post::class);
        return view('posts.edit',['posts'=>$post, 'categories'=>Category::all(),'images'=>Image::all()]);
    }


    public function update(Request $request, Post $post)
    {
        $post->update([
            'title'=>$request->input('title'),
            'description'=>$request->input('description'),
            'category_id'=>$request->category_id,
            'image_id'=>$request->image_id,
        ]);
        return redirect(route('posts.index'))->with('message','Posts Updated Successfully');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',Post::class);
        $post->delete();
        return redirect(route('posts.index'));
    }

    public function postsByCat(Category $category)
    {
        return view('posts.index', ['posts'=>Post::all(), 'categories'=>$category->posts,'images'=> Image::all()]);
    }
}
