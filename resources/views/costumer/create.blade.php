@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/flash')
                <div class="card">
                    <div class="card-header">
                        Data Costumer
                    </div>
                    <div class="card-body">
                        <form action="{{ route('costumer.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Nama Costumer</label>
                                <input type="text" class="form-control  @error('nama_costumer') is-invalid @enderror"
                                    name="nama_costumer">
                                @error('nama_costumer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                               <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" value="lakilaki">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-Laki
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio"  name="jk" value="perempuan">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                                </div>
                                @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Telepon</label>
                                <input type="number" class="form-control  @error('no_telpon') is-invalid @enderror"
                                    name="no_telpon">
                                @error('no_telpon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea name="alamat"  class="form-control  @error('alamat') is-invalid @enderror" id="" cols="30" rows="10"></textarea>
                                @error('alamat')
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
