<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create',['categories'=>Category::all()]);
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'name'=>'required',
        ]);
        Category::create($validated);
        return redirect(route('posts.index'))->with('message','Successfully');
    }
}
