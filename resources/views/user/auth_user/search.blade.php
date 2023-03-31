@extends('user.layout.authes')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">collection</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <input type="text" value="{{ $term }}" id="search_term" hidden>

    <input type="text" id="product_id_compare_list" hidden>

    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 collection-filter">
                        <!-- side-bar colleps block stat -->
                        <div class="collection-filter-block">
                            <!-- brand filter start -->
                            <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left"
                                        aria-hidden="true"></i> back</span></div>
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">brand</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        @foreach ($brands as $brand)
                                            <div class="form-check collection-filter-checkbox">
                                                <input type="checkbox" class="form-check-input checkbox_brands"
                                                    name="brands_choices" value="{{ $brand->id }}">
                                                <label class="form-check-label"
                                                    for="zara">{{ $brand->title_en }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- color filter start here -->
                            <div class="collection-collapse-block open">
                                <h3 class="collapse-block-title">colors</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="color-selector">
                                        <ul>
                                            <li class="color-1 active"></li>
                                            <li class="color-2"></li>
                                            <li class="color-3"></li>
                                            <li class="color-4"></li>
                                            <li class="color-5"></li>
                                            <li class="color-6"></li>
                                            <li class="color-7"></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- size filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">size</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="collection-brand-filter">
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="hundred">
                                            <label class="form-check-label" for="hundred">s</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="twohundred">
                                            <label class="form-check-label" for="twohundred">m</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="threehundred">
                                            <label class="form-check-label" for="threehundred">l</label>
                                        </div>
                                        <div class="form-check collection-filter-checkbox">
                                            <input type="checkbox" class="form-check-input" id="fourhundred">
                                            <label class="form-check-label" for="fourhundred">xl</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- price filter start here -->
                            <div class="collection-collapse-block border-0 open">
                                <h3 class="collapse-block-title">price</h3>
                                <div class="collection-collapse-block-content">
                                    <div class="wrapper mt-3">
                                        <div class="range-slider">
                                            <input type="text" disabled class="js-range-slider" value=""
                                                id="price_filter" />
                                        </div>
                                    </div>
                                </div>
                                <br><button class="btn btn-primary form-control"
                                    style="background-color: #bfb521; border:#bfb521; outline: none"
                                    id="filter_btn">Filter</button><br>
                            </div>

                        </div>
                        <!-- silde-bar colleps block end here -->
                        <!-- side-bar single product slider start -->
                        <div class="theme-card">
                            <h5 class="title-border">new product</h5>
                            <div class="offer-slider slide-1">
                                <div>
                                    @foreach ($first_three_new_products as $first_three_new_products)
                                        <div class="media">
                                            <a href="">
                                                <img class="img-fluid blur-up lazyload"
                                                    src="{{ $first_three_new_products->primary_image_url }}" alt="">
                                            </a>
                                            <div class="media-body align-self-center">
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>{{ $first_three_new_products->title_en }}</h6>
                                                </a>
                                                <h4>{{ $first_three_new_products->real_price }} EG</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div>
                                    @foreach ($last_three_new_products as $last_three_new_products)
                                        <div class="media">
                                            <a href="">
                                                <img class="img-fluid blur-up lazyload"
                                                    src="{{ $last_three_new_products->primary_image_url }}" alt="">
                                            </a>
                                            <div class="media-body align-self-center">
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>{{ substr($last_three_new_products->title_en, 0, 20) }}</h6>
                                                </a>
                                                <h4>{{ $last_three_new_products->real_price }} EG</h4>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- side-bar single product slider end -->
                        <!-- side-bar banner start here -->
                        <div class="collection-sidebar-banner">
                            @foreach ($under_adv as $under_adv)
                                <a href="{{ $under_adv->link }}"><img src="{{ $under_adv->image }}"
                                        class="img-fluid blur-up lazyload" alt=""></a>
                            @endforeach
                        </div>
                        <!-- side-bar banner end here -->
                    </div>
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    @foreach ($top_adv as $top_adv)
                                        <div class="top-banner-wrapper">
                                            <a href="{{ $top_adv->link }}"><img src="{{ $top_adv->main_image }}"
                                                    class="img-fluid blur-up lazyload" alt=""></a>
                                            <div class="top-banner-content small-section">
                                                <h4> {{ $top_adv->title }} </h4>
                                                <p>{{ $top_adv->description }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <div class="filter-main-btn"><span class="filter-btn btn btn-theme"><i
                                                                class="fa fa-filter" aria-hidden="true"></i> Filter</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="product-filter-content">
                                                        <div class="search-count">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
                                                        </div>
                                                        <div class="collection-view">
                                                            <ul>
                                                                <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                <li><i class="fa fa-list-ul list-layout-view"></i></li>
                                                            </ul>
                                                        </div>
                                                        <div class="collection-grid-view">
                                                            <ul>
                                                                <li><img src="../assets/images/icon/2.png" alt=""
                                                                        class="product-2-layout-view"></li>
                                                                <li><img src="../assets/images/icon/3.png" alt=""
                                                                        class="product-3-layout-view"></li>
                                                                <li><img src="../assets/images/icon/4.png" alt=""
                                                                        class="product-4-layout-view"></li>
                                                                <li><img src="../assets/images/icon/6.png" alt=""
                                                                        class="product-6-layout-view"></li>
                                                            </ul>
                                                        </div>
                                                        <div class="product-page-per-view">
                                                            <select>
                                                                <option value="High to low">24 Products Par Page
                                                                </option>
                                                                <option value="Low to High">50 Products Par Page
                                                                </option>
                                                                <option value="Low to High">100 Products Par Page
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="product-page-filter">
                                                            <select>
                                                                <option value="High to low">Sorting items</option>
                                                                <option value="Low to High">50 Products</option>
                                                                <option value="Low to High">100 Products</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res" id="product_filter_content">
                                                @foreach ($matching as $item)
                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">
                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="#"><img
                                                                            src="{{ $item->primary_image_url }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="back">
                                                                    <a href="#"><img
                                                                            src="{{ $item->primary_image_url }}"
                                                                            class="img-fluid blur-up lazyload bg-img"
                                                                            alt=""></a>
                                                                </div>
                                                                <div class="cart-info cart-wrap">
                                                                    <button data-bs-toggle="modal"
                                                                        data-bs-target="#addtocart" title="Add to cart"><i
                                                                            class="ti-shopping-cart"></i></button> <a
                                                                        href="javascript:void(0)"
                                                                        title="Add to Wishlist"><i class="ti-heart"
                                                                            aria-hidden="true"></i></a> <a href="#"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#quick-view" title="Quick View"><i
                                                                            class="ti-search" aria-hidden="true"></i></a>
                                                                    <a  onclick="add_to_compare_list({{ $item->id }})" href="javascript:void(0)" title="Compare"><i
                                                                            class="ti-reload" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="product-detail">
                                                                <div>
                                                                    <a href="product-page(no-sidebar).html">
                                                                        <h6>{{ $item->title_en }}</h6>
                                                                    </a>
                                                                    <h6>{{ $item->category->title_en }}</h6>
                                                                    <p>
                                                                        {{ $item->description_en }}
                                                                    </p>
                                                                    <h4>{{ $item->real_price }} EGP <span></span>
                                                                        <del>{{ $item->_price }}</del></h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        {{-- <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="row">
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <nav aria-label="Page navigation">
                                                            <ul class="pagination">
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Previous"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-left"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Previous</span></a></li>
                                                                <li class="page-item active"><a class="page-link"
                                                                        href="#">1</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">2</a></li>
                                                                <li class="page-item"><a class="page-link"
                                                                        href="#">3</a></li>
                                                                <li class="page-item"><a class="page-link" href="#"
                                                                        aria-label="Next"><span aria-hidden="true"><i
                                                                                class="fa fa-chevron-right"
                                                                                aria-hidden="true"></i></span> <span
                                                                            class="sr-only">Next</span></a></li>
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                    <div class="col-xl-6 col-md-6 col-sm-12">
                                                        <div class="product-search-count-bottom">
                                                            <h5>Showing Products 1-24 of 10 Result</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section End -->

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


@endsection
