<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Market') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <section class="main">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="main_categories">
                                        <div class="main_categories_all">
                                            <i class="fa fa-bars"></i>
                                            <span>All Categories</span>
                                        </div>
                                        <ul>
                                            @foreach($categories as $category)
                                            <li>
                                                <a href="#">{{ $category->title }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="main_search">
                                        <div class="main_search_form">
                                            <form action="">
                                                <div class="main_search_categories">
                                                    All Categories
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                                <input type="text" placeholder="Not implement yet">
                                                <button class="main-search-btn">Search</button>
                                            </form>
                                        </div>
                                    </div>

                                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        </div>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('img/template01.png') }}" alt="template01">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('img/template02.png') }}" alt="template02">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{ asset('img/template03.png') }}" alt="template03">
                                            </div>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="recommended">
                        <div class="container">
                            <h3 style="font-weight: 700;">Recommended for you:</h3><br>
                            <div class="row">
                                <div class="recommended-items owl-theme owl-carousel owl-loaded owl-drag">
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage">
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template01.png') }}" alt="product01">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product01</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template02.png') }}" alt="product02">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product02</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template03.png') }}" alt="product03">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product03</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template04.png') }}" alt="product04">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product04</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template05.png') }}" alt="product05">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product05</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template06.png') }}" alt="product06">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product06</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template07.png') }}" alt="product07">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product07</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template08.png') }}" alt="product08">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product08</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template09.png') }}" alt="product09">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product09</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template10.png') }}" alt="product10">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product10</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template11.png') }}" alt="product11">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product11</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="owl-item card">
                                                <a href="#">
                                                    <img class="card-img-top" src="{{ asset('img/recommend/template12.png') }}" alt="product12">
                                                </a>
                                                <div class="card-body item-price">
                                                    <h6 class="card-text">
                                                        <a href="#">Product12</a>
                                                    </h6>
                                                    <h5>$30.00</h5>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-shopping-cart"></i> Buy
                                                    </a>
                                                    <a href="#" class="btn btn-indigo">
                                                        <i class="fa fa-heart-o"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="showcase">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="showcase-title">
                                        <h2>Fresh Offer</h2>
                                    </div>
                                    <div class="product-menu">
                                        <ul>
                                            <li data-filter="*" class="active">All</li>
                                            <li data-filter=".category-01">Category 01</li>
                                            <li data-filter=".category-02">Category 02</li>
                                            <li data-filter=".category-03">Category 03</li>
                                            <li data-filter=".category-04">Category 04</li>
                                            <li data-filter=".category-05">Category 05</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="row product-filter" style>
                               <div class="col-lg-3 col-md-4 col-sm-6 mix category-01">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template01.png') }}" alt="product01">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product01</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-04">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template02.png') }}" alt="product02">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product02</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-01">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template03.png') }}" alt="product03">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product03</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-05">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template04.png') }}" alt="product04">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product04</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-02">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template05.png') }}" alt="product05">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product05</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-03">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template06.png') }}" alt="product06">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product06</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-02">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template07.png') }}" alt="product07">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product07</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-03">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template08.png') }}" alt="product08">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product08</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-05">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template09.png') }}" alt="product09">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product09</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-02">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template10.png') }}" alt="product10">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product10</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-05">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template11.png') }}" alt="product11">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product11</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 mix category-01">
                                    <div class="card">
                                        <a href="#">
                                            <img class="card-img-top" src="{{ asset('img/recommend/template12.png') }}" alt="product12">
                                        </a>
                                        <div class="card-body item-price">
                                            <h6 class="card-text">
                                                <a href="#">Product12</a>
                                            </h6>
                                            <h5>$30.00</h5>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-shopping-cart"></i> Buy
                                            </a>
                                            <a href="#" class="btn btn-indigo">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section class="top-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="top-product-text">
                                        <h4>Lastest Product</h4>
                                        <div class="top-product-slider owl-carousel owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="width: 2160px;">
                                                    <div class="owl-item" style="width: 360px;">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="top-product-text">
                                        <h4>Top Rated Products</h4>
                                        <div class="top-product-slider owl-carousel owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="width: 2160px;">
                                                    <div class="owl-item" style="width: 360px;">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="top-product-text">
                                        <h4>Review Products</h4>
                                        <div class="top-product-slider owl-carousel owl-loaded owl-drag">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="width: 2160px;">
                                                    <div class="owl-item" style="width: 360px;">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="owl-item">
                                                        <div class="top-product-slider-item">
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product03.png') }}" alt="product03">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product03</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product02.png') }}" alt="product02">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product02</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="top-product-item">
                                                                <div class="top-product-item-pic">
                                                                    <img src="{{ asset('img/top/product01.png') }}" alt="product01">
                                                                </div>
                                                                <div class="top-product-item-text">
                                                                    <h6>Product01</h6>
                                                                    <span>$30.00</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".recommended-items").owlCarousel({
                loop: true,
                margin: 15,
                items: 1,
                dots: false,
                nav: true,
                navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                smartSpeed: 1200,
                autoHeight: false,
                autoplay: true,
                responsive: {

                    0: {
                        items: 1,
                    },

                    480: {
                        items: 2,
                    },

                    768: {
                        items: 3,
                    },

                    992: {
                        items: 4,
                    }
                }
            });

            $('.product-menu li').on('click', function () {
                $('.product-menu li').removeClass('active');
                $(this).addClass('active');
            });
            if ($('.product-filter').length > 0) {
                var containerEl = document.querySelector('.product-filter');
                var mixer = mixitup(containerEl);
            }

            var mixer = mixitup('.product-filter');

            $(".top-product-slider").owlCarousel({
                loop: true,
                margin: 0,
                items: 1,
                dots: false,
                nav: true,
                navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
                smartSpeed: 1200,
                autoHeight: false,
                autoplay: true
            });
        });
    </script>
</x-app-layout>
