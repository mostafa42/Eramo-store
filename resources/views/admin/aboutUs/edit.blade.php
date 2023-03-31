@extends('layouts.admin.master')
@section('title')
    Edit About Us
@endsection
@section('content')
    {{-- on top --}}

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
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
                    <li class="breadcrumb-item ">
                        <a href="{{ route('admin.about-us.index') }}">About Us</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit About Us</li>

                </ol>
            </nav>
            <h2 class="h4">Edit About Us</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.about-us.update', $about_us->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">

            <div class="card-body">



                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="about_us_ar">Title In Arabic <span class="text-danger">*</span></label>
                            <input required type="text" name="video_link" value="{{ $about_us->video_link }}"
                                class="form-control @error('video_link') is-invalid @enderror">

                        </div>


                        @error('video_link')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title_ar --}}
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="about_us_ar">Title In Arabic <span class="text-danger">*</span></label>
                            <textarea rows="10" dir="rtl" required type="text" name="about_us_ar"
                                class="form-control @error('about_us_ar') is-invalid @enderror">
                                {{ $about_us->about_us_ar }}
                            </textarea>
                        </div>


                        @error('about_us_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title_ar --}}

                    {{-- title_ar --}}
                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="about_us_en">Title In English <span class="text-danger">*</span></label>
                            <textarea rows="10" dir="rtl" required type="text" name="about_us_en"
                                class="form-control @error('about_us_en') is-invalid @enderror">
                                {{ $about_us->about_us_en }}
                            </textarea>


                        </div>


                        @error('about_us_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title_ar --}}













                </div>

            </div>
        </div>









        <button type="submit" class="btn btn-primary d-block m-auto">
            Edit
            <i class="fa-regular fa-pen-to-square icon icon-xs ms-2"></i>
        </button>
    </form>
@endsection


@section('scripts')
    <script>
        $(document).ready(function() {
            $('#country_id').select2({
                width: "100%"
            });
        });
    </script>
@endsection
