@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{route('adm.posts.update',$posts->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group" style="margin-top: 20px;">

                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" value="{{$posts->title}}"><br>

                        <label for="desc">Description</label>
                        <input type="text" class="form-control" name="description" value="{{$posts->description}}"><br>

                        <label for="cat">Select Category</label>
                        <select class="form-control form-control-lg mt-3"  name="category_id" id="">
                            @foreach($categories as $cat)
                                <option @if($cat->id==$posts->category_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select><br>
                        <label for="image">Select <Image></Image></label>
                        <select class="form-control form-control-lg mt-3"  name="image_id" id="">
                            @foreach($images as $img)
                                <option @if($img->id==$posts->image_id) selected @endif value="{{$img->id}}">{{$img->name}}</option>
                            @endforeach
                        </select><br>
                        <button class="btn btn-primary form-control mt-3" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
