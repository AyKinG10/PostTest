@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Добавить Фото</h2>

                    <form  action="{{ route('adm.images.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div style="margin-top: 10px" class="form-group">
                            <label for="imgInput">Фото</label>
                            <input type="file" class="form-control-file @error('name') is-invalid @enderror" id="imgInput" name="name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success" style="margin-top:0.3rem;">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
