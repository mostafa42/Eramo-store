@extends('layouts.admin.master')
@section('title')
    All Products Reviews
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
                    <li class="breadcrumb-item active" aria-current="page">Products Reviews</li>
                </ol>
            </nav>
            @php
                $pageAction = 'All';

                if (request('approved') == 1) {
                    $pageAction = 'Approved';
                } elseif (request('approved') == '0') {
                    $pageAction = 'Not Approved';
                }
            @endphp
            <h2 class="h4">{{ $pageAction }} Products Reviews</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group ms-2 ms-lg-3">
                <a href="{{ route('admin.products-reviews.export') }}"
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


                        <form action="{{ route('admin.products-reviews.index') }}">

                            <div class="row">





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
                                        <label for="approved">Is Approved Or Not Approved</label>

                                        <select class="form-control" aria-label="Default" name="approved">
                                            <option selected value="">All</option>
                                            <option value="1" @if (isset(request()->approved) && request()->approved == 1) selected @endif>
                                                Approved
                                            </option>
                                            <option value="0" @if (isset(request()->approved) && request()->approved == 0) selected @endif>
                                                Not Approved</option>
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
        <table class="table table-hover table-centered table-centered table-striped table-bordered text-center">
            <thead>
                <tr>
                    <th class="border-gray-200">ID</th>
                    <th class="border-gray-200">Title</th>
                    <th class="border-gray-200">Rating</th>
                    <th class="border-gray-200">Approved</th>
                    <th class="border-gray-200">Created At</th>

                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($reviews as $review)
                    <tr>



                        <td>
                            <p class="text-nowrap">{{ $review->id }}.</p>
                        </td>



                        <td>

                            <div class="m-auto" style="width:150px">
                                <p class="" dir="rtl">{{ Str::limit($review->title, 60) }}</p>
                            </div>
                        </td>




                        <td>
                            <p class="text-nowrap d-flex align-items-center justify-content-center">{{ $review->rating }}
                                <i class="fa-solid fa-star d-inline-block mx-1" style="color: #ecb603"></i>
                            </p>
                        </td>



                        <td>
                            @if ($review->approved)
                                <span class="fas fa-check-double fa-2x text-success"></span>
                            @else
                                <span class="fas fa-times fa-2x text-danger"></span>
                            @endif
                        </td>


                        <td>
                            @if ($review->created_at)
                                <span class="text-nowrap d-block h6"><i class="fas fa-calendar-week text-info"></i>
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y') }} </span>
                                <span class="text-nowrap d-block h6"><i class="fas fa-clock text-success"></i>
                                    {{ \Carbon\Carbon::parse($review->created_at)->format('h:i:s A') }} </span>
                            @else
                                ...
                            @endif

                        </td>







                        <td>




                            {{-- actions --}}
                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $review->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>





                                @if (Auth::guard('admin')->user()->hasPermission('products-reviews-update') && !$review->approved)
                                    <div class="">

                                        <form class="action_btn"
                                        data-message="Are You Sure You Want To Approve It ?" action="{{ route('admin.products-reviews.approved', $review->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success m-1 text-white" title="Approve"
                                                data-bs-toggle="tooltip" data-bs-placement="top">
                                                <span class="fas fa-check "></span>
                                            </button>
                                        </form>
                                    </div>
                                @endif



                                @if (Auth::guard('admin')->user()->hasPermission('products-reviews-delete'))
                                    <div class="">

                                        <form class="delete-btn"
                                            action="{{ route('admin.products-reviews.destroy', $review->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger m-1" type="submit" title="Delete"
                                            data-bs-toggle="tooltip" data-bs-placement="top">
                                                <span class="fas fa-trash-alt "></span>
                                            </button>
                                        </form>
                                    </div>
                                @endif










                            </div>
                            {{-- actions --}}






                        </td>
















                        <div class="modal fade" id="modal-{{ $review->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">{{ $review->title }}</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Title : {{ $review->title }} </li>
                                                <li class="list-group-item"><strong>Review :</strong>
                                                    {{ $review->review }} </li>

                                                <li class="list-group-item">Rating : {{ $review->rating }} </li>





                                                @if ($review->product)
                                                    <li class="list-group-item"> Product :
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.products.index', ['product_id' => $review->product->id]) }}">{{ $review->product->title_en . ' - ' . $review->product->title_ar }}</a>

                                                    </li>
                                                @endif


                                                @if ($review->user)
                                                    <li class="list-group-item"> User :
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('admin.users.index', ['user_id' => $review->user->id]) }}">{{ $review->user->name }}</a>

                                                    </li>
                                                @endif








                                                <li class="list-group-item">Approved :
                                                    @if ($review->approved)
                                                        <span class="badge bg-success">Approved</span>
                                                    @else
                                                        <span class="badge bg-danger">Not Approved</span>
                                                    @endif
                                                </li>


                                                <li class="list-group-item">Added Date : <i
                                                        class="fas fa-calendar-week text-info"></i>
                                                    {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y') }} </li>
                                                <li class="list-group-item">Added Time : <i
                                                        class="fas fa-clock text-success"></i>
                                                    {{ \Carbon\Carbon::parse($review->created_at)->format('h:i:s A') }}
                                                </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">



                                        {{-- <button type="button" class="btn btn-secondary">Accept</button> --}}


                                        <button type="button" class="btn btn-link text-gray ms-auto"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
                <!-- Item -->








            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {!! $reviews->appends(request()->query())->links('pagination::bootstrap-5') !!}



        </div>

        @if ($reviews->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif
    </div>

    {{-- table --}}
@endsection
