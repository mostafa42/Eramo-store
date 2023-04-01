@extends('layouts.admin.master')
@section('title')
Edit New Blog
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
                    <a href="{{ route('admin.blogs.index') }}">Blogs</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Edit Blog</li>

            </ol>
        </nav>
        <h2 class="h4">Edit  Blog</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('PUT')
    <div class="card mb-4">

        <div class="card-body">



            <div class="row">





              {{-- title_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_ar">Title In Arabic <span class="text-danger">*</span></label>
                        <input dir="rtl" required type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ $blog->title_ar }}">
                    </div>


                    @error('title_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- title_ar --}}


              {{-- title_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_en">Title In English <span class="text-danger">*</span></label>
                        <input required type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{$blog->title_en}}">
                    </div>


                    @error('title_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- title_en --}}


                {{-- details_ar --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="desc_ar"> Description In Arabic <span class="text-danger">*</span> </label>


                            <textarea editor dir="rtl" name="desc_ar" id="desc_ar" cols="30" rows="6"
                                class="form-control @error('desc_ar') is-invalid @enderror">{!! $blog->desc_ar !!}</textarea>
                        </div>


                        @error('desc_ar')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- details_ar --}}



                    {{-- details_en --}}
                    <div class="col-md-12">
                        <div class="form-group mb-4">
                            <label for="desc_en"> Description In English <span class="text-danger">*</span> </label>
                            <textarea editor name="desc_en" id="desc_en" cols="30" rows="6"
                                class="form-control @error('desc_en') is-invalid @enderror">{!! $blog->desc_en !!}</textarea>
                        </div>


                        @error('desc_en')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- details_en --}}




                {{-- status --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="status">Status <span class="text-danger">*</span></label>
                        <select required name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="1" {{ $blog->status =='1'?'selected':''}}>Active</option>
                            <option value="0" {{ $blog->status =='0'?'selected':''}}>InActive</option>
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


  <div class="card mb-4">
            <div class="card-header">
                 Image
            </div>


            <div class="card-body">
                {{-- primary_image --}}

                <span class="text-danger">Prefer {{ config('imageDimensions.blogs.width') . '*' . config('imageDimensions.blogs.height') }}
                    Pixels</span>
                <div class="form-group mb-4 d-flex justify-content-center">
                    <input data-default-file="{{ $blog->image }}" accept="image/*" type="file"
                        name="image" data-max-file-size="10M"
                        class="dropify @error('image') is-invalid @enderror" value="{{ old('image') }}">
                </div>


                @error('image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                @enderror

                {{-- primary_image --}}

            </div>
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
