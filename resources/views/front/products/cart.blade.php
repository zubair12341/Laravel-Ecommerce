{{-- Note: cart.blade.php is the page that opens when you ... --}}
@extends('front.newlayout.front')


@section('new_front')


<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">Shopping Cart</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shopping Cart</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- cart section start -->
    <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <h2 class="cart__title mb-40">Shopping Cart</h2>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart__table">
                            <table class="cart__table--inner">
                                <thead class="cart__table--header">
                                    <tr class="cart__table--header__items">
                                        <th class="cart__table--header__list">Product</th>
                                        <th class="cart__table--header__list">Price</th>
                                        <th class="cart__table--header__list">Quantity</th>
                                        <th class="cart__table--header__list">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="cart__table--body">
                                    @php $total_price = 0 @endphp

                                    @foreach ($getCartItems as $item)
                                    @php
                                    $getDiscountAttributePrice =
                                    \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                                    // from the `products_attributes` table, not the `products` table

                                    @endphp
                                    <tr class="cart__table--body__items">
                                        <td class="cart__table--body__list">
                                            <div class="cart__product d-flex align-items-center">
                                                <form action="{{url('cart/delete')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cartid" value="{{$item['id']}}">
                                                    <button class="cart__remove--btn" aria-label="search button"
                                                        type="submit">
                                                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 24 24" width="16px" height="16px">
                                                            <path
                                                                d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z" />
                                                        </svg>
                                                    </button>
                                                </form>

                                                <div class="cart__thumbnail">
                                                    <a href="{{ url('product/' . $item['product_id']) }}"><img
                                                            class="border-radius-5"
                                                            src="{{ asset('storage/front/images/product_images/small/' . $item['product']['product_image']) }}"
                                                            alt="cart-product"></a>
                                                </div>
                                                <div class="cart__content">
                                                    <h4 class="cart__content--title"><a
                                                            href="{{ url('product/' . $item['product_id']) }}">{{$item['product']['product_name']}}
                                                            ({{ $item['product']['product_code'] }})</a></h4>
                                                    <span class="cart__content--variant">COLOR: {{
                                                        $item['product']['product_color'] }}</span>
                                                    <span class="cart__content--variant">Size: {{ $item['size']
                                                        }}</span>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__table--body__list">
                                            @if ($getDiscountAttributePrice['discount'] > 0)

                                            <span class="current__price"> ${{ $getDiscountAttributePrice['final_price']
                                                }}</span>
                                            <span class="price__divided"></span>
                                            <span class="old__price"> ${{ $getDiscountAttributePrice['product_price']
                                                }}</span>
                                            @else
                                            <span class="current__price"> ${{ $getDiscountAttributePrice['final_price']
                                                }}</span>
                                            @endif
                                        </td>

                                        <td class="cart__table--body__list">
                                            <form action="{{route('cart.update')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="cartid" value="{{ $item['id'] }}">
                                                <div class="quantity__box">
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity decrease"
                                                        aria-label="quantity value" value="Decrease Value">-</button>
                                                    <label>
                                                        <input type="number"
                                                            class="quantity__number quickview__value--number" name="qty"
                                                            min="1" value="{{ $item['quantity'] }}" data-counter />
                                                    </label>
                                                    <button type="button"
                                                        class="quantity__value quickview__value--quantity increase"
                                                        aria-label="quantity value" value="Increase Value">+</button>
                                                    <button type="submit"
                                                        class="coupon__code--field__btn primary__btn"><i
                                                            class="fas fa-spinner"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="cart__table--body__list">
                                            <span class="cart__price end">${{ $getDiscountAttributePrice['final_price']
                                                * $item['quantity'] }}</span>
                                        </td>
                                    </tr>
                                    @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] *
                                    $item['quantity']) @endphp

                                    @endforeach
                                </tbody>
                            </table>
                            <div class="continue__shopping d-flex justify-content-between">
                                <a class="continue__shopping--link" href="{{route('new.shop')}}">Continue shopping</a>
                                <a class="continue__shopping--clear" href="{{route('cart.item.delete')}}">Clear Cart</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__summary border-radius-10">
                            <div class="coupon__code mb-30">
                                <h3 class="coupon__code--title">Coupon</h3>
                                <p class="coupon__code--desc">Enter your coupon code if you have one.</p>
                                <form action="{{url('apply-coupon')}}" method="POST">
                                    <div class="coupon__code--field d-flex">
                                        @csrf

                                        <label>
                                            <input class="coupon__code--field__input border-radius-5"
                                                placeholder="Coupon code" type="text" name="code">
                                        </label>
                                        <button class="coupon__code--field__btn primary__btn" type="submit">Apply
                                            Coupon</button>
                                    </div>
                                </form>
                            </div>

                            <div class="cart__summary--total mb-20">
                                <table class="cart__summary--total__table">
                                    <tbody>
                                        <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                            <td class="cart__summary--amount text-right">${{$total_price}}</td>
                                        </tr>
                                        <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">Coupon Discount</td>
                                            <td class="cart__summary--amount text-right">
                                                @if (\Illuminate\Support\Facades\Session::has('couponAmount')) {{-- We
                                                stored the 'couponAmount' in a Session Variable inside the applyCoupon()
                                                method in Front/ProductsController.php --}}
                                                ${{ \Illuminate\Support\Facades\Session::get('couponAmount') }}
                                                @else
                                                $0
                                                @endif
                                            </td>
                                        </tr>
                                        <tr class="cart__summary--total__list">
                                            <td class="cart__summary--total__title text-left">GRAND TOTAL</td>
                                            <td class="cart__summary--amount text-right">${{ $total_price -
                                                \Illuminate\Support\Facades\Session::get('couponAmount') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart__summary--footer">
                                <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                <ul class="d-flex justify-content-between">

                                    <li><a class="cart__summary--footer__btn primary__btn checkout"
                                            href="{{ url('/checkout') }}">Check Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- cart section end -->



    <!-- Start brand logo section -->
    {{-- <div class="brand__logo--section bg__secondary section--padding">
        <div class="container-fluid">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="brand__logo--section__inner d-flex justify-content-center align-items-center">
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo1.png" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo2.png" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo3.png" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo4.png" alt="brand logo">
                        </div>
                        <div class="brand__logo--items">
                            <img class="brand__logo--items__thumbnail--img display-block"
                                src="assets/img/logo/brand-logo5.png" alt="brand logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- End brand logo section -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding">
        <div class="container">
            <div class="shipping__section2--inner shipping__style3--inner d-flex justify-content-between">
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping1.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Shipping</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping2.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Payment</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping3.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Return</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
                <div class="shipping__items2 d-flex align-items-center">
                    <div class="shipping__items2--icon">
                        <img src="assets/img/other/shipping4.png" alt="">
                    </div>
                    <div class="shipping__items2--content">
                        <h2 class="shipping__items2--content__title h3">Support</h2>
                        <p class="shipping__items2--content__desc">From handpicked sellers</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End shipping section -->

</main>

@endsection