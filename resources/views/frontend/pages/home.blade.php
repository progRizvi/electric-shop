@extends('frontend.master')
@section('contents')
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach ($Categories as $Category)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg">
                                <h5><a class="btn btn-success my-2"
                                        href="{{ route('product.under.catagory', $Category->id) }}">{{ $Category->category_name }}</a>
                                </h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All Products</li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">

                @foreach ($Products as $Product)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                data-setbg="{{ url('uploads/product', $Product->product_image) }}">
                                <ul class="featured__item__pic__hover">
                                    <!-- <li><a href="#"><i class="fa fa-heart"></i></a></li> -->
                                    <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->

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
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('frontend/assets/img/banner/banner-1-1.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{ url('frontend/assets/img/banner/banner-2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <!-- <section class="latest-product spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="latest-product__text">
                                    <h4>Latest Products</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-6">
                                <div class="latest-product__text">
                                    <h4>Top Rated Products</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <div class="latest-product__text">
                                    <h4>Review Products</h4>
                                    <div class="latest-product__slider owl-carousel">
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="latest-prdouct__slider__item">
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-1.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-2.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                            <a href="#" class="latest-product__item">
                                                <div class="latest-product__item__pic">
                                                    <img src="{{ url('frontend/assets/img/latest-product/lp-3.jpg') }}" alt="">
                                                </div>
                                                <div class="latest-product__item__text">
                                                    <h6>Crab Pool Security</h6>
                                                    <span>$30.00</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title from-blog__title">
                                    <h2>From The Blog</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{ url('frontend/assets/img/blog/blog-1.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="#">Cooking tips make cooking simple</a></h5>
                                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{ url('frontend/assets/img/blog/blog-2.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <img src="{{ url('frontend/assets/img/blog/blog-3.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="#">Visit the clean farm in the US</a></h5>
                                        <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section> -->
    <!-- Blog Section End -->
@endsection
