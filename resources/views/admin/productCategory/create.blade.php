@extends('layouts.admin.master')
@section('title')
Create New Products Category
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
                    <a href="{{ route('admin.products-categories.index') }}">Products Categories</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Create New Products Category</li>

            </ol>
        </nav>
        <h2 class="h4">Create New Products Category</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.products-categories.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('POST')
    <div class="card mb-4">
        <div class="card-header">
            Basic Information
        </div>

        <div class="card-body">



            <div class="row">





              {{-- title_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_ar">Title In Arabic <span class="text-danger">*</span></label>
                        <input dir="rtl" required type="text" name="title_ar" class="form-control @error('title_ar') is-invalid @enderror" value="{{ old('title_ar') }}">
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
                        <input required type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror" value="{{ old('title_en') }}">
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











                {{-- parent_id --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="parent_id">Parent Category <span class="text-danger">*</span></label>
                        <select   name="parent_id" id="parent_id" class="form-select @error('parent_id') is-invalid @enderror">
                            <option value="" {{ old('parent_id') ==''?'selected':''}}>Main Category</option>

                            @foreach ( $mainCategories as $category )
                            <option value="{{ $category->id }}" {{ old('parent_id') ==$category->id ?'selected':''}}>{{ $category->title_en .' - '. $category->title_ar }}</option>

                            @endforeach
                        </select>
                    </div>


                    @error('parent_id')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- parent_id --}}


                {{-- status --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="status">Status <span class="text-danger">*</span></label>
                        <select  required name="status" id="status" class="form-select @error('status') is-invalid @enderror">
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










            </div>

        </div>
    </div>








    <div class="card mb-4">
        <div class="card-header">
            Summary
        </div>

        <div class="card-body">


            <div class="row">


        {{-- summary_ar --}}
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="summary_ar">  Summary In Arabic <span class="text-danger">*</span> </label>


            <textarea editor  dir="rtl" name="summary_ar" id="summary_ar"   cols="30" rows="6" class="form-control @error('summary_ar') is-invalid @enderror">{!! old('summary_ar') !!}</textarea>
        </div>


        @error('summary_ar')
        <div class="d-flex justify-content-center ">

            <div class="text-danger" >
                <strong>{{ $message }}</strong>
            </div>
        </div>
        @enderror
    </div>

    {{-- summary_ar --}}



{{-- summary_en --}}
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="summary_en">  Summary In English <span class="text-danger">*</span> </label>
            <textarea editor  name="summary_en" id="summary_en"   cols="30" rows="6" class="form-control @error('summary_en') is-invalid @enderror">{!! old('summary_en') !!}</textarea>
        </div>


        @error('summary_en')
        <div class="d-flex justify-content-center ">

            <div class="text-danger" >
                <strong>{{ $message }}</strong>
            </div>
        </div>
        @enderror
    </div>

{{-- summary_en --}}



            </div>

        </div>
    </div>














    <div class="card mb-4">

        <div class="card-header">
            SEO (Search Engine Optimization) Information


        </div>

        <div class="card-body">

            <div class="row">





            {{-- description_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_ar">  Meta Description  In Arabic </label>


                        <textarea  dir="rtl" name="description_ar" id="description_ar"   cols="30" rows="3" class="form-control @error('description_ar') is-invalid @enderror">{{old('description_ar')}}</textarea>
                    </div>


                    @error('description_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- description_ar --}}



            {{-- description_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_en">  Meta Description  In English </label>


                        <textarea  name="description_en" id="description_en"   cols="30" rows="3" class="form-control @error('description_en') is-invalid @enderror">{{  old('description_en')}}</textarea>
                    </div>


                    @error('description_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- description_en --}}






            {{-- keywords_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="keywords_ar">  Meta Keywords In Arabic </label>


                        <textarea  dir="rtl" name="keywords_ar" id="keywords_ar"   cols="30" rows="2" class="form-control @error('keywords_ar') is-invalid @enderror">{{old('keywords_ar')}}</textarea>
                    </div>


                    @error('keywords_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- keywords_ar --}}



            {{-- keywords_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="keywords_en">  Meta Keywords In English </label>


                        <textarea  name="keywords_en" id="keywords_en"   cols="30" rows="2" class="form-control @error('keywords_en') is-invalid @enderror">{{old('keywords_en')}}</textarea>
                    </div>


                    @error('keywords_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- keywords_en --}}























            </div>

        </div>
        </div>











    <div class="card mb-4">
        <div class="card-header">
            Image
        </div>

        <div class="card-body">
                {{-- image --}}

                     <span class="text-danger">Prefer {{ config('imageDimensions.products_categories.width').'*'. config('imageDimensions.products_categories.height') }} Pixels</span>
                    <div class="form-group mb-4 d-flex justify-content-center">
                        <input accept="image/*" type="file" name="image"  data-max-file-size="10M" class="dropify @error('image') is-invalid @enderror" value="{{ old('image') }}">
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










    <button type="submit" class="btn btn-primary d-block m-auto">
        Create
        <i class="fas fa-plus icon icon-xs ms-2"></i>
    </button>
</form>



@endsection



@section('scripts')
<script src="{{  asset('layouts/admin/js/ckeditor.js')  }}"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#summary_ar' ), {
        language: 'ar',
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },



            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );
    ClassicEditor
    .create( document.querySelector( '#summary_en' ), {
        toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },

            ]
        }
    } )
    .catch( error => {
        console.log( error );
    } );



    $('#parent_id').select2(
        {
            width: "100%"
        }
    );


</script>

@endsection
