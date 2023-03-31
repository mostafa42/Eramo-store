@extends('layouts.admin.master')
@section('title')
    Contact Us
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
                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                </ol>
            </nav>
            <h2 class="h4">Contact Us</h2>

        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.contact-messages.index') }}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <i style="margin-right: 5px" class="fa fa-eye"></i>
                Contact Us Messages
            </a>
        </div>
    </div>






    {{-- on top --}}




    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">facebook</th>
                    <th class="border-gray-200">linkedIn</th>
                    <th class="border-gray-200">instegram</th>
                    <th class="border-gray-200">address</th>
                    <th class="border-gray-200">email</th>
                    <th class="border-gray-200">phone 1</th>
                    <th class="border-gray-200">phone 2</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($contact_us as $contact_us)
                    <tr>

                        <td>
                            <a class="text-nowrap btn btn-primary" target="_blank" href="{{ $contact_us->facebook }}">Go</a>
                        </td>

                        <td>
                            <a class="text-nowrap btn btn-primary" target="_blank" href="{{ $contact_us->linkedIn }}">Go</a>
                        </td>

                        <td>
                            <a class="text-nowrap btn btn-primary" target="_blank"
                                href="{{ $contact_us->instegram }}">Go</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ $contact_us->address }}</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ $contact_us->email }}</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ $contact_us->phone1 }}</a>
                        </td>

                        <td>
                            <p class="text-nowrap">{{ $contact_us->phone2 }}</a>
                        </td>





                        <td>



                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Show Details">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-{{ $contact_us->id }}" class=""><span
                                                class="fas fa-eye "></span>
                                        </button>
                                    </div>
                                </div>


                                <div class="">
                                    @if (Auth::guard('admin')->user()->hasPermission('taxes-update'))
                                        <a class="btn btn-info m-1" class="dropdown-item"
                                            href="{{ route('admin.contact-us.edit', $contact_us->id) }}" title="Edit"
                                            data-bs-toggle="tooltip" data-bs-placement="top"><span
                                                class="fas fa-edit "></span>
                                        </a>
                                    @endif
                                </div>








                            </div>






                        </td>











                        <div class="modal fade" id="modal-{{ $contact_us->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Contact Us Details</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

                                        <div class="wrapper m-auto">

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">Facebook : {{ $contact_us->facebook }} </li>
                                                <li class="list-group-item">LinkedIn : {{ $contact_us->linkedIn }} </li>
                                                <li class="list-group-item">Instegram : {{ $contact_us->instegram }} </li>
                                                <li class="list-group-item">Address : {{ $contact_us->address }} </li>
                                                <li class="list-group-item">Email : {{ $contact_us->email }} </li>
                                                <li class="list-group-item">Phone 1 : {{ $contact_us->phone1 }} </li>
                                                <li class="list-group-item">Phone 2 : {{ $contact_us->phone2 }} </li>

                                            </ul>
                                        </div>

                                    </div>
                                    <div class="modal-footer">


                                        @if (Auth::guard('admin')->user()->hasPermission('taxes-update'))
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.contact-us.edit', $contact_us->id) }}"><span
                                                    class="fas fa-edit me-2"></span>Edit</a>
                                        @endif


                                        <button type="button" class="btn btn-link text-gray ms-auto"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach








            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            {{-- {!! $taxes->appends(request()->query())->links('pagination::bootstrap-5') !!} --}}



        </div>

        {{-- @if ($taxes->count() < 1)
            <div class="d-flex justify-content-center" style="min-height: 300px">
                Empty
            </div>
        @endif --}}
    </div>

    {{-- table --}}
@endsection
