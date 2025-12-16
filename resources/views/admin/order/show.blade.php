@extends('admin.layouts.master')

@section('title', 'Detail Order')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/simple-datatable.css') }}">
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Order</h3>
                    <p class="text-subtitle text-muted">Berikut adalah detail order yang tersedia.</p>
                </div>
                {{-- <div class="col-12 col-md-6 order-md-2 order-first">
                    <a href="{{ route('admin.orders.create') }}" class="btn btn-primary float-start float-lg-end"><i
                            class="bi bi-plus"></i>Tambah Order</a>
                </div> --}}
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4>Kode Order : {{ $order->order_code }}</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Nama Pelanggan:</strong> {{ $order->user->fullname }}</p>
                            <p><strong>Total:</strong> {{ 'Rp' . number_format($order->grand_total, 0, ',', '.') }}</p>
                            <p><strong>Status:</strong>
                                <span
                                    class="badge {{ $order->status == 'settlement' ? 'bg-success' : ($order->status == 'pending' ? 'bg-warning' : ($order->status == 'cooked' ? 'bg-primary' : 'bg-danger')) }}">
                                    {{ $order->status }}
                                </span>
                            </p>
                            <p><strong>Nomor Meja:</strong> {{ $order->table_number }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Metode Pembayaran:</strong> {{ $order->payment_method }}</p>
                            <p><strong>Notes:</strong> {{ $order->note ?? '-' }}</p>
                            <p><strong>Dibuat Pada:</strong> {{ $order->created_at->format('d-m-Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="section">
            <div class="card">
                <div class="card-body">

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Item</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('img_item_upload/' . $orderItem->item->img) }}"
                                            alt="{{ $orderItem->item->name }}" width="50"></td>
                                    <td>{{ $orderItem->item->name }}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                    <td>{{ 'Rp' . number_format($orderItem->price, 0, ',', '.') }}</td>

                                </tr>
                            @endforeach
                            <tr>
                                <th colspan="4" class="text-end">Total</th>
                                <th>{{ 'Rp' . number_format($order->subtotal, 0, ',', '.') }}</th>
                            </tr>
                            <tr>
                                <th colspan="4" class="text-end">Pajak (10%)</th>
                                <th>{{ 'Rp' . number_format($order->tax, 0, ',', '.') }}</th>
                            <tr>
                                <th colspan="4" class="text-end">Total Akhir</th>
                                <th>{{ 'Rp' . number_format($order->grand_total, 0, ',', '.') }}</th>
                            </tr>
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
