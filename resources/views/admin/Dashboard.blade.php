@extends('layouts.admin.master')

@section('content')
    <div class="py-4">

        <div class="d-flex justify-content-between w-100 flex-wrap">
            <div class="mb-3 mb-lg-0">
                <h1 class="h4"> <i class="fa fa-house"></i> {{ config('app.name') }} Admin Dashboard </h1>

            </div>

        </div>
    </div>

    <div class="row  dashboard-home-top">


        @php
            $colores = collect(['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'tertiary']);
        @endphp
        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Users</h2>
                                <div class="fw-extrabold mb-1"><a href="#">{{ $user }}</a> </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Users</h2>
                                <div class="fw-extrabold mb-1"><a href="#">{{ $user }}</a></div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-users-cog icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Admins</h2>
                                <div class="fw-extrabold mb-1">{{ $admin }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Admins</h2>
                                <div class="fw-extrabold mb-2">{{ $admin }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-user-clock icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Visitors Today</h2>
                                <div class="fw-extrabold mb-1">2030</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Visitors Today</h2>
                                <div class="fw-extrabold mb-2">2030</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fa-solid fa-truck-fast icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Shippings</h2>
                                <div class="fw-extrabold mb-1">40</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Shippings</h2>
                                <div class="fw-extrabold mb-2">40</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-shopping-cart icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">All Products</h2>
                                <div class="fw-extrabold mb-1">{{ $all_products }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">All Products</h2>
                                <div class="fw-extrabold mb-2">{{ $all_products }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-check-double icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">In Stock Products</h2>
                                <div class="fw-extrabold mb-1">{{ $in_stock_products }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">In Stock Products</h2>
                                <div class="fw-extrabold mb-2">{{ $in_stock_products }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-times icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Out Of Stock Products</h2>
                                <div class="fw-extrabold mb-1">{{ $out_stock_products }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Out Of Stock Products</h2>
                                <div class="fw-extrabold mb-2">{{ $out_stock_products }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>









        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-gifts icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Promo Codes</h2>
                                <div class="fw-extrabold mb-1">{{ $promo_codes }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Promo Codes</h2>
                                <div class="fw-extrabold mb-2">{{ $promo_codes }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fas fa-envelope-open-text icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">New Contacts</h2>
                                <div class="fw-extrabold mb-1">140</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">New Contacts</h2>
                                <div class="fw-extrabold mb-2">140</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fa-solid fa-money-bills icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Taxes</h2>
                                <div class="fw-extrabold mb-1">{{ $taxes }}</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Taxes</h2>
                                <div class="fw-extrabold mb-2">{{ $taxes }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="far fa-file-alt icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Pages</h2>
                                <div class="fw-extrabold mb-1">10</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">Pages</h2>
                                <div class="fw-extrabold mb-2">10</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-{{ $colores->random() }} rounded me-4 me-sm-0">

                                <i class="fa-regular fa-circle-question icon"></i>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">FAQ</h2>
                                <div class="fw-extrabold mb-1">80</div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h6 text-gray-400 mb-0">FAQ</h2>
                                <div class="fw-extrabold mb-2">80</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>

    {{-- orders --}}

    <div class="card card-body my-4">

        <div class="d-flex justify-content-center align-items-center flex-wrap">


            <div class="card card-body px-2 py-3 mx-4 p bg-info   rounded my-3 order-statistics  position-relative">

                <i class="far fa-plus-square" style="margin-bottom: 10px ; font-size:30px"></i>


                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">New Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-primary   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-spinner" style="margin-bottom: 10px ; font-size:30px"></i>


                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Inprogress
                        Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    992+
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-success   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-check-double" style="margin-bottom: 10px ; font-size:30px"></i>



                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Delivered Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    5000+
                </span>
            </div>



            <div class="card card-body px-2 py-3 mx-4 p bg-danger   rounded my-3 order-statistics  position-relative">

                <i class="fas fa-window-close" style="margin-bottom: 10px ; font-size:30px"></i>

                <a href="#"><span class="d-block " style=" font-size:20px ; color:#fff">Cancelled Orders</span></a>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    99+
                </span>
            </div>



        </div>
    </div>


    {{-- orders --}}

    <div class="row">
        {{-- Current Month Income --}}

        <div class="col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                    <div class="d-block">
                        <div class="h3 fw-normal text-gray mb-2">Current Month Income</div>
                        <div class="h3 fw-extrabold text-success">910,500,00 EGP</div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{--  Current Month Income --}}




        {{-- Current Month Orders --}}

        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->

                <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">

                    <div class="d-block">
                        <div class="h3 fw-normal text-gray mb-2">Current Month Orders</div>
                        <div class="h3 fw-extrabold text-success">2,510,00 Order</div>
                    </div>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        {{--  Current Month Orders --}}

    </div>




    <div class="row">
        <div class="col-12 col-xl-8">
            <div class="row">





                {{-- latest orders --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Latest Orders</h2>
                                </div>
                                <div class="col text-end">
                                    <a href="#" class="btn btn-sm btn-primary">See All Orders</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">Order Number</th>
                                        <th class="border-bottom" scope="col">Total</th>
                                        <th class="border-bottom" scope="col">Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Ahmed Eissa
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            9838
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            800,00 EGP
                                        </td>

                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block"><i class="fas fa-clock text-success"></i> 06:23 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To Order" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Somaia Mostafa
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            9628
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            440,00 EGP
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <span class="d-block"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block"><i class="fas fa-clock text-success"></i> 06:21 PM
                                            </span>
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To Order" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Alaa Ahmed
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            9898
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            700,00 EGP
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <span class="d-block"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block"><i class="fas fa-clock text-success"></i> 06:20 PM
                                            </span>
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To Order" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Reda Mohamed
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            9098
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            1,200,00 EGP
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <span class="d-block"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block"><i class="fas fa-clock text-success"></i> 06:19 PM
                                            </span>
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To Order" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Rania Gamal
                                        </th>
                                        <td class="fw-bolder text-gray-500">
                                            9898
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            1,340,00 EGP
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <span class="d-block"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block"><i class="fas fa-clock text-success"></i> 06:18 PM
                                            </span>
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To Order" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest orders --}}





                {{-- latest users --}}

                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h2 class="fs-5 fw-bold mb-0">Latest Registered Users</h2>
                                </div>
                                <div class="col text-end">
                                    <a href="#" class="btn btn-sm btn-primary">See All Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="border-bottom" scope="col">User Name</th>
                                        <th class="border-bottom" scope="col">User Phone</th>

                                        <th class="border-bottom" scope="col"> Register Date</th>
                                        <th class="border-bottom" scope="col">Show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Ahmed Mohmoud
                                        </th>
                                        <th class="text-gray-900" scope="row">
                                            01023939847
                                        </th>
                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block text-nowrap"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block text-nowrap"><i class="fas fa-clock text-success"></i> 06:23 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To User" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>



                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                           Salma Mohamed
                                        </th>
                                        <th class="text-gray-900" scope="row">
                                            01025559847
                                        </th>
                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block text-nowrap"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block text-nowrap"><i class="fas fa-clock text-success"></i> 06:10 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To User" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>



                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Emad Ahmed
                                        </th>
                                        <th class="text-gray-900" scope="row">
                                            0102393667
                                        </th>
                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block text-nowrap"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block text-nowrap"><i class="fas fa-clock text-success"></i> 06:05 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To User" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Ali Samir
                                        </th>
                                        <th class="text-gray-900" scope="row">
                                            0113344847
                                        </th>
                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block text-nowrap"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block text-nowrap"><i class="fas fa-clock text-success"></i> 06:04 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To User" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                    <tr>
                                        <th class="text-gray-900" scope="row">
                                            Shrouk Ayamen
                                        </th>
                                        <th class="text-gray-900" scope="row">
                                            01523449847
                                        </th>
                                        <td class="fw-bolder text-gray-500 ">


                                            <span class="d-block text-nowrap"><i class="fas fa-calendar-week text-info"></i>
                                                2023-01-22 </span>
                                            <span class="d-block text-nowrap"><i class="fas fa-clock text-success"></i> 06:03 PM
                                            </span>

                                        </td>

                                        <td class="fw-bolder text-gray-500">
                                            <a title="GO To User" href="#" data-bs-toggle="tooltip" data-bs-placement="top"
                                                class="btn btn-sm btn-primary d-inline-flex align-items-center">
                                                <i class="fas fa-eye icon icon-xxs "></i>
                                            </a>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- latest users --}}


            </div>
        </div>
        <div class="col-12 col-xl-4">



            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">Orders Status</div>

                        </div>

                    </div>
                    <div class="card-body py-4">

                        <div class="chart-area">
                            <canvas id="ordersStatusChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>




            <div class="col-12 px-0 mb-4">
                <div class="card border-0 shadow">
                    <div class="card-header d-flex flex-row align-items-center flex-0 border-bottom">
                        <div class="d-block">
                            <div class="h6 fw-normal text-gray mb-2">All Products</div>
                            <div class="h3 fw-extrabold text-warning">3,000,00 Product</div>

                        </div>

                    </div>
                    <div class="card-body py-4">

                        <div class="chart-area">
                            <canvas id="productsChart"></canvas>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection




@section('scripts')
    <!-- ChartJS -->
    {{-- <script src={{ asset('dashboard/js/plugin/Chart.min.js') }}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
        let ctx = document.getElementById("myChart");
        let r = Math.round(Math.random() * 255);
        let g = Math.round(Math.random() * 255);
        let b = Math.round(Math.random() * 255);
        let rgb = `rgb(${r} , ${g} ,${b})`;


        const data = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan',
            ],
            datasets: [{
                label: 'EGP',
                data: ['20000', '40000', '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000',
                    '12000', '23000', '3000', '40000', '22000', '33000', '21000',
                    '12000', '23000', '30000', '40000', '22000', '33000', '21000',
                    '15000', '23000', '50000', '4000', '2200', '22000', '44000',

                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Current Month  Total Income Is 910,500,00 EGP',
                    }
                }
            }
        };





        new Chart(ctx, config);



        let ctx2 = document.getElementById("ordersChart");

        const data2 = {
            labels: ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan',
                '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan',
                '21 Jan', '22 Jan', '23 Jan', '24 Jan', '25 Jan', '26 Jan', '27 Jan', '28 Jan', '29 Jan', '30 Jan',
            ],
            datasets: [{
                label: 'Orders',
                data: ['20000', '40000', '60000', '10000', '60000', '50000', '90000', '11000', '14000', '22000',
                    '12000', '23000', '3000', '40000', '22000', '33000', '21000',
                    '12000', '23000', '30000', '40000', '22000', '33000', '21000',
                    '15000', '23000', '50000', '4000', '2200', '22000', '44000',

                ],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config2 = {
            type: 'bar',
            data: data2,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Current Month  Total Orders Is 2,510,00 ',
                    }
                }
            }
        };

        new Chart(ctx2, config2);


        // product chart

        let ctx3 = document.getElementById("productsChart");

        const data3 = {
            labels: ['In Stock', 'Out Of Stock', ],
            datasets: [{
                label: 'Products',
                data: ['1800', '1200'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15
            }]
        };
        const config3 = {
            type: 'pie',
            data: data3,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Products Is 3,000,00 Product ',
                    }
                }
            }

        };
        new Chart(ctx3, config3);
        // ordersStatusChart


        let ctx4 = document.getElementById("ordersStatusChart");

        const data4 = {
            labels: ['New', 'Inprogress', 'Delivered', 'Cancelled'],
            datasets: [{
                label: 'Order',
                data: ['999', '992', '5000', '99'],

                pointStyle: 'circle',
                pointRadius: 10,
                pointHoverRadius: 15,
                backgroundColor: [
                    '#0d6efd',
                    '#0dcaf0',
                    '#2ecc71',
                    '#dc3545',
                ]

            }]
        };
        const config4 = {
            type: 'pie',
            data: data4,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: (ctx) => 'Total Orders Is 3,000,00 Order ',
                    },

                }
            }

        };
        new Chart(ctx4, config4);
    </script>
@endsection
