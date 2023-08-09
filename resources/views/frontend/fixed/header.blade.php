<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            <li><i class="fa fa-envelope"></i> example@gmail.com</li>
                            <li>Delivery Charge 100tk</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <!-- <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a> -->
                        </div>

                        <div class="header__top__right__auth">






                            @auth('customer')
                                <button class="btn btn-outline-success"><a href="{{ route('frontuser.profile') }}">
                                        {{ auth('customer')->user()->name }}
                                        <i class="fa fa-user"></i> </a></button>
                                <button class="btn btn-success my-2"><a href="{{ route('front.logout') }}">Log
                                        Out</a></button>
                            @else
                                <button type="button" class="btn btn-success my-2" data-toggle="modal"
                                    data-target="#registration">
                                    Registration
                                </button>

                                <button type="button" class="btn btn-success my-2" data-toggle="modal"
                                    data-target="#login">
                                    Login
                                </button>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{ route('home') }}"><img src="{{ url('frontend/assets/img/logo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>

                        <li class="active"><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('shop.page') }}">Shop</a></li>
                        <!-- <li><a href="{{ route('blog') }}">Blog</a></li> -->
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        @if (auth('customer')->user())
                            <li><a href="{{ route('frontend.support.support') }}"><i class="bi bi-chat"></i></a></li>
                        @endif
                        <li><a href="{{ route('cart.details') }}"><i class="fa fa-shopping-bag"></i>
                                <span>{{ session()->has('myCart') ? count(session()->get('myCart')) : 0 }}</span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        <ul @if (request()->route()->getName() != 'home') style="display: none;" @endif>


                            @foreach ($Categories as $Category)
                                <li><a
                                        href="{{ route('product.under.catagory', $Category->id) }}">{{ $Category->category_name }}</a></i>
                            @endforeach



                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('search') }}">

                                <input name="search_key" type="text" placeholder="Write Here">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+880 1854-969657</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>



                    @if (request()->route()->getName() == 'home')
                        @include('frontend.fixed.banner')
                    @endif




                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Button trigger modal -->



    <!--Register Modal -->
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <!--Form -->
                    <form action="{{ route('register.submit.front') }}" method="POST">
                        @csrf
                        <div class="form-group my-3">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="name" required class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Enter your name">

                        </div>

                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="email" name="email" required class="form-control"
                                id="exampleInputPassword1" placeholder="Enter your address">


                        </div>


                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" required class="form-control"
                                id="exampleInputPassword1" placeholder="Enter your password">


                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Button trigger modal -->



    <!--Login Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ route('login.submit.front') }}" method="POST">
                        @csrf

                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Email Address</label>
                            <input type="email" name="email" required class="form-control"
                                id="exampleInputPassword1" placeholder="Enter your address">


                        </div>

                        <div class="form-group my-3">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" required class="form-control"
                                id="exampleInputPassword1" placeholder="Enter your password">

                        </div>


                </div>
                <div class="modal-footer">
                    <a class="btn btn-warning" href="{{ route('forgot.pass.link') }}">Reset Password</a>
                    <button type="submit" class="btn btn-primary">submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</header>
