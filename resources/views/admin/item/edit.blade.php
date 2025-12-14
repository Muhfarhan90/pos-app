@extends('admin.layouts.master')

@section('title', 'Edit Item')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Tambah Item</h3>
                <p class="text-subtitle text-muted">Silahkan isi data item yang ingin ditambahkan.</p>
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
                <form class="form" action="{{ route('admin.items.update', $item->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item">Nama Item</label>
                                    <input type="text" class="form-control" id="item"
                                        placeholder="Masukkan Nama Item" name="name"
                                        value="{{ old('name', $item->name) }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" id="description" placeholder="Masukkan Deskripsi" name="description" required>{{ old('description', $item->description) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" class="form-control" id="price" placeholder="Masukkan Harga"
                                        name="price" value="{{ old('price', $item->price) }}" required>
                                </div>


                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category">Kategori</label>
                                    <select name="category_id" id="category" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image">Gambar</label>
                                    @if ($item->img)
                                        <div class="mt-2 mb-2">
                                            <img src="{{ asset('img_item_upload/' . $item->img) }}" width="200"
                                                class="img-fluid rounded-top" alt="{{ $item->name }}"
                                                onerror="this.onerror=null;this.src='{{ $item->img }}';">
                                        </div>
                                    @endif
                                    <input type="file" class="form-control" id="image" placeholder="Masukkan Gambar"
                                        name="img">
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Status</label>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="is_active" value="0">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
                                            name="is_active" value="1"
                                            {{ old('is_active', $item->is_active) ? 'checked' : '' }}>
                                        <label for="flexSwitchCheckChecked">Aktif/Tidak Aktif</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group d-flex justify-content-between items-center">
                                    <div>
                                        <a href="{{ route('admin.items.index') }}" class="btn btn-primary">Batal</a>
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
