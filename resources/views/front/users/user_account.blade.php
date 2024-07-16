{{-- This page is accessed from My Account tab in the dropdown menu in the header (in front/layout/header.blade.php). Check userAccount() method in Front/UserController.php --}} 
@extends('front.newlayout.front')


@section('new_front')
<style>
    .form-control{
        height: 32px;
        margin-bottom: 10px;
        font-size: 15px
    }
    .astk{
        color: red
    }
</style>
<section class="breadcrumb__section breadcrumb__bg">
    <div class="container">
        <div class="row row-cols-1">
            <div class="col">
                <div class="breadcrumb__content text-center">
                    <h1 class="breadcrumb__content--title text-white mb-25">My Account</h1>
                    <ul class="breadcrumb__content--menu d-flex justify-content-center">
                        <li class="breadcrumb__content--menu__items"><a class="text-white" href="/">Home</a></li>
                        <li class="breadcrumb__content--menu__items"><span class="text-white">My Account</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Account-Page -->
    <div class="page-account u-s-p-t-80 mt-5 mb-5">
        <div class="container">


            <div class="row">
                <!-- Update User Account Contact Details -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size: 18px">Update Contact Details</h2>


                        

                      

                        <form id="accountForm" action="{{url('user/account')}}" method="post"> {{-- We need to deactivate the 'action' HTML attribute (using    'javascript:;'    ) as we'r going to submit using an AJAX call. Check front/js/custom.js --}}
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <div class="u-s-m-b-30">
                                <label for="user-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" style="background-color: #e9e9e9" readonly disabled> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                {{-- <p id="account-email" style="color: red"></p> --}} {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, register-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                                <p id="account-email"></p> {{-- this will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- The pattern must be like: register-x (e.g. register-mobile, register-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="register-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-name">Name
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-name" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                             @error('name')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-address">Address
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-address" name="address" value="{{ \Illuminate\Support\Facades\Auth::user()->address }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                @error('address')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-city">City
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-city" name="city" value="{{ \Illuminate\Support\Facades\Auth::user()->city }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                @error('city')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-state">State
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-state" name="state" value="{{ \Illuminate\Support\Facades\Auth::user()->state }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                @error('state')
                                <span class="text-danger">{{$message}}</span>
                             @enderror</div>
                            <div class="u-s-m-b-30">
                                <label for="user-country">Country
                                    <span class="astk">*</span>
                                </label>
                                <select class="text-field form-control" id="user-country" name="country" style="color: #495057">
                                    <option value="">Select Country</option>

                                    @foreach ($countries as $country) {{-- $countries was passed from UserController to view using compact() method --}}
                                        <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                                    @endforeach

                                </select>
                                @error('country')
                                <span class="text-danger">{{$message}}</span>
                             @enderror </div>
                            <div class="u-s-m-b-30">
                                <label for="user-pincode">Pincode
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-pincode" name="pincode" value="{{ \Illuminate\Support\Facades\Auth::user()->pincode }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                @error('pincode')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-mobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field form-control" type="text" id="user-mobile" name="mobile" value="{{ \Illuminate\Support\Facades\Auth::user()->mobile }}"> {{-- Retrieving The Authenticated User: https://laravel.com/docs/9.x/authentication#retrieving-the-authenticated-user --}}
                                @error('mobile')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="m-b-45">
                                <button style="    margin-left: 0;" class="coupon__code--field__btn primary__btn w-100" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Update User Account Contact Details /- -->



                <!-- Update User Password via AJAX --> 
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size: 18px">Update Password</h2>


                        {{-- Registration Success Message using jQuery. Check front/js/custom.js --}} 
                        {{-- <p id="password-success" style="color: green"></p> --}}
                        <p id="password-success"></p>


                        {{-- Show Update User Password Errors --}}
                        {{-- <p id="account-error" style="color: red"></p> --}} {{-- if the Validation passes / is okay but the login credentials provided by the user are incorrect, this'll be used by jQuery to show a generic 'Wrong Credentials!' message. Or to show a message when the user's account is inactive/disabled/deactivated --}}
                        <p id="password-error"></p> {{-- if the Validation passes / is okay but the login credentials provided by the user are incorrect, this'll be used by jQuery to show a generic 'Wrong Credentials!' message. Or to show a message when the user's account is inactive/disabled/deactivated --}}


                        
                        <form id="passwordForm" action="{{url('user/update-password')}}" method="post"> {{-- We need to deactivate the 'action' HTML attribute (using    'javascript:;'    ) as we'r going to submit using an AJAX call. Check front/js/custom.js --}}
                            @csrf {{-- Preventing CSRF Requests: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}


                            <div class="u-s-m-b-30">
                                <label for="current-password">Current Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="current-password" class="text-field form-control" placeholder="Current Password" name="current_password">
                                @error('current_password')
                                <span class="text-danger">{{$message}}</span>
                             @enderror </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">New Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="new-password" class="text-field form-control" placeholder="New Password" name="new_password">
                                @error('new_password')
                                <span class="text-danger">{{$message}}</span>
                             @enderror
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Confirm Password
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="confirm-password" class="text-field form-control" placeholder="Confirm Password" name="confirm_password">
                                @error('confirm_password')
                                <span class="text-danger">{{$message}}</span>
                             @enderror</div>
                            <div class="u-s-m-b-45">
                                <button style="    margin-left: 0;" type="submit" class="coupon__code--field__btn primary__btn w-100">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Update User Password via AJAX /- -->



            </div>
        </div>
    </div>
    <!-- Account-Page /- -->
@endsection