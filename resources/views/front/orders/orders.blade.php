{{-- This page is rendered by orders() method inside Front/OrderController.php (depending on if the order id Optional
Parameter (slug) is passed in or not) --}}


@extends('front.newlayout.front')



@section('new_front')
<style>
    @media only screen and (min-width: 1199px) {
        .account__wrapper {
            width: calc(100%);
        }
    }
</style>
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">My Order</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">My Order</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- my account section start -->
    <section class="my__account--section section--padding">
        <div class="container">
            <p class="account__welcome--text"></p>
            <div class="my__account--section__inner border-radius-10 d-flex">
                {{-- <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">My Profile</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list active"><a href="my-account.html">Dashboard</a></li>
                        <li class="account__menu--list"><a href="my-account-2.html">Addresses</a></li>
                        <li class="account__menu--list"><a href="wishlist.html">Wishlist</a></li>
                        <li class="account__menu--list"><a href="login.html">Log Out</a></li>
                    </ul>
                </div> --}}
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Orders History</h2>
                        <div class="account__table--area w-100">
                            <table class="account__table">
                                <thead class="account__table--header">
                                    <tr class="account__table--header__child">
                                        <th class="account__table--header__child--items">Order</th>
                                        <th class="account__table--header__child--items">Product Code</th>
                                        <th class="account__table--header__child--items">Payment Method</th>
                                        <th class="account__table--header__child--items">Total</th>
                                        <th class="account__table--header__child--items">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="account__table--body mobile__none">
                                    @foreach ($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items"> <a
                                                href="{{ url('user/orders/' . $order['id']) }}">{{ $order['id'] }}</a>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            @foreach($order['orders_products'] as $product)
                                            {{ $product['product_code'] }}
                                            <br>
                                            @endforeach
                                        </td>
                                        <td class="account__table--body__child--items">{{ $order['payment_method'] }}
                                        </td>
                                        <td class="account__table--body__child--items">${{ $order['grand_total'] }}</td>
                                        <td class="account__table--body__child--items">{{ date('Y-m-d',
                                            strtotime($order['created_at'])) }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody class="account__table--body mobile__block">
                                    @foreach ($orders as $order)
                                    <tr class="account__table--body__child">
                                        <td class="account__table--body__child--items">
                                            <strong>Order</strong>
                                            <span><a href="{{ url('user/orders/' . $order['id']) }}">{{ $order['id']
                                                    }}</a></span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Product Code</strong>
                                            <span>@foreach ($order['orders_products'] as $product)
                                                {{ $product['product_code'] }}
                                                <br>
                                                @endforeach</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Payment Method</strong>
                                            <span>{{ $order['payment_method'] }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Total</strong>
                                            <span>${{ $order['grand_total'] }}</span>
                                        </td>
                                        <td class="account__table--body__child--items">
                                            <strong>Date</strong>
                                            <span>{{ date('Y-m-d', strtotime($order['created_at'])) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- my account section end -->

    <!-- Start shipping section -->
    <section class="shipping__section2 shipping__style3 section--padding pt-0">
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