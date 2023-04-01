@extends('user.layout.guest')

@section('content')
    <!-- Home slider -->
    <section class="p-0 small-slider">
        @foreach ($main_sliders as $main_slider)
            <div class="slider-animate home-slider">
                <div>
                    <div class="home">
                        <img src="{{ asset($main_slider->main_image) }}" alt=""
                            class="bg-img blur-up lazyload">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="slider-contain product-detail">
                                        <div>
                                            <h4 class="animated" data-animation-in="fadeInUp">
                                                {{ $main_slider->intro_title }}</h4>
                                            <h1 class="animated" data-animation-in="fadeInUp" data-delay-in="0.3">
                                                {{ $main_slider->big_text }}</h1>
                                            <p class="animated d-lg-block d-none" data-delay-in="0.4"
                                                data-animation-in="fadeInUp" style="color: #fff">
                                                {{ substr($main_slider->description, 0, 100) }}</p>
                                            <a href="{{ $main_slider->link }}" target="_blank"
                                                class="btn btn-solid animated rounded-3" data-animation-in="fadeInUp"
                                                data-delay-in="0.5">shop
                                                now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>
    <!-- Home slider end -->


    <!-- category section start -->
    <section class="vegetables-category">
        <div class="container">
            <div class="vector-slide-8 no-arrow slick-default-margin ratio_square">
                @foreach ($categories as $category)
                    <div class="">
                        <a href="">
                            <div class="category-boxes">
                                <div class="img-sec">
                                    <img src="{{ $category->image_url }}" class="img-fluid" alt="">
                                </div>
                                <h6>{{ $category->title_en }}</h6>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- category section end -->

    <!-- banner section start -->
    <section class="banner-goggles banner-offer ratio2_1">
        <div class="container">
            <div class="row g-4">
                @foreach ($first_advs as $first_adv)
                    <div class="col-lg-4">
                        <a href="{{ $first_adv->link }}">
                            <div class="collection-banner p-right text-end">
                                <div class="img-part">
                                    <img src="{{ asset('' . $first_adv->main_image . '') }}"
                                        class="img-fluid blur-up lazyload bg-img" alt="">
                                </div>

                                <div class="contain-banner white-content banner-3">
                                    <div>
                                        <h4> {{ $first_adv->small_text }} </h4>
                                        <h2 class="mb-1"> {{ $first_adv->big_text }} </h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- banner section end -->

    <!-- first two product slider start -->
    @foreach ($first_two_categories as $ftcategory)
        <section class="bag-product ratio_square">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title8">
                            <h2>{{ $ftcategory->title_en }}</h2>
                            <p>
                                @foreach ($ftcategory->sub_catagories as $subs)
                                    {{ $subs->title_en }} -
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="slide-7-demo slick-sm-margin no-arrow">
                            @foreach ($ftcategory->sub_catagories as $sub_cat)
                                @foreach ($sub_cat->products as $product)
                                    <div class="product-box product-style-4">
                                        <div class="img-wrapper">
                                            <div class="front">
                                                <a href="{{ route('product.details', $product->slug_en) }}"><img alt=""
                                                        src="{{ $product->primary_image_url }}"
                                                        class="img-fluid blur-up lazyload bg-img"></a>
                                            </div>
                                            <div class="cart-detail">
                                                <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist">
                                                                           @if(auth()->user())
                                                @if(App\Models\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first()!=null)
                                                <i class="ti-heart" aria-hidden="true" style="background-color: red" ></i>
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif                         <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist"></a> <a href="#"
                                                    data-bs-toggle="modal" data-bs-target="#quick-view"
                                                    onclick="setProductSlug({{ $product->id }})" title="Quick View"><i
                                                        class="ti-search" aria-hidden="true"></i></a> <a
                                                    onclick="add_to_compare_list({{ $product->id }})"
                                                    href="javascript:void(0)" title="Compare"><i class="ti-reload"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', $product->slug_en) }}">
                                                <h6>{{ $product->title_en }}</h6>
                                            </a>
                                            <a style="color:#000 !important">
                                                <h6>{{ $sub_cat->title_en }}</h6>
                                            </a>
                                            <h4>{{ $product->real_price }} <span></span>
                                                <del>{{ $product->fake_price }}</del>
                                            </h4>
                                            <div class="addtocart_btn">
                                                <button class="add-button add_cart" title="Add to cart" onclick="add_to_cart_list({{ $product->id }})">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn quantity-left-minus"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input type="text" name="quantity"
                                                            class="form-control input-number qty-input" value="1">
                                                        <button type="button" class="btn quantity-right-plus"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- first two product slider end -->


    <!-- Quick-view modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content quick-view-modal">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-lg-6  col-xs-12">
                            <div class="quick-view-img">
                                <img id="qv_img" src="../assets/images/pro3/1.jpg" alt=""
                                    class="img-fluid blur-up lazyload">
                            </div>
                        </div>
                        <div class="col-lg-6 rtl-text">
                            <div class="product-right">
                                <h2 id="qv_main_title"> Women Pink Shirt </h2>
                                <h3 id="qv_price">$32.96 </h3>
                                {{-- <ul class="color-variant">
                                <li class="bg-light0"></li>
                                <li class="bg-light1"></li>
                                <li class="bg-light2"></li>
                            </ul> --}}
                                <div class="border-product">
                                    <h6 class="product-title">product details</h6>
                                    <p id="qv_product_details"></p>
                                </div>
                                <div class="product-description border-product">
                                    {{-- <div class="size-box">
                                    <ul>
                                        <li class="active"><a
                                                href="javascript:void(0)">s</a>
                                        </li>
                                        <li><a href="javascript:void(0)">m</a></li>
                                        <li><a href="javascript:void(0)">l</a></li>
                                        <li><a href="javascript:void(0)">xl</a>
                                        </li>
                                    </ul>
                                </div> --}}
                                    <h6 class="product-title">quantity</h6>
                                    <div class="qty-box">
                                        <div class="input-group">
                                            <input type="number" name="quantity" class="form-control input-number"
                                                style="width: 100%; border: 1px solid #000 !important" value="1"
                                                min="1" id="quick_view_modal_qunatity">
                                        </div>
                                    </div>
                                </div>
                                <div class="product-buttons">
                                    <a href="#" class="btn btn-solid">add to
                                        cart</a>
                                    <a href="#" class="btn btn-solid">view
                                        detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick-view modal popup end-->

    <!-- gift card section start -->
    <section class="gift-card-section ratio2_1">
        <div class="container">
            <div class="card-box">
                <div class="row partition2">
                    @foreach ($second_advs as $second_adv)
                        <div class="col-md-4">
                            <a href="{{ $second_adv->link }}">
                                <div class="collection-banner p-right text-center">
                                    <div class="img-part">

                                        <img src="{{ asset('' . $second_adv->image . '') }}"
                                            class="img-fluid blur-up lazyload bg-img" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- gift card section end -->

    <input type="text" id="product_id_compare_list" hidden>
    <input type="text" id="product_id_cart_list" hidden>

    <!-- deal product start -->


    <section class="bag-product ratio_square">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title8">
                        <h2>Lowest Price</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="slide-7-demo slick-sm-margin no-arrow">
                        @foreach ($lowest_price as $lowest_price)
                            <div class="product-box product-style-4">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="{{ route('product.details', $lowest_price->slug_en) }}"><img alt=""
                                                src="{{ $lowest_price->primary_image_url }}"
                                                class="img-fluid blur-up lazyload bg-img"></a>
                                    </div>
                                    <div class="cart-detail">                                                <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist">

                                                                   @if(auth()->user())
                                                @if(App\Models\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first()!=null)
                                                <i class="ti-heart" aria-hidden="true" style="background-color: red" ></i>
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif                         <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist"></a> <a href="#"
                                            data-bs-toggle="modal" data-bs-target="#quick-view"
                                            onclick="setProductSlug({{ $lowest_price->id }})" title="Quick View"><i
                                                class="ti-search" aria-hidden="true"></i></a> <a
                                            onclick="add_to_compare_list({{ $lowest_price->id }})"
                                            href="javascript:void(0)" title="Compare"><i class="ti-reload"
                                                aria-hidden="true"></i></a></div>
                                </div>
                                <div class="product-info">
                                    <a href="{{ route('product.details', $product->slug_en) }}">
                                        <h6>{{ $lowest_price->title_en }}</h6>
                                    </a>
                                    <h6>{{ $lowest_price->category->title_en }}</h6>
                                    <h4>{{ $lowest_price->real_price }} <span></span>
                                        <del>{{ $lowest_price->fake_price }}</del>
                                    </h4>
                                    <div class="addtocart_btn">
                                        <button onclick="add_to_cart_list({{ $lowest_price->id }})" class="add-button add_cart" title="Add to cart">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                        <div class="qty-box cart_qty">
                                            <div class="input-group">
                                                <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                    data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input type="text" name="quantity"
                                                    class="form-control input-number qty-input" value="1">
                                                <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                    data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- deal product end -->


    <!-- service section start -->
    <section class="service-w-bg banner-padding theme-bg-service">
        <div class="container">
            <div class="service p-0 ">
                <div class="row margin-default">
                    @foreach ($our_features as $our_feature)
                        <div class="col-lg-3 col-sm-6 service-block">
                            <div class="media">
                                <img src="{{ asset('' . $our_feature->icon . '') }}" width="60px">
                                <div class="media-body">
                                    <h4>{{ $our_feature->title }}</h4>
                                    <p>{{ $our_feature->sub_title }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->


    <!-- last two product slider start -->
    @foreach ($last_two_categories as $ltcategory)
        <section class="bag-product ratio_square">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title8">
                            <h2>{{ $ltcategory->title_en }}</h2>
                            <p>
                                @foreach ($ltcategory->sub_catagories as $subs)
                                    {{ $subs->title_en }} -
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="slide-7-demo slick-sm-margin no-arrow">
                            @foreach ($ltcategory->sub_catagories as $sub_cat)
                                @foreach ($sub_cat->products as $product)
                                    <div class="product-box product-style-4">
                                        <div class="img-wrapper">
                                            <div class="front">
                                                <a href="{{ route('product.details', $product->slug_en) }}"><img alt=""
                                                        src="{{ $product->primary_image_url }}"
                                                        class="img-fluid blur-up lazyload bg-img"></a>
                                            </div>
                                            <div class="cart-detail">
                                                                                                <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist">

                                                                           @if(auth()->user())
                                                @if(App\Models\Wishlist::where('user_id',auth()->user()->id)->where('product_id',$product->id)->first()!=null)
                                                <i class="ti-heart" aria-hidden="true" style="background-color: red" ></i>
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif
                                                @else
                                                <i class="ti-heart" aria-hidden="true"></i>
                                                @endif                         <a href="javascript:void(0)" id="add_to_wish_list" onclick="hello({{$product->id}})" title="Add to Wishlist"></a> <a href="#"
                                                    data-bs-toggle="modal" data-bs-target="#quick-view"
                                                    onclick="setProductSlug({{ $product->id }})" title="Quick View"><i
                                                        class="ti-search" aria-hidden="true"></i></a> <a
                                                    onclick="add_to_compare_list({{ $product->id }})"
                                                    href="javascript:void(0)" title="Compare"><i class="ti-reload"
                                                        aria-hidden="true"></i></a></div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details', $product->slug_en) }}">
                                                <h6>{{ $product->title_en }}</h6>
                                            </a>
                                            <a style="color:#000 !important">
                                                <h6>{{ $sub_cat->title_en }}</h6>
                                            </a>
                                            <h4>{{ $product->real_price }} <span></span>
                                                <del>{{ $product->fake_price }}</del>
                                            </h4>
                                            <div class="addtocart_btn">
                                                <button onclick="add_to_cart_list({{ $product->id }})" class="add-button add_cart" title="Add to cart">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                                <div class="qty-box cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn quantity-left-minus"
                                                            data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input type="text" name="quantity"
                                                            class="form-control input-number qty-input" value="1">
                                                        <button type="button" class="btn quantity-right-plus"
                                                            data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- last two product slider end -->


    <!-- product slider start -->
    {{-- <section class="bag-product ratio_square">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title8">
                        <h2>grocery & staples</h2>
                        <p>atta, dal, rice and more</p>
                    </div>
                </div>
                <div class="col-12">
                    <div class="slide-7-demo slick-sm-margin no-arrow">
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/19.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/20.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/21.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/22.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/11.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/12.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/13.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-box product-style-4">
                            <div class="img-wrapper">
                                <div class="front">
                                    <a href="product-page.html"><img alt=""
                                            src="../assets/images/vegetables/pro/14.jpg"
                                            class="img-fluid blur-up lazyload bg-img"></a>
                                </div>
                                <div class="cart-detail"><a href="javascript:void(0)" title="Add to Wishlist"><i
                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                        data-bs-toggle="modal" data-bs-target="#quick-view" title="Quick View"><i
                                            class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"
                                        title="Compare"><i class="ti-reload" aria-hidden="true"></i></a></div>
                            </div>
                            <div class="product-info">
                                <a href="product-page.html">
                                    <h6>Slim Fit Cotton Shirt</h6>
                                </a>
                                <h5>1 Kg</h5>
                                <h4>$500.00</h4>
                                <div class="addtocart_btn">
                                    <button class="add-button add_cart" title="Add to cart">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn quantity-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input type="text" name="quantity"
                                                class="form-control input-number qty-input" value="1">
                                            <button type="button" class="btn quantity-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- product slider end -->


    <!-- our admins start -->

    <section class="bag-product ratio_square">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="title8">
                        <h2>Our Admins</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="slide-7-demo slick-sm-margin no-arrow">
                        @foreach ($admins as $admin)
                            <div class="product-box product-style-4">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="{{ route('product.details', $product->slug_en) }}"><img alt="" src="{{ $admin->image_url }}"
                                                class="img-fluid blur-up lazyload bg-img"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our admins end -->


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
                                                src="../assets/images/store/google.png" class="img-fluid"
                                                alt=""></a></li>
                                    <li><a href="{{ $main_section_footer->app_store_link }}"><img
                                                src="../assets/images/store/app.png" class="img-fluid"
                                                alt=""></a>
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
                                        <li><a
                                                href="{{ $my_account_section->link_en }}">{{ $my_account_section->title_en }}</a>
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
                                        <li><i class="fa fa-envelope"></i>Email Us: <a
                                                href="{{ $store_info->email }}">{{ $store_info->email }}</a>
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
                                    <a href="#"><img src="../assets/images/icon/american-express.png"
                                            alt=""></a>
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


    <!--modal popup start-->
    {{-- <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal10">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <div class="offer-content"><img src="../assets/images/Offer-banner.png"
                                            class="img-fluid blur-up lazyload" alt="">
                                        <h2>newsletter</h2>
                                        <form
                                            action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"
                                            class="auth-form needs-validation" method="post"
                                            id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                            target="_blank">
                                            <div class="form-group mx-sm-3">
                                                <input type="text" class="form-control" name="EMAIL"
                                                    id="mce-EMAIL" placeholder="Enter your email" required="required">
                                                <button type="submit" class="btn btn-solid"
                                                    id="mc-submit">subscribe</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!--modal popup end-->


    <!-- Modal -->
    <div class="modal fade" id="deliveryarea" tabindex="-1" aria-labelledby="deliveryareaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Delivery Address</h5>
                    <button type="button" class="btn-close position-relative h-auto" data-bs-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="name">Select your city to start shopping</label>
                            <select class="form-select" name="city_id" aria-label="Default select example">
                                <option selected>Select City</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->title_en}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary d-block m-auto">
                                Search
                               
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal -->


    <div class="scroll-setting-box">
        <div id="setting_box" class="setting-box">
            <a href="javascript:void(0)" class="overlay" onclick="closeSetting()"></a>
            <div class="setting_box_body">
                <div onclick="closeSetting()">
                    <div class="sidebar-back text-start"><i class="fa fa-angle-left pe-2" aria-hidden="true"></i> Back
                    </div>
                </div>
                <div class="setting-body">
                    <div class="setting-title">
                        <div>
                            <img src="../assets/images/icon/logo.png" class="img-fluid" alt="">
                            <h3>50+ <span>demos</span> <br> suit for any type of online store.</h3>
                        </div>
                    </div>
                    <div class="setting-contant">
                        <div class="row demo-section">
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-4.html" class="demo-text">
                                        <h4>Vegetables 4 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-5.html" class="demo-text">
                                        <h4>Vegetables 5 <span>New</span>
                                            <h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gradient.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gradient.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gradient.html" class="demo-text">
                                        <h4>gradient<h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="index.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="index.html" class="demo-text">
                                        <h4>fashion</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-2.html" class="demo-text">
                                        <h4>fashion 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-3.html" class="demo-text">
                                        <h4>fashion 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-4.html" class="demo-text">
                                        <h4>fashion 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-5.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-5.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-5.html" class="demo-text">
                                        <h4>fashion 5</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-6.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-6.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-6.html" class="demo-text">
                                        <h4>fashion 6</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="fashion-7.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/fashion-7.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="fashion-7.html" class="demo-text">
                                        <h4>fashion 7</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture.html" class="demo-text">
                                        <h4>furniture</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-2.html" class="demo-text">
                                        <h4>furniture 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="furniture-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/furniture-dark.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="furniture-3.html" class="demo-text">
                                        <h4>furniture dark</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-1.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-1.html" class="demo-text">
                                        <h4>electronics</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-2.html" class="demo-text">
                                        <h4>electronics 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="electronic-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/electronics-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="electronic-3.html" class="demo-text">
                                        <h4>electronics 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo.html" class="demo-text">
                                        <h4>marketplace</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-2.html" class="demo-text">
                                        <h4>marketplace 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-3.html" class="demo-text">
                                        <h4>marketplace 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marketplace-demo-4.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marketplace-4.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marketplace-demo-4.html" class="demo-text">
                                        <h4>marketplace 4</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables.html" class="demo-text">
                                        <h4>vegetables</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-2.html" class="demo-text">
                                        <h4>vegetables 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="vegetables-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/vegetables-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="vegetables-3.html" class="demo-text">
                                        <h4>vegetables 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery.html" class="demo-text">
                                        <h4>jewellery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-2.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-2.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-2.html" class="demo-text">
                                        <h4>jewellery 2</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="jewellery-3.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/jewellery-3.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="jewellery-3.html" class="demo-text">
                                        <h4>jewellery 3</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bags.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bag.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bags.html" class="demo-text">
                                        <h4>bag</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="watch.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/watch.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="watch.html" class="demo-text">
                                        <h4>watch</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="medical.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/medical.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="medical.html" class="demo-text">
                                        <h4>medical</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="perfume.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/perfume.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="perfume.html" class="demo-text">
                                        <h4>perfume</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="yoga.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/yoga.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="yoga.html" class="demo-text">
                                        <h4>yoga</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="christmas.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/christmas.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="christmas.html" class="demo-text">
                                        <h4>christmas</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="bicycle.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/bicycle.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="bicycle.html" class="demo-text">
                                        <h4>bicycle</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="marijuana.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/marijuana.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="marijuana.html" class="demo-text">
                                        <h4>marijuana</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="gym-product.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/gym.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="gym-product.html" class="demo-text">
                                        <h4>gym</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="tools.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/tools.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="tools.html" class="demo-text">
                                        <h4>tools</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="shoes.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/shoes.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="shoes.html" class="demo-text">
                                        <h4>shoes</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="books.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/books.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="books.html" class="demo-text">
                                        <h4>books</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="kids.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/kids.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="kids.html" class="demo-text">
                                        <h4>kids</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="game.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/game.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="game.html" class="demo-text">
                                        <h4>game</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="beauty.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/beauty.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="beauty.html" class="demo-text">
                                        <h4>beauty</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="left_sidebar-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/left-sidebar.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="left_sidebar-demo.html" class="demo-text">
                                        <h4>left sidebar</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video-slider.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video-slider.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video-slider.html" class="demo-text">
                                        <h4>video slider</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="metro.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/metro.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="metro.html" class="demo-text">
                                        <h4>metro</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="goggles.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/goggles.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="goggles.html" class="demo-text">
                                        <h4>goggles</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="flower.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/flower.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="flower.html" class="demo-text">
                                        <h4>flower</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="light.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/light.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="light.html" class="demo-text">
                                        <h4>light</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="nursery.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/nursery.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="nursery.html" class="demo-text">
                                        <h4>nursery</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="pets.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/pets.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="pets.html" class="demo-text">
                                        <h4>pets</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="video.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/video.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="video.html" class="demo-text">
                                        <h4>video</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="lookbook-demo.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/lookbook.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="lookbook-demo.html" class="demo-text">
                                        <h4>lookbook</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="full-page.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/full-page.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="full-page.html" class="demo-text">
                                        <h4>full page</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="instagram-shop.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/instagram.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="instagram-shop.html" class="demo-text">
                                        <h4>instagram</h4>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 col-6 text-center demo-effects">
                                <div class="set-position">
                                    <a href="parallax.html" class="layout-container">
                                        <img src="../assets/images/landing-page/demo/parallax.jpg"
                                            class="img-fluid bg-img bg-top" alt="">
                                    </a>
                                    <a href="parallax.html" class="demo-text">
                                        <h4>parallax</h4>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- theme setting -->


    <!-- Add to cart modal popup start-->
    <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="../assets/images/fashion/product/43.jpg" alt="">
                                        </a>
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="#" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="#" class="checkout btn btn-solid">Check out</a>
                                                <a href="#" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="../assets/images/payment_cart.png"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/1.jpg"
                                                                class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/34.jpg"
                                                                class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/13.jpg"
                                                                class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="../assets/images/fashion/product/19.jpg"
                                                                class="img-fluid blur-up lazyload mb-1" alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>cotton top</span></a></h6>
                                                        <h4><span>$25</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to cart modal popup end-->





    <!-- tap to top -->
    <div class="tap-top">
        <div>
            <i class="fa fa-angle-double-up"></i>
        </div>
    </div>
    <!-- tap to top End -->
@endsection
