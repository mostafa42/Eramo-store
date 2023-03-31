@extends('user.layout.guest')

@section('content')

<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="checkout-page">
            <div class="checkout-form">
                <form>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-title">
                                <h3>Billing Details</h3>
                            </div>
                            <div class="row check-out">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Name</div>
                                    <input type="text" name="field-name" value="{{ $user->name }}" disabled
                                        placeholder="">
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <div class="field-label">Phone</div>
                                    <input type="text" name="field-name" disabled value="{{ $user->phone }}"
                                        placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Email Address</div>
                                    <input type="text" name="field-name" value="{{ $user->email }}" disabled
                                        placeholder="">
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="country_id">Country</label>
                                    <select name="country_id" class="form-control" id="country">
                                        <option value="">Choose Country ----</option>
                                        @foreach ($countries as $county)
                                        <option value="{{ $county->id }}">{{ $county->title_en }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="city_id">City</label>
                                    <select name="city_id" class="form-control" id="cities">

                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <label for="region_id">Region</label>
                                    <select name="region_id" class="form-control" id="regions">

                                    </select>
                                </div>
                                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                    <div class="field-label">Address</div>
                                    <select name="user_address">
                                        @foreach ($user->addresses as $address)
                                        <option value="">{{ $address->flat }} - {{ $address->address }} - {{
                                            $address->city->title_en }} - {{ $address->country->title_en }}</option>
                                        @endforeach
                                    </select>
                                    <a href="" style="color: #bfb521">add new address</a>
                                </div>
                                <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                    <div class="field-label">Coupon</div>
                                    <input type="text" name="field-name" value="" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="checkout-details">
                                <div class="order-box">
                                    <div class="title-box">
                                        <div>Order Details</div>
                                    </div>
                                    <?php $taxes = 0 ; ?>
                                    @foreach ($cart as $item)
                                    <ul class="qty">
                                        <h3 style="font-weight: bold">product details</h3><br>
                                        <li style="margin-left: 30px">product name<span style="font-weight: bold"> {{
                                                $item->product->title_en }} </span></li>
                                        <li style="margin-left: 30px">price<span> {{ $item->product->real_price }} EG
                                            </span></li>
                                        <li style="margin-left: 30px">qunatity<span> {{ $item->quantity }} items</span>
                                        </li>
                                        <li style="margin-left: 30px">price without taxes<span> {{
                                                $item->product->real_price * $item->quantity }} EG </span></li>
                                        <h3 style="font-weight: bold">Taxes Details</h3><br>
                                        @if ( $item->product->taxes->count() > 0)
                                            @foreach ($item->product->taxes as $taxe)
                                            <?php $taxes += $item->product->real_price * ( $taxe->percentage / 100 ) ; ?>
                                            <li style="margin-left: 30px">{{ $taxe->title_en }} ( {{ $taxe->percentage }} %)
                                                <span>{{ $item->product->real_price * ( $taxe->percentage / 100 ) }}
                                                    EG</span></li>
                                            @endforeach
                                        @else 
                                            <li style="margin-left: 30px">no taxes</li>
                                            <?php $taxes = 0 ; ?>    
                                        @endif
                                        <hr>
                                        <li style="margin-left: 30px">price with taxes<span> {{ ($item->product->real_price * $item->quantity) + $taxes }} EG </span></li>
                                    </ul>
                                    <?php $taxes = 0 ; ?>    
                                    @endforeach
                                    <ul class="total">
                                        <li>Total <span class="count">$620.00</span></li>
                                    </ul>
                                </div>
                                <div class="payment-box">
                                    <div class="upper-box">
                                        <div class="payment-options">
                                            <ul>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-1"
                                                            checked="checked">
                                                        <label for="payment-1">Check Payments<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="radio-option">
                                                        <input type="radio" name="payment-group" id="payment-2">
                                                        <label for="payment-2">Cash On Delivery<span
                                                                class="small-text">Please send a check to Store
                                                                Name, Store Street, Store Town, Store State /
                                                                County, Store Postcode.</span></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-end"><a href="#" class="btn-solid btn">Place Order</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Section ends -->

<!-- footer start -->
<footer class="footer-light footer-expand pb-0">
    <div class="section-t-space section-b-space light-layout">
        <div class="container">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>about</h4>
                    </div>
                    @foreach ($main_section_footer as $main_section_footer)
                    <div class="footer-contant">
                        <div class="footer-logo"><img src="{{ $main_section_footer->logo }}" alt="">
                        </div>
                        <p>{{ $main_section_footer->description }}</p>
                        <ul class="store-details">
                            <li><a href="{{ $main_section_footer->google_store_link }}"><img
                                        src="../assets/images/store/google.png" class="img-fluid" alt=""></a></li>
                            <li><a href="{{ $main_section_footer->app_store_link }}"><img
                                        src="../assets/images/store/app.png" class="img-fluid" alt=""></a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
                <div class="col offset-xxl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>my account</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach ($my_account_section as $my_account_section)
                                <li><a href="{{ $my_account_section->link_en }}">{{ $my_account_section->title_en }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>why we choose</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                @foreach ($why_we_choose as $why_we_choose)
                                <li><a href="{{ $why_we_choose->link_en }}">{{ $why_we_choose->title_en }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>store information</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">
                                @foreach ($store_info as $store_info)
                                <li><i class="fa fa-map-marker"></i>{{ $store_info->location }}</li>
                                <li><i class="fa fa-phone"></i>Call Us: {{ $store_info->phone }}</li>
                                <li><i class="fa fa-envelope"></i>Email Us: <a href="{{ $store_info->email }}">{{
                                        $store_info->email }}</a>
                                </li>
                                <li><i class="fa fa-fax"></i>Fax: {{ $store_info->fax }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2023 powered by
                            Eramo</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>
                            <li>
                                <a href="#"><img src="../assets/images/icon/visa.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/mastercard.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/paypal.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/american-express.png" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="../assets/images/icon/discover.png" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

@endsection