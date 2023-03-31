@extends('user.layout.guest')

@section('content')

<!-- section start -->
<section class="cart-section section-b-space" style="">
    @if ($cart_list->count() > 0)
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="cart_counter">
                    <div class="countdownholder">
                        Your cart will be expired in<span id="timer"></span> minutes!
                    </div>
                    <a href="checkout.html" class="cart_checkout btn btn-solid btn-xs">check out</a>
                </div>
            </div>
            <div class="col-sm-12 table-responsive-xs"  style="overflow-y: scroll; padding: 20px">
                <table class="table cart-table">
                    <thead>
                        <tr class="table-head">
                            <th scope="col">image</th>
                            <th scope="col">product name</th>
                            <th scope="col">price</th>
                            <th scope="col">quantity</th>
                            <th scope="col">Taxes (%)</th>
                            <th scope="col">Taxes (EG)</th>
                            <th scope="col">action</th>
                            <th scope="col">total</th>
                        </tr>
                    </thead>
                    <?php $total_price = 0 ; ?>
                    <?php $total_taxes = 0 ; ?>
                    @foreach ($cart_list as $item)
                    <tbody class="main_tbody">
                        <tr>
                            <td>
                                <a href="#"><img src="{{ $item->product->primary_image_url }}" alt=""></a>
                            </td>
                            <td><a href="#">{{ $item->product->title_en }}</a>
                                <div class="mobile-cart-content row">
                                    <div class="col">
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <input type="text" name="quantity" class="form-control input-number"
                                                    value="1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color">{{ $item->product->real_price }} EG</h2>
                                    </div>
                                    <div class="col">
                                        <h2 class="td-color"><a href="{{ $item->id }}" class="icon"><i
                                                    class="ti-close"></i></a>
                                        </h2>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h2>{{ $item->product->real_price }} EG</h2>
                            </td>
                            <td>
                                <div class="qty-box">
                                    <div class="input-group">
                                        <input type="number" name="quantity" class="form-control input-number qty_input"
                                            value="{{ $item->quantity }}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($item->product->taxes->count() > 0)
                                @foreach ($item->product->taxes as $taxe)
                                <p>{{ $taxe->title_en }} <span style="margin-left: 10px; font-size: 20px"
                                        class="badge bg-secondary"> {{ $taxe->percentage }} % </span></p>
                                <hr>
                                @endforeach
                                @else
                                <h6>no taxes</h6>
                                @endif
                            </td>
                            <td>
                                
                                @if ($item->product->taxes->count() > 0)
                                @foreach ($item->product->taxes as $taxe)
                                    <p><span style="margin-left: 10px; font-size: 20px"
                                            class="badge bg-secondary"> {{ ($taxe->percentage / 100) *
                                            ($item->product->real_price * $item->quantity) }} EG </span></p>
                                    <hr>
                                    <?php $total_taxes += ($taxe->percentage / 100) * ($item->product->real_price * $item->quantity) ; ?>
                                @endforeach
                                @else
                                <h6>no taxes</h6>
                                @endif
                            </td>
                            <td><a href="{{ url('delete-item-cart/' . $item->id) }}" class="icon"><i
                                        class="ti-close"></i></a></td>
                            <td>
                                <h2 class="td-color this_price_based_on_qty_input">
                                    {{ ($item->product->real_price * $item->quantity) + $total_taxes }} EG</h2>
                            </td>
                        </tr>
                    </tbody>
                    <?php $total_price += $item->product->real_price * $item->quantity ?>
                    <?php $total_taxes = 0 ; ?>
                    @endforeach

                </table>
                <div class="table-responsive-md">
                    <table class="table cart-table ">
                        <tfoot>
                            <tr>
                                <td>total price :</td>
                                <td>
                                    <h2>{{ $total_price }} EG</h2>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="row cart-buttons">
            <div class="col-6"><a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a></div>
            <div class="col-6"><a href="{{ url('/checkout-step1') }}" class="btn btn-solid">check out</a></div>
        </div>
    </div>
    @else
    <h3 style="text-align: center">Cart is Empty</h3>
    <div class="row cart-buttons">
        <div class="col-6"><a href="{{ url('/') }}" class="btn btn-solid">continue shopping</a></div>
    </div>
    @endif


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