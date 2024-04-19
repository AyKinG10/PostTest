<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function create()
    {
        return view('images.create',['images'=>Image::all()]);
    }


    public function store(Request $request)
    {
        $validated= $request->validate([
            'name'=>'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        ]);
        $fileName=time().$request->file('name')->getClientOriginalName();
        $image_path = $request->file('name')->storeAs('images',$fileName,'public');
        $validated['name'] = '/storage/'.$image_path;
        Image::create($validated);
        return redirect(route('posts.index'))->with('message','Successfully');
    }
}
