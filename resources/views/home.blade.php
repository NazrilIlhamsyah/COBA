<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Project PKL</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('components/css/bootstrap.min.') }}css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('components/css/slick.') }}css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('components/css/slick-theme.') }}css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('components/css/nouislider.min.') }}css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('components/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('components/css/style.') }}css" />

   


<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> 0893859859</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sepatu@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> JL.bandung</a></li>
                </ul>
                <ul class="header-links pull-right">
                <li class="header-item">
                     @if (Route::has('login'))
                     @auth
                       <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"></a> 
                       <li class="nav-item">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
           
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
             <a class="btn btn-outline-secondary" href="{{ route('login') }}"
                 onclick="event.preventDefault();
                 document.getElementById('login-form').submit();">
             </a>
             <form id="login-form" action="{{ route('login') }}" method="POST" class="d-none">
                 @csrf
             </form>
                </li>
             @if (Route::has('register'))
             <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
             @endif
             <li class="header-item">
                 <a class="btn btn-outline-secondary" href="{{ route('register') }}"
                 onclick="event.preventDefault();
                 document.getElementById('register-form').submit();">
             </a>
             
             <form id="register-form" action="{{ route('register') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
           
        @endif
             @endauth
                   
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo">
                                <img src="{{ asset('componentsz.jpg') }}" alt="">
                            </a>
                        </div>
                    </div>
                 
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <!-- <div class="col-md-6">
                        <div class="header-search">
                            <form>
                                <select class="input-select">
                                    <option value="0">All Categories</option>
                                    <option value="1">Category 01</option>
                                    <option value="1">Category 02</option>
                                </select>
                                <input class="input" placeholder="Search here">
                                <button class="search-btn">Search</button>
                            </form>
                        </div>
                    </div> -->
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                           
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="/store">Product</a></li>
                    <!-- <li><a href="/cart">Cart</a></li>
                    <li><a href="/checkout">Shop</a></li> -->

                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->


    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        
                        <div class="section-nav">
                            
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <h1 class="text-center">Toko Sepatu</h1>
                <br>
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab2" class="tab-pane fade in active">
                                <div class="products-slick" data-nav="#slick-nav-2">
                                    <!-- product -->
                                    
                                    @foreach($data as $data1)

                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{ $data1->image() }}" style="width: 263px; height:265px;"alt="">                                        
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">{{$data1->nama_baju}}</a></h3>
                                            <h4 class="product-price">{{$data1->harga}}</h4>
                                            <p class="product-stok">Stok : {{$data1->stok}}</p>
                                            
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                cart</button>
                                        </div>
                                    </div>

                                    @endforeach
                                   
                                    <!-- /product -->
                                </div>
                                <div id="slick-nav-2" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
   
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
 
    <!-- /NEWSLETTER -->

    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                        
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>JL.Bandung</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>08978863221</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>Sepatu@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                <li><a href="#">Sepatu</a></li>
                                <!-- <li><a href="#">Sandal</a></li> -->
                               
                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                  
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('components/js/jquery.min.js') }}"></script>
    <script src="{{ asset('components/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('components/js/slick.min.js') }}"></script>
    <script src="{{ asset('components/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('components/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('components/js/main.js') }}"></script>

</body>

</html>
