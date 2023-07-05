@extends('frontend.master')
@section('contents')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('frontend/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Electrical Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach ($Categories as $Category)
                                    <li><a
                                            href="{{ route('product.under.catagory', $Category->id) }}">{{ $Category->category_name }}</a></i>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>All Products</h2>
                        </div>
                        <div class="row">
                            @foreach ($Products as $Product)
                                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg"
                                            data-setbg="{{ url('uploads/product', $Product->product_image) }}">
                                            <ul class="featured__item__pic__hover">
                                                <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->

                                                @if ($Product->product_quantity > 0)
                                                    <li><a href="{{ route('add.cart.page', $Product->id) }}"><i
                                                                class="fa fa-shopping-cart"></i></a></li>
                                                @else
                                                    <p style="color: red;">Stock Out</p>
                                                @endif

                                            </ul>

                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a
                                                    href="{{ route('pages.shop.details', $Product->id) }}">{{ $Product->product_name }}</a>
                                            </h6>
                                            <h5>{{ $Product->product_price }} BDT</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Product Section End -->
@endsection
