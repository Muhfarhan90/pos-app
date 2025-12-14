@extends('admin.layouts.master')

@section('title', 'Edit Karyawan')

@section('content')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Edit Karyawan</h3>
                <p class="text-subtitle text-muted">Silahkan isi data karyawan yang ingin diedit.</p>
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
            <form class="form" action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Nama Karyawan</label>
                                <input type="text" class="form-control" id="role"
                                    placeholder="Masukkan Nama Karyawan" name="fullname" required
                                    value="{{ old('fullname', $user->fullname) }}">
                            </div>
                            <div class="form-group">
                                <label for="role">Username</label>
                                <input type="text" class="form-control" id="role" placeholder="Masukkan Username"
                                    name="username" required value="{{ old('username', $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Masukkan Email"
                                    name="email" required value="{{ old('email', $user->email) }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Nomor Telepon</label>
                                <input type="number" class="form-control" id="phone"
                                    placeholder="Masukkan Nomor Telepon" name="phone" required
                                    value="{{ old('phone', $user->phone) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control" id="role" name="role_id" required>
                                    <option value="" selected disabled>-- Pilih Role --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukkan Password"
                                    name="password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password_confirmation"
                                    placeholder="Konfirmasi Password" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group d-flex justify-content-between items-center">
                                <div>
                                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Batal</a>
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
