@extends('admin.layouts.master')

@section('title', 'Edit Kategori')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Kategori</h3>
                <p class="text-subtitle text-muted">Silahkan isi data kategori yang ingin diedit.</p>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="form" action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Nama Kategori</label>
                                <input type="text" class="form-control" id="category"
                                    placeholder="Masukkan Nama Kategori" name="cat_name" value="{{ $category->cat_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi</label>
                                <textarea class="form-control" id="description" placeholder="Masukkan Deskripsi" name="description" required>{{ $category->description }}</textarea>
                            </div>

                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group d-flex justify-content-between items-center">
                                <div>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Batal</a>
                                    <button class="btn btn-outline-primary" type="reset">Reset</button>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
