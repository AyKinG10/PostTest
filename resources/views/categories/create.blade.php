@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Жаңа курсты Қосу</h2>

                    <form  action="{{ route('adm.categories.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Cat name">
                            @error('name')
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
