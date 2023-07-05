@extends('frontend.master')
@section('contents')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('frontend/assets/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div> -->
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="{{route('pay.now')}}" method="post">
                @csrf

                @if (session()->has('myCart'))




                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" required name="first_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" required name="last_name">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" required name="country">
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="add1" required placeholder="Street Address" class="checkout__input__add">
                            <input type="text" name="add2" placeholder="Apartment, suite, unite ect (optinal)">
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" required name="city">
                        </div>
                        <div class="checkout__input">
                            <p>State<span>*</span></p>
                            <input type="text" required name="state">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text" required name="postcode">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" required name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" required name="email" value="{{auth('customer')->user()->email}}">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div> -->
                    </div>



                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>


                            @foreach (session()->get('myCart') as $key => $cart)
                            <ul>
                                <li>{{$cart['product_name']}}<span>{{$cart['product_price']}} BDT</span></li>

                            </ul>
                            @endforeach


                            @php
                            $subtotal = session()->get('myCart') ? array_sum(array_column($carts = session()->get('myCart'),'subtotal')) : 0;

                            $delivery = 100;
                            @endphp

                            <div class="checkout__order__subtotal"> Subtotal <span>{{ $subtotal }} BDT</span>

                            <div class="checkout__order__subtotal"> Delivery <span>{{ $delivery }} BDT</span></div>

                            

                            <div class="checkout__order__total">Order Total <span id="total_amount">{{$subtotal + $delivery}}</span></div>

                            <input type="hidden" name="total_payment" id="total_payment">
                            <!-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> -->
                            
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>

            @endif
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection