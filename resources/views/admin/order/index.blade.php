@extends('layouts.admin.master')
@section('title')
    All {{ ucfirst($type) }} Orders
@endsection

@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class=" d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"> {{ ucfirst($type) }} Orders</li>
                </ol>
            </nav>
            <h2 class="h4">All {{ ucfirst($type) }} Orders</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">


            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ route('admin.orders.export', $type) }}"
                    class="btn btn-outline-success d-inline-flex align-items-center">
                    {{-- <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg> --}}

                    <svg class="icon icon-xs me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                        <path
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z" />
                    </svg>
                    <span> Export As Excel</span>
                </a>
            </div>
        </div>
    </div>






    {{-- on top --}}



    <div class="card card-body border-0 shadow mb-2">

        <div class="accordion ">

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Search Filters
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionPricing">
                    <div class="accordion-body card card-body ">


                        <form action="">

                            <div class="row">



                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="search">Search By Order Number</label>
                                        <input type="text" id="search" value="{{ request()->search }}" name="search"
                                            class="form-control search-docs" placeholder="Search">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">

                                        <label for="limit">Display Limit</label>

                                        <select class="form-control mb-3" aria-label="Default" name="limit">
                                            <option selected value="5">5</option>
                                            <option value="10" @if (isset(request()->limit) && request()->limit == 10) selected @endif>10
                                            </option>
                                            <option value="20" @if (isset(request()->limit) && request()->limit == 20) selected @endif>20
                                            </option>
                                            <option value="30" @if (isset(request()->limit) && request()->limit == 30) selected @endif>30
                                            </option>
                                            <option value="40" @if (isset(request()->limit) && request()->limit == 40) selected @endif>40
                                            </option>
                                            <option value="50" @if (isset(request()->limit) && request()->limit == 50) selected @endif>50
                                            </option>
                                            <option value="100" @if (isset(request()->limit) && request()->limit == 100) selected @endif>100
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3">
                                        <label for="order">Order By</label>
                                        <select class="form-control" aria-label="Default" name="order">
                                            <option selected value="DESC">Latest</option>
                                            <option value="ASC" @if (isset(request()->order) && request()->order == 'ASC') selected @endif>Oldest
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="from">From</label>
                                        <input type="date" id="from" value="{{ request()->from }}" name="from"
                                            class="form-control search-docs" placeholder="From">

                                    </div>
                                </div>


                                <div class="col-lg-4">

                                    <div class="form-group mb-3">
                                        <label for="to">To</label>

                                        <input type="date" id="to"
                                            value="{{ request()->to ? request()->to : date('Y-m-d', time()) }}"
                                            name="to" class="form-control search-docs" placeholder="To">

                                    </div>
                                </div>


                                <div class="col-12">

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary ">Search</button>
                                    </div>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Order Number</th>
                    <th class="border-gray-200">Total Price</th>
                    <th class="border-gray-200">Payment Type</th>
                    <th class="border-gray-200">User</th>


                    {{-- inprogress --}}
                    @if ($type == 'inprogress')
                        <th class="border-gray-200">inprogress Action Admin</th>

                        <th class="border-gray-200">inprogress At</th>
                    @endif

                    {{-- inprogress --}}



                    {{-- delivered --}}
                    @if ($type == 'delivered')
                        <th class="border-gray-200">delivered Action Admin</th>

                        <th class="border-gray-200">delivered At</th>
                    @endif

                    {{-- delivered --}}


                    {{-- cancelled --}}
                    @if ($type == 'cancelled')
                        <th class="border-gray-200">cancelled From</th>

                        <th class="border-gray-200">cancelled Action Admin</th>

                        <th class="border-gray-200">cancelled At</th>
                    @endif

                    {{-- cancelled --}}
                    <th class="border-gray-200">Created At</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($orders as $order)
                    <tr>

                        <td>
                            <p class="text-nowrap">{{ $order->id }}.</p>
                        </td>
                        <td>
                            <p class="text-nowrap">{{ $order->order_number }}</p>
                        </td>
                        <td> <span class="badge bg-success text-nowrap"
                                style="font-size: 16px">{{ number_format($order->total_sum) }} EGP</span></td>

                        <td> <span class="badge bg-info text-nowrap"
                                style="font-size: 16px">{{ $order->payment_type }}</span></td>

                        <td>

                            @if ($order->user)
                                <strong>


                                    <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                        <a class="mx-1 text-info"
                                            href="{{ route('admin.users.index', ['user_id' => $order->user->id]) }}">{{ $order->user->name }}</a>
                                    </p>
                                </strong>
                            @else
                                <p class="text-nowrap"><i class="fas fa-user text-info"></i>
                                    {{ $order->customer_name }}
                                </p>
                            @endif
                        </td>




                        {{-- inprogress --}}
                        @if ($type == 'inprogress')
                            <td>
                                @if ($order->inprogress_admin)
                                    <strong> <a class="btn text-info"
                                            href="{{ route('admin.admins.index', ['admin_id' => $order->inprogress_admin->id]) }}">{{ $order->inprogress_admin->name }}</a>
                                    </strong>
                                @else
                                    --
                                @endif
                            </td>


                            <td>
                                @if ($order->inprogress_at)
                                    <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                        {{ \Carbon\Carbon::parse($order->inprogress_at)->format('d/m/Y') }} </span>
                                    <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                        {{ \Carbon\Carbon::parse($order->inprogress_at)->format('h:i:s A') }} </span>
                                @else
                                    ...
                                @endif

                            </td>



                        @endif

                        {{-- inprogress --}}



                        {{-- delivered --}}
                        @if ($type == 'delivered')
                            <td>
                                @if ($order->delivered_admin)
                                    <strong> <a class="btn text-info"
                                            href="{{ route('admin.admins.index', ['admin_id' => $order->delivered_admin->id]) }}">{{ $order->delivered_admin->name }}</a>
                                    </strong>
                                @else
                                    --
                                @endif
                            </td>




                            <td>
                                @if ($order->delivered_at)
                                    <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                        {{ \Carbon\Carbon::parse($order->delivered_at)->format('d/m/Y') }} </span>
                                    <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                        {{ \Carbon\Carbon::parse($order->delivered_at)->format('h:i:s A') }} </span>
                                @else
                                    ...
                                @endif

                            </td>
                        @endif

                        {{-- delivered --}}



                        {{-- cancelled --}}
                        @if ($type == 'cancelled')
                            <td>
                                <strong> {{ $order->cancelled_from ? ucfirst($order->cancelled_from) : '--' }}</strong>
                            </td>
                            <td>
                                @if ($order->cancelled_admin)
                                    <strong> <a class="btn text-info"
                                            href="{{ route('admin.admins.index', ['admin_id' => $order->cancelled_admin->id]) }}">{{ $order->cancelled_admin->name }}</a>
                                    </strong>
                                @else
                                    --
                                @endif
                            </td>





                            <td>
                                @if ($order->cancelled_at)
                                    <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                        {{ \Carbon\Carbon::parse($order->cancelled_at)->format('d/m/Y') }} </span>
                                    <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                        {{ \Carbon\Carbon::parse($order->cancelled_at)->format('h:i:s A') }} </span>
                                @else
                                    ...
                                @endif

                            </td>
                        @endif

                        {{-- cancelled --}}





                        <td>
                            @if ($order->created_at)
                                <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }} </span>
                                <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($order->created_at)->format('h:i:s A') }} </span>
                            @else
                                ...
                            @endif

                        </td>





                        <td>




                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">


                                        <a class="btn btn-primary  m-1" style="font-size: 16px"
                                            href="{{ route('admin.orders.show', $order->id) }}"> <span
                                                class="fas fa-eye "></span></a>
                                    </div>
                                </div>


                                @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'new')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                        action="{{ route('admin.orders.inprogressAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Inprogress Action" type="submit" class="btn btn-info text-white  m-1"
                                            style="font-size: 16px">
                                            <span class="fas fa-check"></span>
                                        </button>
                                    </form>
                                @endif



                                @if (Auth::guard('admin')->user()->hasPermission('orders-update') && $order->status == 'inprogress')
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                        action="{{ route('admin.orders.deliveredAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button style="font-size: 16px" type="submit" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delivered Action" type="submit"
                                            class="btn btn-success text-white  m-1">
                                            <span class="fas fa-check-double "></span>
                                        </button>
                                    </form>
                                @endif


                                @if (Auth::guard('admin')->user()->hasPermission('orders-update') &&
                                        ($order->status == 'new' || $order->status == 'inprogress'))
                                    <form class="action_btn"
                                        data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                        action="{{ route('admin.orders.cancelledAction', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Cancelled Action" type="submit"
                                            class="btn btn-danger text-white  m-1" style="font-size: 16px">
                                            <span class="fas fa-times"></span>
                                        </button>
                                    </form>
                                @endif









                            </div>
                            {{-- actions --}}






                        </td>


                        {{-- <td>

                            <div class="btn-group">
                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="icon icon-sm">
                                        <span class="fas fa-ellipsis-h icon-dark"></span>
                                    </span>
                                    <span class="visually-hidden">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu py-0">


                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                        class="dropdown-item rounded-top"><span class="fas fa-eye me-2"></span>View
                                        Details</a>



                                    @if (Auth::guard('admin')->user()->hasPermission('orders-update') &&
    $order->status == 'new')
                                        <form class="action_btn"
                                            data-message="Are You Sure You Want To Move This Order To Inprogress Status ?"
                                            action="{{ route('admin.orders.inprogressAction', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="dropdown-item text-success rounded-bottom">
                                                <span class="fas fa-check me-2"></span>InProgress

                                            </button>
                                        </form>
                                    @endif


                                    @if (Auth::guard('admin')->user()->hasPermission('orders-update') &&
    $order->status == 'inprogress')
                                        <form class="action_btn"
                                            data-message="Are You Sure You Want To Move This Order To Delivered Status ?"
                                            action="{{ route('admin.orders.deliveredAction', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="dropdown-item text-success rounded-bottom">
                                                <span class="fas fa-check-double me-2"></span>Delivered
                                            </button>
                                        </form>
                                    @endif

                                    @if (Auth::guard('admin')->user()->hasPermission('orders-update') &&
    ($order->status == 'new' || $order->status == 'inprogress'))
                                        <form class="action_btn"
                                            data-message="Are You Sure You Want To Move This Order To Cancelled Status ?"
                                            action="{{ route('admin.orders.cancelledAction', $order->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger rounded-bottom">
                                                <span class="fas fa-times me-2"></span>Cancel
                                            </button>
                                        </form>
                                    @endif







                                </div>
                            </div>


                        </td> --}}




                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {!! $orders->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($orders->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
