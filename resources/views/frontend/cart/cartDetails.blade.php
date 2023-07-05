
@extends('frontend.master')
@section('contents')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{url('frontend/assets/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{route('home')}}">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->


<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">

                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (session()->has('myCart'))

                            @foreach (session()->get('myCart') as $key => $cart)

                            <form action="{{route('update.cart.item', $key)}}">
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img width="60px" src="{{url('uploads/product', $cart['product_image'])}}" alt="">
                                        <h5>{{$cart['product_name']}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$cart['product_price']}} BDT
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" name="qty" value="{{$cart['product_quantity']}}">
                                            

                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{$cart['subtotal']}} BDT
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a class="btn btn-danger" href="{{route('delete.cart.item',$key)}}"><i class="icon-trash icon-large"></i> Delete</a>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <button class="btn btn-warning">Update</button>
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                            @else

                            <p style="font-size: 50px;" class="btn btn-warning">Nothing in the cart</p>

                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
        

            <div class="col-lg-12">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                    

                        <!--'''session()->get('myCart') ?''' ternary operator-->

                        <li>Total Amount <span>{{ session()->get('myCart') ? array_sum(array_column($carts = session()->get('myCart'),'subtotal')) : 0 }} BDT</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->




@endsection