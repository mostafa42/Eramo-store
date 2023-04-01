@extends('layouts.admin.master')
@section('title')
Main Slider
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
                <li class="breadcrumb-item active" aria-current="page"> Main Slider</li>
            </ol>
        </nav>
        <h2 class="h4"> Main Slider</h2>

        <div style="margin: auto">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
            @endforeach
        </div>

    </div>
    <a data-bs-toggle="modal" data-bs-target="#modal-store"  class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
        <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Create New Product
    </a>
</div>






{{-- on top --}}




{{-- table --}}
<div class="card card-body border-0 shadow table-wrapper table-responsive">
    <table class="table table-hover table-centered table-striped table-bordered text-center ">
        <thead>
            <tr>
                <th class="border-gray-200">Main Image</th>
                <th class="border-gray-200">Intro title</th>
                <th class="border-gray-200">Big Text</th>
                <th class="border-gray-200">Description</th>
                <th class="border-gray-200">Link</th>
                <th class="border-gray-200">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->

            @foreach ($main_sliders as $slider)
            <tr>



                <td>
                    <img src=" {{ asset($slider->main_image) }} " width="100px">
                </td>

                <td>
                    <p class="text-nowrap"> {{ $slider->intro_title }} </p>
                </td>

                <td>
                    <p class="text-nowrap"> {{ $slider->big_text }} </p>
                </td>

                <td>
                    <p class="text-nowrap"> {{ substr($slider->description, 0, 30) }} </p>
                </td>

                <td>
                    <a href="{{ $slider->link }}" class="btn btn-primary" target="_blank">Go</a>
                </td>




                <td>



                    <div class="d-flex  align-items-center justify-content-center flex-md-nowrap">


                        <div class="">
                            <div data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                <button class="btn btn-primary  m-1" data-bs-toggle="modal"
                                    data-bs-target="#modal-edit-{{ $slider->id }}" class=""><span
                                        class="fas fa-edit "></span>
                                </button>
                            </div>
                        </div>








                    </div>






                </td>











                <div class="modal fade" id="modal-edit-{{ $slider->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Edit Main Slider</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.user-front-settings.edit_main_slider' , $slider->id) }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="wrapper m-auto">

                                        <ul class="list-group list-group-flush">
                                            <label>Main Image </label>
                                            <div class="col-md-12 mb-2">
                                                <img id="preview-image2" src="{{ $slider->logo }}" alt="preview image2"
                                                    width="100px">
                                            </div>
                                            <input type="file" name="main_image" placeholder="Choose image" id="image2"
                                                accept="image/x-png,image/jpeg"><br>
                                            <label> Introduction Title </label>
                                            <input type="text" name="intro_title" value="{{ $slider->intro_title }}"
                                                class="form-control"><br>

                                            <label> Big Text </label>
                                            <input type="text" name="big_text" value="{{ $slider->big_text }}"
                                                class="form-control"><br>

                                            <label> Description </label>
                                            <input type="text" name="description" value="{{ $slider->description }}"
                                                class="form-control"><br>

                                            <label> Link </label>
                                            <input type="text" name="link" value="{{ $slider->link }}"
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

                <div class="modal fade" id="modal-store" tabindex="-1" role="dialog"
                    aria-labelledby="modal-default" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="h6 modal-title">Add New Main Slider</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('admin.user-front-settings.store_main_slider') }}"
                                method="POST" enctype="multipart/form-data">
                                <div class="modal-body">

                                    <div class="wrapper m-auto">

                                        <ul class="list-group list-group-flush">
                                            <label>Main Image </label>
                                            <div class="col-md-12 mb-2">
                                                <img id="preview-image2" src="{{ $slider->logo }}" alt="preview image2"
                                                    width="100px">
                                            </div>
                                            <input type="file" name="main_image" placeholder="Choose image" id="image2"
                                                accept="image/x-png,image/jpeg"><br>
                                            <label> Introduction Title </label>
                                            <input type="text" name="intro_title" value="{{ old('$slider->intro_title') }}"
                                                class="form-control"><br>

                                            <label> Big Text </label>
                                            <input type="text" name="big_text" value="{{ old('$slider->big_text') }}"
                                                class="form-control"><br>

                                            <label> Description </label>
                                            <input type="text" name="description" value="{{ old('$slider->description') }}"
                                                class="form-control"><br>

                                            <label> Link </label>
                                            <input type="text" name="link" value="{{ old('$slider->link') }}"
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

    {{-- @if ($taxes->count() < 1) <div class="d-flex justify-content-center" style="min-height: 300px">
        Empty
</div>
@endif --}}
</div>

{{-- table --}}
@endsection