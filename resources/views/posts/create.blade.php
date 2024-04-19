@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Жаңа курсты Қосу</h2>

                    <form  action="{{ route('adm.posts.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div  class="form-group">
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="" selected disabled>Выберите Категорию:</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <select class="form-control @error('image_id') is-invalid @enderror" name="image_id">
                                <option value="" selected disabled>Выберите Фотографию:</option>
                                @foreach($images as $img)
                                    <option value="{{ $img->id }}">{{ $img->name }}</option>
                                @endforeach
                            </select>
                            @error('image_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button style="margin-top: 10px" class="btn btn-primary btn-block" type="submit">Сақтау</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
