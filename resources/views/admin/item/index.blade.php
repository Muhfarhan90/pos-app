@extends('admin.layouts.master')

@section('title', 'Daftar Item')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/simple-datatable.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Daftar Item</h3>
                    <p class="text-subtitle text-muted">Berikut adalah daftar item yang tersedia.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <a href="{{ route('admin.items.create') }}" class="btn btn-primary float-start float-lg-end"><i
                            class="bi bi-plus"></i>Tambah Item</a>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Item</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('img_item_upload/' . $item->img) }}" width="60"
                                            class="img-fluid rounded-top" alt=""
                                            onerror="this.src='{{ asset('assets/admin/images/default.png') }}'"></td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>{{ 'Rp.' . number_format($item->price, 0, ',', '.') }}</td>
                                    <td><span
                                            class="badge {{ $item->category?->cat_name == 'Makanan' ? 'bg-light-warning' : 'bg-light-info' }}">{{ $item->category?->cat_name }}</span>
                                    </td>
                                    <td><span
                                            class="badge {{ $item->is_active ? 'bg-light-success' : 'bg-light-danger' }}">{{ $item->is_active ? 'Active' : 'Inactive' }}</span>
                                    </td>
                                    <td><a href="{{ route('admin.items.edit', $item->id) }}"
                                            class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i>Edit</a>
                                        {{-- <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="bi bi-trash"></i>Delete</button>
                                        </form> --}}
                                    </td>
                                    <td>
                                        @if ($item->is_active == 1)
                                            <form action="{{ route('admin.items.updateStatus', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="0">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah anda yakin ingin menonaktifkan item ini?')">
                                                    <i class="bi bi-x-circle"></i>
                                                    Nonaktifkan
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.items.updateStatus', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="1">
                                                <button type="submit" class="btn btn-sm btn-success"
                                                    onclick="return confirm('Apakah anda yakin ingin mengaktifkan item ini?')">
                                                    <i class="bi bi-check-circle"></i>
                                                    Aktifkan
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script>
@endsection
