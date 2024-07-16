{{-- This page is accessed from Customer Login tab in the dropdown menu in the header (in front/layout/header.blade.php)
--}}
@extends('front.newlayout.front')


@section('new_front')
<main class="main__content_wrapper">

    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title text-white mb-25">User Login/Register</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a class="text-white"
                                    href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span class="text-white">User Login/Register</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->

    <!-- Start login section  -->
    <div class="login__section section--padding">
        <div class="container">
                <div class="login__section--inner">
                    <div class="row row-cols-md-2 row-cols-1">
                        <div class="col">
                            <div class="account__login">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Login</h2>
                                    <p class="account__login--header__desc">Login if you area a returning customer.</p>
                                </div>
                                <form action="{{route('user.login')}}" method="POST">
                                    @csrf

                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Email Addres" type="text"
                                            name="email">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Password" type="password"
                                            name="password">
                                        @error('password')
                                        <span>{{$message}}</span>
                                        @enderror
                                        <button class="account__login--btn primary__btn" type="submit">Login</button>
                                    
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col">
                            <div class="account__login register">
                                <div class="account__login--header mb-25">
                                    <h2 class="account__login--header__title h3 mb-10">Create an Account</h2>
                                    <p class="account__login--header__desc">Register here if you are a new customer</p>
                                </div>
                                <form action="{{route('user.register')}}" method="POST">
@csrf

                                    <div class="account__login--inner">
                                        <input class="account__login--input" placeholder="Full Name" name="name" type="text">
                                        @error('name')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Mobile Number" name="mobile" type="tel">
                                          @error('mobile')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Email Addres" name="email" type="email">
                                          @error('email')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Password" name="password" type="password">
                                          @error('password')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                        <input class="account__login--input" placeholder="Confirm Password" name="confirm_password" type="password">
                                          @error('confirm_password')
                                            <span class="text-danger">
                                                {{$message}}
                                            </span>
                                        @enderror

                                        <div class="account__login--remember position__relative">
                                            <input class="checkout__checkbox--input" id="check2" name="accept" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label" for="check2">
                                                I have read and agree to the terms & conditions</label>
                                        </div>
                                        @error('accept')
                                        <span class="text-danger">
                                            {{$message}}
                                        </span>
                                    @enderror

                                        <button class="account__login--btn primary__btn mb-10 mt-2" type="submit">Submit &
                                            Register</button>
                                       
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           
        </div>
    </div>
    <!-- End login section  -->

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