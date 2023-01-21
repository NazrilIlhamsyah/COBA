@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/flash')
                <div class="card">
                    <div class="card-header">
                        Data Supplier
                    </div>
                    <div class="card-body">
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control  @error('nama_supplier') is-invalid @enderror"
                                    name="nama_supplier" value="{{ $supplier->nama_supplier }}">
                                @error('nama_supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control  @error('jumlah') is-invalid @enderror"
                                    name="jumlah" value="{{ $supplier->jumlah }}">
                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pilih Data Barang</label>
                                <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror"
                                    id="">
                                    @foreach ($barang as $data)
                                        <option value="{{ $data->id }}"
                                            {{ $data->id == $supplier->id_barang ? 'selected' : '' }}>
                                            {{ $data->nama_baju }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_barang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
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
