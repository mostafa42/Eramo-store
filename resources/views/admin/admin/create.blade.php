@extends('layouts.admin.master')
@section('title')
Create New Admin
@endsection
@section('content')
{{-- on top --}}

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
        <nav aria-label="breadcrumb" class=" d-md-inline-block">
            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </a>
                </li>
                <li class="breadcrumb-item ">
                    <a href="{{ route('admin.admins.index') }}">Admins</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Create New Admin</li>

            </ol>
        </nav>
        <h2 class="h4">Create New Admin</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.admins.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('POST')
    <div class="card mb-4">
        <div class="card-header">
            Admin Info
        </div>

        <div class="card-body">



            <div class="row">


                {{-- name --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input required type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    </div>


                    @error('name')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- name --}}



                {{-- email --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input required type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>


                    @error('email')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- email --}}


              {{-- phone --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="phone">Phone <span class="text-danger">*</span></label>
                        <input required type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                    </div>


                    @error('phone')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- phone --}}


                {{-- status --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label required for="status">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="1" {{ old('status') =='1'?'selected':''}}>Active</option>
                            <option value="0" {{ old('status') =='0'?'selected':''}}>InActive</option>
                        </select>
                    </div>


                    @error('status')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- status --}}


                {{-- gender --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label required for="gender">Gender <span class="text-danger">*</span></label>
                        <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
                            <option value="male" {{ old('gender') =='male'?'selected':''}}>Male</option>
                            <option value="female" {{ old('gender') =='female'?'selected':''}}>Female</option>
                        </select>
                    </div>


                    @error('gender')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- gender --}}





            </div>

        </div>
    </div>




    <div class="card mb-4">
        <div class="card-header">
          Password
        </div>

        <div class="card-body">



            <div class="row">



              {{-- password --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input required type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                    </div>


                    @error('password')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- password --}}


                {{-- password_confirmation --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="password_confirmation">Password Confirmation <span class="text-danger">*</span></label>
                        <input required type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password_confirmation') }}">
                    </div>


                    @error('password_confirmation')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- password_confirmation --}}





            </div>

        </div>
    </div>




    <div class="card mb-4">
        <div class="card-header">
            Image
        </div>

        <div class="card-body">
                {{-- image --}}

                     <span class="text-danger">Prefer {{ config('imageDimensions.admins.width').'*'. config('imageDimensions.admins.height') }} Pixels</span>
                    <div class="form-group mb-4 d-flex justify-content-center">
                        <input accept="image/*"  type="file" name="image"  data-max-file-size="10M" class="dropify @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    </div>


                    @error('image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror

                {{-- image --}}

        </div>
    </div>



    <div class="card mb-4">
        <div class="card-header">
            Permissions <span class="text-danger">*</span>
        </div>

        <div class="card-body">




                <div class="accordion" id="accordionPermissions">


                    <div class="row">

                        @foreach ($permissions as $model => $cruds )
                        <div class="col-md-4">
                            <div class="accordion-item mb-4">
                                <h2 class="accordion-header" id="heading-{{ $model }}">
                                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $model }}" aria-expanded="false" aria-controls="{{ $model }}">
                                    @php
                                    $explodeed = explode('-' ,$model );
                                    $imploded = implode(' ', $explodeed );
                                    $model_with_capital_letters =ucfirst($imploded );
                                  @endphp
                                   {{ucwords( $model_with_capital_letters )}}
                                  </button>
                                </h2>
                                <div id="{{ $model }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $model }}" data-bs-parent="#accordionPermissions">
                                  <div class="accordion-body">


                                    @foreach ($cruds as $crud )
                                    <div class="form-group d-flex justify-content-between">
                                        <label for="{{ $model.'-'. $crud  }}">
                                            {{ ucwords($crud .' '. $model_with_capital_letters )  }}
                                        </label>
                                        <input id="{{ $model.'-'. $crud  }}" type="checkbox" name="permissions[]" value="{{ $model.'-'. $crud  }}"  class="form-check-input">
                                    </div>
                                    @endforeach
                                  </div>
                                </div>
                              </div>

                        </div>
                        @endforeach
                    </div>



                    @error('permissions')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror



        </div>

        </div>
    </div>




    <button type="submit" class="btn btn-primary d-block m-auto">
        Create
        <i class="fas fa-plus icon icon-xs ms-2"></i>
    </button>
</form>



@endsection
