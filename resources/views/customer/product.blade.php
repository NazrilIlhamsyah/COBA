@extends('layouts.user')
@section('content')
    <br>
    <br>
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Product main img -->
            <div class="col-md-3 col-md-push-1">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" style="width:220; height:220 " alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" style="width:220; height:220 " alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" style="width:220; height:220 " alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" style="width:220; height:220 " alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-2  col-md-pull-4">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="{{ $barang->image() }}" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name">{{ $barang->nama_baju }}</h2>

                    <div>
                        <h3 class="product-price">Rp. {{ number_format($barang->harga, 0, '.', '.') }}</h3>
                        <span class="product-available">Stok : {{ $barang->stok }}</span>
                    </div>
                    <p>{{ $barang->deskripsi }}</p>


                    <form action="{{url('cart',$barang->slug) }}" method="GET">

                        {{-- <div class="product-options">
                            <label>
                                Size
                                <select class="input-select" name="ukuran">
                                    <option value="XL">XL</option>
                                    <option value="L">L</option>
                                    <option value="M">M</option>
                                </select>
                            </label>
                            <label>
                                Color
                                <select class="input-select">
                                    <option value="Black">Black</option>
                                    <option value="White">White</option>
                                    <option value="Red">Red</option>
                                </select>
                            </label>
                        </div> --}}

                        <div class="add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" name="jumlah">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <button class="add-to-cart-btn" type="submit"><i class="fa fa-shopping-cart"></i> add to
                                cart</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
