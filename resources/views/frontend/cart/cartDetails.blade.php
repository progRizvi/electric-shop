@extends('frontend.master')
@section('contents')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ url('frontend/assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('home') }}">Home</a>
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

                        <table class="table">
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
                                        {{-- @dd($key, $cart) --}}

                                        <form action="{{ route('update.cart.item', $key) }}">
                                            <tr>
                                                <td class="shoping__cart__item">
                                                    <img width="60px"
                                                        src="{{ url('uploads/product', $cart['product_image']) }}"
                                                        alt="">
                                                    <h5>{{ $cart['product_name'] }}</h5>
                                                </td>
                                                <td class="shoping__cart__price">
                                                    {{ $cart['product_price'] }} BDT
                                                </td>
                                                <td class="shoping__cart__quantity">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input type="number" name="qty" min="1"
                                                                data-id="{{ isset($cart['product_id']) ? $cart['product_id'] : $key }}"
                                                                class="cart-qty-{{ isset($cart['product_id']) ? $cart['product_id'] : $key }}"
                                                                value="{{ $cart['product_quantity'] }}"
                                                                onchange="updateCartItem(this)">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="shoping__cart__total">
                                                    {{ $cart['subtotal'] }} BDT
                                                </td>
                                                <td class="shoping__cart__item__close">
                                                    <a class="btn btn-danger"
                                                        href="{{ route('delete.cart.item', $key) }}"><i
                                                            class="icon-trash icon-large"></i> Delete</a>
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
                            <li>Total Amount
                                <span><span class="total_amount">
                                        {{ session()->get('myCart') ? array_sum(array_column($carts = session()->get('myCart'), 'subtotal')) : 0 }}
                                    </span>
                                    BDT</span>
                            </li>
                        </ul>
                        <a href="{{ route('checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->




@endsection

@push('scripts')
    <script>
        const calc = (id) => {
            const qty = $(`.cart-qty-${id}`).val()
            const price = $(`.product-price-${id}`).text().replace("$", "")
            return parseInt(qty) * parseInt(price);
        }

        $(document).on("click", ".cart-item-delete", function() {
            const id = $(this).data("id")
            $.ajax({
                url: `{{ route('delete.cart.item', '') }}/${id}`,
                type: "get",
                data: {
                    id
                },
                success: function(res) {
                    if (res.status == "success") {
                        $(".table").load(location.href + " .table");
                        $("#navbarCollapse").load(location.href + " #navbarCollapse");
                        $(".cart-right").load(location.href + " .cart-right");
                        // total()
                    }
                }
            });
        })
        const update = (method, route, data) => {
            $.ajax({
                url: route,
                method,
                data,
                success: function(res) {}
            });

        }
        const totalCart = () => {
            /*
            const td = $("td.cart-total")
            let totalcalc = 0;
            td.each(function(index, val) {
                const data = $(val).text().trim().replace("$", "")
                totalcalc += parseInt(data);
            })
            const h6 = $(".cart-sub>h6")[1]

            $(h6).text(`$${totalcalc}`)
            if (totalcalc === 0) {
                $(".cart-shipping").text(0)
            } else {
                $(".cart-shipping").text("$10")
            }
            $(".cart-right-total").text(`$${totalcalc === 0 ? 0 : totalcalc+ 10}`)
            */
            console.log("totalAmount");
        }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on("click", ".inc,.dec", function() {

            const input = $(this).closest(".pro-qty").find("input")
            const id = input.data("id")
            const qty = input.val()
            updateCartItem(input)
        })
        const updateCartItem = (e) => {
            const id = $(e).data("id")
            const qty = $(e).val()

            $.ajax({
                url: `{{ route('update.cart.item', '') }}/${id}`,
                method: "post",
                data: {
                    id,
                    qty
                },
                success: function(res) {
                    $(".table").load(location.href + " .table");
                    $(".total_amount").text(res.total)
                }
            });


        }
    </script>
@endpush
