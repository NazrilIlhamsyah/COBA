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
                                    name="nama_supplier" value="{{ $supplier->nama_supplier }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="text" class="form-control  @error('jumlah') is-invalid @enderror"
                                    name="jumlah" value="{{ $supplier->jumlah }}" readonly>
                            </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Barang</label>
                                    <input type="text" class="form-control " name="nama_baju" value="{{ $supplier->barang->nama_baju }}"
                                        readonly>
                                </div>
                        
                                <div class="mb-3">
                                    <div class="d-grid gap-2">
                                        <a href="{{ route('supplier.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                                    </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
