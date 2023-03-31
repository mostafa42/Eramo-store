@extends('layouts.admin.master')
@section('title')
    Why We Choose Section
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
                    <li class="breadcrumb-item active" aria-current="page"> Why We Choose Section </li>
                </ol>
            </nav>
            <h2 class="h4"> Why We Choose Section </h2>

            <div style="margin: auto">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
                @endforeach
            </div>

        </div>
    </div>






    {{-- on top --}}




    {{-- table --}}
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover table-centered table-striped table-bordered text-center ">
            <thead>
                <tr>
                    <th class="border-gray-200">Title in arabic</th>
                    <th class="border-gray-200">Title in english</th>
                    <th class="border-gray-200">Link in arabic</th>
                    <th class="border-gray-200">Link in english</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->

                @foreach ($why_we_choose as $why_we_choose)
                    <tr>



                        <td>
                            <p class="text-nowrap"> {{ $why_we_choose->title_ar }} </p>
                        </td>

                        <td>
                            <p class="text-nowrap"> {{ $why_we_choose->title_en }} </p>
                        </td>

                        <td>
                            <a href="{{ $why_we_choose->link_ar }}" class="btn btn-primary" target="_blank">Go</a>
                        </td>

                        <td>
                            <a href="{{ $why_we_choose->link_en }}" class="btn btn-primary" target="_blank">Go</a>
                        </td>




                        <td>



                            <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                                <div class="">
                                    <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                        <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                            data-bs-target="#modal-edit-{{ $why_we_choose->id }}" class=""><span
                                                class="fas fa-edit "></span>
                                        </button>
                                    </div>
                                </div>








                            </div>






                        </td>











                        <div class="modal fade" id="modal-edit-{{ $why_we_choose->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="h6 modal-title">Edit My Account Section</h2>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('admin.user-front-settings.edit_why_we_choose_footer' , $why_we_choose->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">

                                            <div class="wrapper m-auto">

                                                <ul class="list-group list-group-flush">
                                                    <label>Title in Arabic </label>
                                                    <input type="text" name="title_ar" value="{{ $why_we_choose->title_ar }}"
                                                        class="form-control"><br>

                                                    <label> Title in English </label>
                                                    <input type="text" name="title_en" value="{{ $why_we_choose->title_en }}"
                                                        class="form-control"><br>

                                                    <label> Link in Arabic </label>
                                                    <input type="text" name="link_ar" value="{{ $why_we_choose->link_ar }}"
                                                        class="form-control"><br>

                                                        <label> Link in English </label>
                                                    <input type="text" name="link_en" value="{{ $why_we_choose->link_en }}"
                                                        class="form-control"><br>
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="modal-footer">


                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>


                                            <button type="button" class="btn btn-link text-gray ms-auto"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </form>
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
