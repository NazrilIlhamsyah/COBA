@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/flash')
                <div class="card">
                    <div class="card-header">
                        Data Transaksi
                        <a href="{{ route('transaksi.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Costumer</th>
                                        <th>Nama Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Barang</th>
                                        <th>Total</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Aksi</th>
                                        <th></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($transaksi as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->costumer->nama_costumer }}</td>
                                            <td>{{ $data->barang->nama_baju }}</td>
                                            <td>{{ number_format($data->barang->harga, 0, ',', '.') }}</td>
                                            <td>{{ $data->jumlah }}</td>
                                            <td>{{ number_format($data->total, 0, ',', '.') }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tgl_transaksi)) }}</td>
                                            <td>{{ $data->aksi }}</td>
                                            <td>
                                                <form action="{{ route('transaksi.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('transaksi.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <a href="{{ route('transaksi.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
