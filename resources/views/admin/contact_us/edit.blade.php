@extends('layouts.admin.master')
@section('title')
    Edit Contact Us
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
                        <a href="{{ route('admin.contact-us.index') }}">Contact Us</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit Contact Us</li>

                </ol>
            </nav>
            <h2 class="h4">Edit Contact Us</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.contact-us.update', $contact_us->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">

            <div class="card-body">



                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="facebook">Facebook <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $contact_us->facebook }}" required name="facebook" class="form-control  @error('facebook') is-invalid @enderror">
                        </div>


                        @error('facebook')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>


                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="linkedIn">LinkedIn <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $contact_us->linkedIn }}" required name="linkedIn" class="form-control  @error('linkedIn') is-invalid @enderror">
                        </div>


                        @error('linkedIn')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="instegram">Instegram <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $contact_us->instegram }}" required name="instegram" class="form-control  @error('instegram') is-invalid @enderror">
                        </div>


                        @error('instegram')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" value="{{ $contact_us->address }}" required name="address" class="form-control  @error('address') is-invalid @enderror">
                        </div>


                        @error('address')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" value="{{ $contact_us->email }}" required name="email" class="form-control  @error('email') is-invalid @enderror">
                        </div>


                        @error('email')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="phone1">Phone 1 <span class="text-danger">*</span></label>
                            <input type="tel" value="{{ $contact_us->phone1 }}" required name="phone1" class="form-control  @error('phone1') is-invalid @enderror">
                        </div>


                        @error('phone1')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-5">
                            <label for="phone2">Phone 2 <span class="text-danger">*</span></label>
                            <input type="tel" value="{{ $contact_us->phone2 }}" required name="phone2" class="form-control  @error('phone2') is-invalid @enderror">
                        </div>


                        @error('phone2')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>













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
