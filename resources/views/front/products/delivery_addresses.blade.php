{{-- This page is 'include'-ed in front/products/checkout.blade.php, and will be used by jQuery AJAX to reload it, check front/js/custom.js --}}


    <!-- Form-Fields /- -->
    <h4 class="section-h4 deliveryText">Add New Delivery Address</h4> {{-- We created that deliveryText CSS class to use the HTML element as a handle for jQuery to change the <h4> content when clicking the Edit button --}}
    <div class="u-s-m-b-24">
        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">


        
        
        @if (count($deliveryAddresses) > 0) {{-- Checking if there are any $deliveryAddreses for the currently authenticated/logged-in user --}} {{-- $deliveryAddresses variable is passed in from checkout() method in Front/ProductsController.php --}}
            <label class="label-text newAddress" for="ship-to-different-address">Ship to a different address?</label>
        @else {{-- if there're no already existing delivery addresses --}}
            <label class="label-text newAddress" for="ship-to-different-address">Check to add Delivery Address</label>
        @endif

    </div>
    <div class="collapse" id="showdifferent">
        <!-- Form-Fields -->

        {{-- Note: To show the form's Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend), we create a <p> tag after every <input> field --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
        <form id="addressAddEditForm" action="{{url('save-delivery-address')}}" method="post">
            @csrf


           
            <div class="row">
                <div class="col-6">
                    <label for="delivery_name">Name
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_name" name="delivery_name">
                    @error('delivery_name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                         {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                </div>
                <div class="col-6">
                    <label for="delivery_address">Address
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_address" name="delivery_address">
                    @error('delivery_address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                             {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="delivery_city">City
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_city" name="delivery_city">
                    @error('delivery_city')
                    <span class="text-danger">{{$message}}</span>
                @enderror                      {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
                <div class="col-6">
                    <label for="delivery_state">State
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_state" name="delivery_state">
                    @error('delivery_state')
                    <span class="text-danger">{{$message}}</span>
                @enderror                       {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label for="select-country-extra">Country
                        <span class="astk">*</span>
                    </label>
                    <div class="select-box-wrapper">
                        <select class="form-control" id="delivery_country" name="delivery_country">
                            <option value="">Select Country</option>
    
                            @foreach ($countries as $country) {{-- $countries was passed from UserController to view using compact() method --}}
                                <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                            @endforeach
    
                        </select>
                        @error('delivery_country')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                    {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                    </div>
                </div>
                <div class="col-6">
                    <label for="delivery_pincode">Pincode
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_pincode" name="delivery_pincode">
                    @error('delivery_pincode')
                    <span class="text-danger">{{$message}}</span>
                @enderror                     {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <label for="delivery_mobile">Mobile
                        <span class="astk">*</span>
                    </label>
                    <input class="form-control" type="text" id="delivery_mobile" name="delivery_mobile">
                    @error('delivery_mobile')
                        <span class="text-danger">{{$message}}</span>
                    @enderror                   {{-- This <p> tag will be used by jQuery to show the Validation Error Messages (Laravel's Validation Error Messages) from the AJAX call response from the server (backend) --}} {{-- We structure and use a certain pattern so that the <p> id pattern must be like: delivery-x (e.g. delivery-mobile, delivery-email, ... in order for the jQuery loop to work. And x must be identical to the 'name' HTML attributes (e.g. the <input> with the    name='mobile'    HTML attribute must have a <p> with an id HTML attribute    id="delivery-mobile"    ) so that when the vaildation errors array is sent as a response from backend/server (check $validator->messages()    inside    the method inside the controller) to the AJAX request, they could conveniently/easily be handled by the jQuery $.each() loop. Check front/js/custom.js) --}}                    
                </div>
            </div>
            
                <button style="margin-left: 0px;" type="submit" class="coupon__code--field__btn primary__btn mt-4">Add New Address</button> {{-- Save whether it's Add or Edit --}} 

        </form>

        <!-- Form-Fields /- -->



    </div>
 