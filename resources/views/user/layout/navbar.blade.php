<style>
    #toast-container>.toast-custom {
        content: "\f00C";
    }

    /* this will set the toastr style */
    .toast-custom {
        background-color: #206664;
    }
</style>
<!-- loader start -->
<div class="loader_skeleton">
    <div class="top-panel-adv">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-10">
                    <div class="panel-left-content">
                        <h4 class="mb-0">Welcome to {{ App\Models\TopNavbar::first()->welcome_to }}!! Delivery in
                            <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span>
                        </h4>
                        <div class="delivery-area d-md-block d-none">
                            <div>
                                <h5>Limited Time offer</h5>
                                <h4>code: {{ App\Models\TopNavbar::first()->code }}</h4>
                                <input type="text"
                                    value="{{ App\Models\Product::orderBy('real_price', 'desc')->first() ? App\Models\Product::orderBy('real_price', 'desc')->first()->real_price : '' }}"
                                    id="highest_price" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
                </div>
            </div>
        </div>
    </div>
    <header class="style-light header-compact">
        <div class="top-header top-header-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact">
                            <ul>
                                <li>Welcome to Our store {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                                <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul class="header-dropdown">
                            <li class="mobile-wishlist pe-0"><a href="#"><i class="fa fa-heart"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                                My Account
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="index.html"><img src="{{ asset('' . App\Models\Navbar::first()->logo . '') }}"
                                        width="100px" class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div>
                            <form class="form_search" role="form" method="POST" action="{{ url('search') }}">
                                @csrf
                                <input id="query search-autocomplete" type="search"
                                    placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                    aria-expanded="true" name="term">
                                <button type="submit" name="nav-submit-button" class="btn-search">
                                    <i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search d-xl-none d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-search" onclick="openSearch()"></i></div>
                                        </li>
                                        <li class="onhover-div mobile-setting d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/setting.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-settings"></i></div>
                                            <div class="show-div setting">
                                                <h6>language</h6>
                                                <ul>
                                                    <li><a href="#">english</a></li>
                                                    <li><a href="#">french</a></li>
                                                </ul>
                                                <h6>currency</h6>
                                                <ul class="list-inline">
                                                    <li><a href="#">euro</a></li>
                                                    <li><a href="#">rupees</a></li>
                                                    <li><a href="#">pound</a></li>
                                                    <li><a href="#">doller</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="onhover-div mobile-cart d-sm-inline-block d-none">
                                            <div><img src="../assets/images/icon/cart.png"
                                                    class="img-fluid blur-up lazyload" alt=""><i
                                                    class="ti-shopping-cart"></i></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-part bottom-light">
            <div class="container">
                <div class="row">
                    <div class="col-12 menu-row">
                        <div data-bs-toggle="modal" data-bs-target="#deliveryarea"
                            class="delivery-area d-md-flex d-none">
                            <i data-feather="map-pin"></i>
                            <div>
                                <h6>Delivery to</h6>
                                {{-- <h5>400520</h5> --}}
                            </div>
                        </div>
                        <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                            <div>
                                <h5>Call us: {{ App\Models\Navbar::first()->call_us }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="small-slider">
        <div class="home-slider">
            <div class="home"></div>
        </div>
    </div>
    <section class="vegetables-category">
        <div class="container">
            <div class="vector-slide-8 no-arrow slick-default-margin ratio_square">
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
                <div class="">
                    <div class="category-boxes">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="collection-banner banner-padding">
        <div class="container">
            <div class="row partition3">
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ldr-bg">
                        <div class="contain-banner banner-3">
                            <div>
                                <h4></h4>
                                <h2></h2>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- loader end -->


<!-- top panel start -->
<div class="top-panel-adv">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-10">
                <div class="panel-left-content">
                    <h4 class="mb-0"> Welcome to {{ App\Models\TopNavbar::first()->welcome_to }}!! Delivery in
                        <span>{{ App\Models\TopNavbar::first()->deliver_in }}.</span>
                    </h4>
                    <div class="delivery-area d-md-block d-none">
                        <div>
                            <h5>Limited Time offer</h5>
                            <h4>code: {{ App\Models\TopNavbar::first()->code }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <a href="javascript:void(0)" class="close-btn"><i data-feather="x"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- top panel end -->


<!-- header start -->
<header id="sticky-header" class="style-light header-compact">
    <div class="mobile-fix-option"></div>
    <div class="top-header top-header-theme">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-contact">
                        <ul>
                            <li>Welcome to Our store {{ App\Models\TopNavbar::first()->welcome_to }}</li>
                            <li><a href="become-vendor.html" class="text-white fw-bold">Become a Vendor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 text-end">
                    <ul class="header-dropdown">
                        <li class="mobile-wishlist pe-0"><a href="#"><i class="fa fa-heart"
                                    aria-hidden="true"></i></a>
                        </li>
                        @if (auth()->user())
                            <li class="mobile-wishlist pe-0">
                                <a href="{{ url('compare') }}">
                                    <i class="ti-reload" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red; border-radius: 10%; padding: 5px; font-weight: bold"
                                        id="compare_list_count">
                                        {{ App\Models\CompareList::where('user_id', auth()->user()->id)->count() }}
                                    </span>
                                @else
                            <li class="mobile-wishlist pe-0">
                                <a href="{{ url('compare') }}">
                                    <i class="ti-reload" aria-hidden="true"></i>
                                    <span class=""
                                        style="background-color: red; border-radius: 10%; padding: 5px; font-weight: bold"
                                        id="compare_list_count">
                                        {{ App\Models\CompareList::where('user_id', \Request::ip())->count() }}
                                    </span>
                                </a>
                        @endif
                        </li>
                        <li class="onhover-dropdown mobile-account"><i class="fa fa-user" aria-hidden="true"></i>
                            My Account
                            <ul class="onhover-show-div">
                                @if (auth()->user())
                                    <li><a href="{{ url('/profile') }}">Profile</a></li>
                                    <li><a href="{{ url('logout') }}">Logout</a></li>
                                @else
                                    <li><a href="{{ url('/login') }}">Login</a></li>
                                    <li><a href="{{ url('sign-up') }}">Register</a></li>
                                @endif

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-menu">
                    <div class="menu-left">
                        <div class="brand-logo">
                            <a href="{{ url('/') }}"><img
                                    src="{{ asset('' . App\Models\Navbar::first()->logo . '') }}"
                                    class="img-fluid blur-up lazyload" alt=""></a>
                        </div>
                    </div>
                    <div>
                        <form class="form_search" role="form" method="GET" action="{{ url('search') }}">
                            @csrf
                            <input id="query search-autocomplete" type="text"
                                placeholder="Search any Device or Gadgets..." class="nav-search nav-search-field"
                                aria-expanded="true" name="term">
                            <button type="submit" name="nav-submit-button" class="btn-search">
                                <i class="ti-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="menu-right pull-right">
                        <div>
                            <div class="icon-nav">
                                <ul>
                                    <li class="onhover-div mobile-search d-xl-none d-inline-block">
                                        <div><img src="../assets/images/icon/search.png" onclick="openSearch()"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-search" onclick="openSearch()"></i></div>
                                        <div id="search-overlay" class="search-overlay">
                                            <div><span class="closebtn" onclick="closeSearch()"
                                                    title="Close Overlay">×</span>
                                                <div class="overlay-content">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <form>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            id="exampleInputPassword1"
                                                                            placeholder="Search a Product">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary"><i
                                                                            class="fa fa-search"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-setting">
                                        <div><img src="../assets/images/icon/setting.png"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-settings"></i></div>
                                        <div class="show-div setting">
                                            <h6>language</h6>
                                            <ul>
                                                <li><a href="#">english</a></li>
                                                <li><a href="#">french</a></li>
                                            </ul>
                                            <h6>currency</h6>
                                            <ul class="list-inline">
                                                <li><a href="#">euro</a></li>
                                                <li><a href="#">rupees</a></li>
                                                <li><a href="#">pound</a></li>
                                                <li><a href="#">doller</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="onhover-div mobile-cart">
                                        <div><img src="../assets/images/icon/cart.png"
                                                class="img-fluid blur-up lazyload" alt=""><i
                                                class="ti-shopping-cart"></i>
                                            @if (auth()->user())
                                                <span id="cart_list_count"
                                                    style="background-color: red; color:#fff ; padding: 5px 10px; border-radius: 10px">{{ App\Models\Cart::where('user_id', auth()->user()->id)->count() }}</span>
                                            @else
                                                <span id="cart_list_count"
                                                    style="background-color: red; color:#fff ; padding: 5px 10px; border-radius: 10px">{{ App\Models\Cart::where('user_id', \Request::ip())->count() }}</span>
                                            @endif

                                        </div>
                                        <ul class="show-div shopping-cart">
                                            <div id="my_cart_pop_up">
                                                @if (auth()->user())
                                                    <?php $x = 0; ?>
                                                    @if (App\Models\Cart::where('user_id', auth()->user()->id)->latest()->count() > 0)
                                                        @foreach (App\Models\Cart::where('user_id' , auth()->user()->id )->latest()->get() as $item)
                                                            <li>
                                                                <div class="media">

                                                                    <a href="#"><img alt=""
                                                                            class="me-3"
                                                                            src="{{ $item->product->primary_image_url }}"
                                                                            width="50px"></a>
                                                                    <div class="media-body">
                                                                        <a href="#">
                                                                            <h4>{{ $item->product->title_en }}</h4>
                                                                        </a>
                                                                        <h4><span>{{ $item->quantity }} x
                                                                                {{ $item->product->real_price }}</span>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <?php $x += $item->quantity * $item->product->real_price; ?>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <h4 style="text-align: center">Cart is Empty</h4>
                                                    @endif
                                                @else
                                                    <?php $x = 0; ?>
                                                    @if (App\Models\Cart::where('user_id', \Request::ip())->latest()->count() > 0)
                                                        @foreach (App\Models\Cart::where('user_id', \Request::ip())->latest()->get() as $item)
                                                            <li>
                                                                <div class="media">

                                                                    <a href="#"><img alt=""
                                                                            class="me-3"
                                                                            src="{{ $item->product->primary_image_url }}"
                                                                            width="50px"></a>
                                                                    <div class="media-body">
                                                                        <a href="#">
                                                                            <h4>{{ $item->product->title_en }}</h4>
                                                                        </a>
                                                                        <h4><span>{{ $item->quantity }} x
                                                                                {{ $item->product->real_price }}</span>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                                <?php $x += $item->quantity * $item->product->real_price; ?>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <h4 style="text-align: center">Cart is Empty</h4>
                                                    @endif
                                                @endif
                                            </div>

                                            <li>
                                                <div class="total">
                                                    <h5>subtotal : <span class="sub_total_model">{{ $x }}
                                                            EGP</span></h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="buttons">
                                                    <a href="{{ url('cart') }}" class="view-cart">view cart</a>
                                                    <a href="#" class="checkout">checkout</a>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-part bottom-light">
        <div class="container">
            <div class="row">
                <div class="col-12 menu-row">
                    <div data-bs-toggle="modal" data-bs-target="#deliveryarea"
                        class="delivery-area d-md-flex d-none">
                        <i data-feather="map-pin"></i>
                        <div>
                            <h6>Delivery to</h6>
                            {{-- <h5>400520</h5> --}}
                        </div>
                    </div>
                    <div class="main-nav-center">
                        <nav id="main-nav" class="text-start">
                            <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                            <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                <li>
                                    <div class="mobile-back text-end">Back<i class="fa fa-angle-right ps-2"
                                            aria-hidden="true"></i></div>
                                </li>
                                <li><a href="{{ url('/') }}">Home</a></li>
                                {{-- <li>
                                    <a href="#">Products</a>
                                    <ul style="width: auto !important;">
                                        @foreach (App\Models\Product::latest()->limit(5)->get() as $product)
                                        <li><a href="category-page(top-filter).html">{{ $product->title_en }}</a></li>
                                        @endforeach
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="#">Categories</a>
                                    <ul style="width: 1000px !important ;">
                                        @foreach (App\Models\ProductCategory::get() as $category)
                                            @if ($category->sub_catagories->count() > 0)
                                                <li>
                                                    <a href="#">{{ $category->title_en }}</a>
                                                    <ul>
                                                        @foreach ($category->sub_catagories as $sub)
                                                            <li><a href="product-page.html">{{ $sub->title_en }}</a>
                                                            </li>
                                                </li>
                                            @endforeach
                                    </ul>
                                </li>
                            @else
                                <li><a>{{ $category->title_en }}</a></li>
                                @endif
                                @endforeach
                            </ul>
                            </li>
                            <li><a href="#">About Store</a></li>
                            <li><a href="#">Questions and Requests</a></li>
                            <li><a href="#">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="delivery-area d-xl-flex d-none ms-auto me-0">
                        <div>
                            <h5>Call us: {{ App\Models\Navbar::first()->call_us }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
