@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Costumer</label>
                                <select name="id_costumer" class="form-control @error('id_costumer') is-invalid @enderror"
                                    id="">
                                    @foreach ($costumer as $data1)
                                        <option value="{{ $data1->id }}">{{ $data1->nama_costumer }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_costumer')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-3">
                                <label class="form-label">Pilih Barang</label>
                                <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror"
                                    id="">
                                    @foreach ($barang as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_baju }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_barang')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control  @error('jumlah') is-invalid @enderror"
                                    name="jumlah">
                                </div>
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <select name="harga" class="form-control @error('harga') is-invalid @enderror"
                                    id="">
                                    @foreach ($barang as $data)
                                        <option value="{{ $data->id }}">{{ $data->harga }}</option>
                                    @endforeach
                                </select>
                            </div>
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            <div class="mb-3">
                                <label class="form-label">Tanggal</label>
                                <input type="date" class="form-control @error('tgl_transaksi') is-invalid @enderror"
                                    name="tgl_transaksi">
                                </div>
                                @error('tgl_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <div class="d-grid gap-5">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
