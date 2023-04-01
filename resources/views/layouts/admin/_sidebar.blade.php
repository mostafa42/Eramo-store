<nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
    <a class="navbar-brand me-lg-5" href="{{ route('admin.dashboard') }}">
        <img class="navbar-brand-dark" src="{{ asset('uploads/app/logo.png') }}" alt="Volt logo" /> <img
            class="navbar-brand-light" src="../../assets/img/brand/dark.svg" alt="Volt logo" />
    </a>
    <div class="d-flex align-items-center">
        <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-3 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="avatar-lg me-4">
                    <img class="avatar" src="{{ asset('uploads/app/logo.png') }}"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h5 mb-3">Hi, {{ Auth::guard('admin')->user()->name }}</h2>

                </div>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="nav flex-column pt-3 pt-md-0">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link d-flex align-items-center">
                    <span class="sidebar-icon">
                        <img class="avatar" src="{{ asset('uploads/app/logo.png') }}" alt="Volt Logo">
                    </span>
                    <span class="mt-1 ms-1 sidebar-text">{{ Auth::guard('admin')->user()->roles[0]->name }}</span>
                </a>
            </li>
            <li class="nav-item    {{ Route::is('admin.dashboard') ? 'active' : '' }} ">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="sidebar-icon">

                        <i class="fa-solid fa-house-chimney-crack icon icon-xs me-2"></i>

                    </span>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>





            {{-- Products Categories --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-categories-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#product_categories"
                        aria-expanded="{{ Route::is('admin.products-categories.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-list icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Products Categories</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.products-categories.*') ? 'show' : '' }}"
                        role="list" id="product_categories" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ Route::is('admin.products-categories.*') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'main']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Main Categories</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.products-categories.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Sub Categories</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                </li>
            @endif

            {{-- Products Categories --}}

            {{-- site information --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-categories-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#site_information"
                        aria-expanded="{{ Route::is('admin.products-categories.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-list icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Site Information</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.terms-and-conditions.*') ? 'show' : '' }}"
                        role="list" id="site_information" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ Route::is('admin.contact-us.*') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                <a href="{{ route('admin.contact-us.index', ['type' => 'main']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Contact Us</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.about-us.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.about-us.index', ['type' => 'sub']) }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> About us</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.terms-and-conditions.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Terms And Conditions</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.products-categories.index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Quiries Requests</span>
                                </a>
                            </li>




                        </ul>
                    </div>

                </li>
            @endif

            {{-- site information --}}



























            {{-- site information --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-categories-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#user_front_settings"
                        aria-expanded="{{ Route::is('admin.products-categories.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-list icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">User Front Settings</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.terms-and-conditions.*') ? 'show' : '' }}"
                        role="list" id="user_front_settings" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ Route::is('admin.user-front-settings.*') && request()->type && request()->type == 'main' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.index_top_bar', ['type' => 'main']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Top Bar</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.index_navbar') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Navbar</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.main_slider', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Main Slider</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.first_advs_index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> First Advs</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.second_advs_index', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Second Advs</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.terms-and-conditions.*') && request()->type && request()->type == 'sub' ? 'active' : '' }}">
                                <a href="{{ route('admin.user-front-settings.our_features', ['type' => 'sub']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Our Features </span>
                                </a>
                            </li>




                        </ul>
                    </div>
                </li>
            @endif

            {{-- site information --}}





























































            {{-- Products  --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#products"
                        aria-expanded="{{ Route::is('admin.products.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-sharp fa-solid fa-bag-shopping icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Products </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.products.*') ? 'show' : '' }}"
                        role="list" id="products" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ (Route::is('admin.products.*') && !request()->type) || (request()->type != 'in-stock' && request()->type != 'out-of-stock') ? 'active' : '' }}">
                                <a href="{{ route('admin.products.index', ['type' => 'all']) }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">All Products</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'in-stock' ? 'active' : '' }}">
                                <a href="{{ route('admin.products.index', ['type' => 'in-stock']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">In Stock</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.products.*') && request()->type && request()->type == 'out-of-stock' ? 'active' : '' }}">
                                <a href="{{ route('admin.products.index', ['type' => 'out-of-stock']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Out Of Stock</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                </li>
            @endif

            {{-- Products  --}}




            {{-- products-reviews  --}}

            @if (Auth::guard('admin')->user()->hasPermission('products-reviews-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#products-reviews"
                        aria-expanded="{{ Route::is('admin.products-reviews.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-sharp fa-solid fa-face-smile icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text">Products Reviews </span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.products-reviews.*') ? 'show' : '' }}"
                        role="list" id="products-reviews" aria-expanded="true">
                        <ul class="flex-column nav">



                            <li
                                class="nav-item  {{ (Route::is('admin.products-reviews.*') && (request()->status != 1 && request()->status != 0)) || !isset(request()->status) ? 'active' : '' }}">
                                <a href="{{ route('admin.products-reviews.index', ['approved' => 'all']) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">All</span>
                                </a>
                            </li>

                            <li
                                class="nav-item  {{ Route::is('admin.products-reviews.*') && request()->status && request()->status == 1 ? 'active' : '' }}">
                                <a href="{{ route('admin.products-reviews.index', ['status' => 1]) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text">Approved</span>
                                </a>
                            </li>


                            <li
                                class="nav-item  {{ Route::is('admin.products-reviews.*') && isset(request()->status) && request()->status == 0 ? 'active' : '' }}">
                                <a href="{{ route('admin.products-reviews.index', ['status' => 0]) }}"
                                    class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Not Approved</span>
                                </a>
                            </li>




                        </ul>
                    </div>
                </li>
            @endif

            {{-- products-reviews  --}}






            {{-- orders  --}}

            @if (Auth::guard('admin')->user()->hasPermission('orders-read'))
                <li class="nav-item ">
                    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                        data-bs-toggle="collapse" data-bs-target="#orders"
                        aria-expanded="{{ Route::is('admin.orders.*') ? 'true' : 'false' }}">
                        <span>
                            <span class="sidebar-icon">
                                <i class="fa-solid fa-cart-arrow-down icon-xs me-2"></i>
                            </span>
                            <span class="sidebar-text"> Orders</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </span>

                    <div class="multi-level collapse {{ Route::is('admin.orders.*') ? 'show' : '' }}" role="list"
                        id="orders" aria-expanded="true">
                        <ul class="flex-column nav">





                            <li class="nav-item  {{ Route::is('admin.orders.newOrders') ? 'active' : '' }}">
                                <a href="{{ route('admin.orders.newOrders') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="far fa-plus-square icon icon-xs me-2 text-warning"></i>
                                    </span>
                                    <span class="sidebar-text">New Orders <span style="color:red">{{ App\Models\Order::where('status','new')->count() }}</span></span>
                                </a>
                            </li>


                            <li class="nav-item  {{ Route::is('admin.orders.inprogressOrders') ? 'active' : '' }}">
                                <a href="{{ route('admin.orders.inprogressOrders') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-spinner icon icon-xs me-2 text-info"></i>
                                    </span>
                                    <span class="sidebar-text"> Inprogress Orders <span style="color:red">{{ App\Models\Order::where('status','inprogress')->count() }}</span></span>
                                </a>
                            </li>



                            <li class="nav-item  {{ Route::is('admin.orders.deliveredOrders') ? 'active' : '' }}">
                                <a href="{{ route('admin.orders.deliveredOrders') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-check-double icon icon-xs me-2 text-success"></i>
                                    </span>
                                    <span class="sidebar-text"> Delivered Orders <span style="color:red">{{ App\Models\Order::where('status','delivered')->count() }}</span></span>
                                </a>
                            </li>



                            <li class="nav-item  {{ Route::is('admin.orders.cancelledOrders') ? 'active' : '' }}">
                                <a href="{{ route('admin.orders.cancelledOrders') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-window-close icon icon-xs me-2 text-danger"></i>
                                    </span>
                                    <span class="sidebar-text"> Cancelled Orders <span style="color:red">{{ App\Models\Order::where('status','cancelled')->count() }}</span></span>
                                </a>
                            </li>







                        </ul>
                    </div>
                </li>
            @endif

            {{-- orders  --}}



























            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-chart-line icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Reports</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>

                <div class="multi-level collapse " role="list" id="reports" aria-expanded="true">
                    <ul class="flex-column nav">



                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text">Report 1</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text"> Report 2</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <span class="sidebar-icon">
                                    <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                </span>
                                <span class="sidebar-text"> Report 3</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </li>












            {{-- shippings --}}
            @if (Auth::guard('admin')->user()->hasPermission('shippings-read'))
                <li class="nav-item {{ Route::is('admin.shippings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.shippings.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-truck-fast icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Shippings</span>
                    </a>
                </li>
            @endif
            {{-- shippings --}}

            {{-- promo-codes --}}
            @if (Auth::guard('admin')->user()->hasPermission('promo-codes-read'))
                <li class="nav-item {{ Route::is('admin.promo-codes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.promo-codes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-gifts icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Promo Codes</span>
                    </a>
                </li>
            @endif
            {{-- promo-codes --}}

            {{-- taxes --}}
            @if (Auth::guard('admin')->user()->hasPermission('taxes-read'))
                <li class="nav-item {{ Route::is('admin.taxes.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.taxes.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-money-bill-wheat icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Taxes</span>
                    </a>
                </li>
            @endif
            {{-- taxes --}}





            {{-- users --}}
            @if (Auth::guard('admin')->user()->hasPermission('users-read'))
                <li class="nav-item {{ Route::is('admin.users.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-users icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Users Management</span>
                    </a>
                </li>
            @endif

            {{-- users --}}
            {{-- admins --}}
            @if (Auth::guard('admin')->user()->hasPermission('admins-read'))
                <li class="nav-item {{ Route::is('admin.admins.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.admins.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-users-gear icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Admins Management</span>
                    </a>
                </li>
            @endif

            {{-- admins --}}

            {{-- area --}}
            <li class="nav-item ">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-bs-toggle="collapse" data-bs-target="#area"
                    aria-expanded="{{ Route::is('admin.countries.*') || Route::is('admin.cities.*') || Route::is('admin.regions.*') ? 'true' : 'false' }}">
                    <span>
                        <span class="sidebar-icon">
                            <i class="fa-solid fa-map-location-dot icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">Area Settings</span>
                    </span>
                    <span class="link-arrow">
                        <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </span>

                <div class="multi-level collapse {{ Route::is('admin.countries.*') || Route::is('admin.cities.*') || Route::is('admin.regions.*') ? 'show' : '' }} "
                    role="list" id="area" aria-expanded="true">
                    <ul class="flex-column nav">



                        @if (Auth::guard('admin')->user()->hasPermission('countries-read'))
                            <li class="nav-item {{ Route::is('admin.countries.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.countries.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Countries</span>
                                </a>
                            </li>
                        @endif



                        @if (Auth::guard('admin')->user()->hasPermission('cities-read'))
                            <li class="nav-item {{ Route::is('admin.cities.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.cities.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Cities</span>
                                </a>
                            </li>
                        @endif



                        @if (Auth::guard('admin')->user()->hasPermission('regions-read'))
                            <li class="nav-item {{ Route::is('admin.regions.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.regions.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Regions</span>
                                </a>
                            </li>
                        @endif



                    </ul>
                </div>
            </li>

            {{-- area --}}

            {{-- settings --}}
            @if (Auth::guard('admin')->user()->hasPermission('settings-read'))
                <li class="nav-item {{ Route::is('admin.settings.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link ">
                        <span class="sidebar-icon">
                            <i class="fas fa-cogs icon icon-xs me-2"></i>
                        </span>
                        <span class="sidebar-text">App Settings </span>
                    </a>
                </li>
            @endif

            {{-- settings --}}

  <li class="nav-item {{ Route::is('admin.blogs.*') ? 'active' : '' }}">
                                <a href="{{ route('admin.blogs.index') }}" class="nav-link ">
                                    <span class="sidebar-icon">
                                        <i class="fa-regular fa-circle icon icon-xs me-2"></i>
                                    </span>
                                    <span class="sidebar-text"> Blogs</span>
                                </a>
                            </li>

                    </ul>
                </div>
            </li>
            
            <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>

        </ul>
    </div>
</nav>
