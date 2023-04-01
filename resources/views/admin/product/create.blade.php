@extends('layouts.admin.master')
@section('title')
Create New Product
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
                    <a href="{{ route('admin.products.index') }}">Products</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Create New Product</li>

            </ol>
        </nav>
        <h2 class="h4">Create New Product</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('POST')


    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif


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

                      <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="material">material<span class="text-danger">*</span></label>
                        <input required type="text" name="material" class="form-control @error('material') is-invalid @enderror" value="{{ old('material   ') }}">
                    </div>


                    @error('material')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- model_number --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="model_number">Model Number</label>
                        <input  type="text" name="model_number" class="form-control @error('model_number') is-invalid @enderror" value="{{ old('model_number') }}">
                    </div>


                    @error('model_number')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- model_number --}}

                {{-- sku_number --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="sku_number">SKU Number</label>
                        <input  type="text" name="sku_number" class="form-control @error('sku_number') is-invalid @enderror" value="{{ old('sku_number') }}">
                    </div>


                    @error('sku_number')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- sku_number --}}



                {{-- sku_number --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="shipping">Shipping</label>
                        <input  type="text" name="shipping" class="form-control @error('shipping') is-invalid @enderror" value="{{ old('shipping') }}">
                    </div>


                    @error('shipping')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- sku_number --}}



            {{-- stock --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="stock">Stock <span class="text-danger">*</span></label>
                        <input minlength="0" value="{{ old('stock')? old('stock') :'100' }}" required type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}">
                    </div>


                    @error('stock')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- stock --}}


            {{-- purchase_price --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="purchase_price">Purchase Price  (EGP) <span class="text-danger">*</span></label>
                        <input minlength="0" min="1" value="{{ old('purchase_price')}}" required type="number" name="purchase_price" class="form-control @error('purchase_price') is-invalid @enderror" value="{{ old('purchase_price') }}">
                    </div>


                    @error('purchase_price')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- purchase_price --}}

                {{-- real_price --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="real_price">Real Price  (EGP) <span class="text-danger">*</span></label>
                        <input minlength="0" min="1" value="{{ old('real_price')}}" required type="number" name="real_price" class="form-control @error('real_price') is-invalid @enderror" value="{{ old('real_price') }}">
                    </div>


                    @error('real_price')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- real_price --}}


                {{-- fake_price --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="fake_price">Fake Price  (EGP) <span class="text-danger">*</span></label>
                        <input minlength="0" min="1" value="{{ old('fake_price')}}" required type="number" name="fake_price" class="form-control @error('fake_price') is-invalid @enderror" value="{{ old('fake_price') }}">
                    </div>


                    @error('fake_price')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- fake_price --}}






                {{-- main_category_id --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="main_category_id">Main Category <span class="text-danger">*</span></label>
                        <select  required name="main_category_id" id="main_category_id" class="form-select @error('main_category_id') is-invalid @enderror">

                            @foreach ($mainCategories as $main_category)
                            <option value="{{ $main_category->id }}" >{{ $main_category->title_en .' - ' .$main_category->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('main_category_id')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- main_category_id --}}






{{-- city_id --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="city_id">City <span class="text-danger">*</span></label>
                        <select  required name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror">

                            @foreach (App\Models\City::get() as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') ==$city->id?'selected':''}}>{{ $city->title_en .' - ' .$city->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('city_id')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- category_id --}}








                {{-- category_id --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="category_id">Sub Category <span class="text-danger">*</span></label>
                        <select  required name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">

                            @foreach ($firstMainCategorySubCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" {{ old('category_id') ==$subCategory->id?'selected':''}}>{{ $subCategory->title_en .' - ' .$subCategory->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('category_id')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- category_id --}}


            {{-- taxes --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="taxes">Taxes </label>
                        <select multiple  name="taxes[]" id="taxes" class="form-select @error('taxes') is-invalid @enderror">

                            {{-- <option value="" {{ !old('taxes')  ?'selected':'' }}>No Taxes</option> --}}

                            @foreach ($taxes as $tax)
                            <option  value="{{ $tax->id }}" {{ (collect(old('taxes'))->contains($tax->id)) ?'selected':''}}  >{{ $tax->title_en .' - ' .$tax->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('taxes')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- taxes --}}






                          <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="colors">Colors </label>
                        <select multiple  name="colors[]" id="colors" class="form-select @error('colors') is-invalid @enderror">
                            @foreach (App\Models\Color::get() as $color)
                            <option  value="{{ $color->code }}" >{{ $color->name}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('colors')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>






                            {{-- taxes --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="taxes">Sizes </label>
                        <select multiple  name="sizes[]" id="sizes" class="form-select @error('sizes') is-invalid @enderror">
                            <option  value="s" >small  - صغير</option>
                            <option  value="m" >medium -  متوسط</option>
                            <option  value="l" >large  -  لارج</option>
                            <option  value="xl">xlarge  -  اكس لارج</option>
                            <option  value="xxl">xxlarge  -  اكس اكس لارج</option>
                            <option  value="xxxl">xxxlarge  -  اكس اكس اكس لارج</option>

                        </select>
                    </div>


                    @error('sizes')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- taxes --}}

                {{-- products_with --}}
                  <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="products_with">Add Products With </label>
                        <select multiple  name="products_with[]" id="products_with" class="form-select @error('products_with') is-invalid @enderror">

                            {{-- <option value="" {{ !old('products_with')  ?'selected':'' }}>No Taxes</option> --}}

                            @foreach ($products as $product_item)
                            <option  value="{{ $product_item->id }}" {{ (collect(old('products_with'))->contains($product_item->id)) ?'selected':''}}  >{{ $product_item->title_en .' - ' .$product_item->title_ar}}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('products_with')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- products_with --}}


            {{-- to --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="to">To <span class="text-danger">*</span></label>
                        <input  value="{{ old('to')}}" required type="date" name="to" class="form-control @error('to') is-invalid @enderror" value="{{ old('to') }}">
                    </div>


                    @error('to')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- to --}}



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
            Details
        </div>

        <div class="card-body">


            <div class="row">


        {{-- details_ar --}}
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="details_ar">  Details In Arabic <span class="text-danger">*</span> </label>


            <textarea editor  dir="rtl" name="details_ar" id="details_ar"   cols="30" rows="6" class="form-control @error('details_ar') is-invalid @enderror">{!! old('details_ar') !!}</textarea>
        </div>


        @error('details_ar')
        <div class="d-flex justify-content-center ">

            <div class="text-danger" >
                <strong>{{ $message }}</strong>
            </div>
        </div>
        @enderror
    </div>

    {{-- details_ar --}}



{{-- details_en --}}
    <div class="col-md-12">
        <div class="form-group mb-4">
            <label for="details_en">  Details In English <span class="text-danger">*</span> </label>
            <textarea editor  name="details_en" id="details_en"   cols="30" rows="6" class="form-control @error('details_en') is-invalid @enderror">{!! old('details_en') !!}</textarea>
        </div>


        @error('details_en')
        <div class="d-flex justify-content-center ">

            <div class="text-danger" >
                <strong>{{ $message }}</strong>
            </div>
        </div>
        @enderror
    </div>

{{-- details_en --}}



            </div>

        </div>
    </div>







    <div class="card mb-4">

        <div class="card-header">
           More Information


        </div>

        <div class="card-body">

            <div class="row">










            {{-- features_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="features_ar">  Features In Arabic <span class="text-danger">*</span> </label>


                        <textarea required dir="rtl" name="features_ar" id="features_ar"   cols="30" rows="2" class="form-control @error('features_ar') is-invalid @enderror">{{old('features_ar')}}</textarea>
                    </div>


                    @error('features_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- features_ar --}}



            {{-- features_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="features_en">  Features In English <span class="text-danger">*</span> </label>


                        <textarea required  name="features_en" id="features_en"   cols="30" rows="2" class="form-control @error('features_en') is-invalid @enderror">{{old('features_en')}}</textarea>
                    </div>


                    @error('features_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- features_en --}}






                            {{-- instructions_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="instructions_ar">  Instructions In Arabic <span class="text-danger">*</span> </label>


                        <textarea required dir="rtl" name="instructions_ar" id="instructions_ar"   cols="30" rows="2" class="form-control @error('instructions_ar') is-invalid @enderror">{{old('instructions_ar')}}</textarea>
                    </div>


                    @error('instructions_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- instructions_ar --}}



            {{-- instructions_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="instructions_en">  Instructions In English <span class="text-danger">*</span> </label>


                        <textarea required  name="instructions_en" id="instructions_en"   cols="30" rows="2" class="form-control @error('instructions_en') is-invalid @enderror">{{old('instructions_en')}}</textarea>
                    </div>


                    @error('instructions_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- instructions_en --}}





             {{-- summary_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="summary_ar">  Summary In Arabic <span class="text-danger">*</span> </label>


                        <textarea required dir="rtl" name="summary_ar" id="summary_ar"   cols="30" rows="2" class="form-control @error('summary_ar') is-invalid @enderror">{{old('summary_ar')}}</textarea>
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
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="summary_en">  Summary In English <span class="text-danger">*</span> </label>


                        <textarea required  name="summary_en" id="summary_en"   cols="30" rows="2" class="form-control @error('summary_en') is-invalid @enderror">{{old('summary_en')}}</textarea>
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



                {{-- extras_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="extras_ar">  Extras In Arabic <span class="text-danger">*</span> </label>


                        <textarea required dir="rtl" name="extras_ar" id="extras_ar"   cols="30" rows="2" class="form-control @error('extras_ar') is-invalid @enderror">{{old('extras_ar')}}</textarea>
                    </div>


                    @error('extras_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- extras_ar --}}



            {{-- extras_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="extras_en">  Extras In English <span class="text-danger">*</span> </label>


                        <textarea required  name="extras_en" id="extras_en"   cols="30" rows="2" class="form-control @error('extras_en') is-invalid @enderror">{{old('extras_en')}}</textarea>
                    </div>


                    @error('extras_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- extras_en --}}




















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
                        <label for="description_ar">  Meta Description  In Arabic <span class="text-danger">*</span></label>


                        <textarea required  dir="rtl" name="description_ar" id="description_ar"   cols="30" rows="3" class="form-control @error('description_ar') is-invalid @enderror">{{old('description_ar')}}</textarea>
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
                        <label for="description_en">  Meta Description  In English <span class="text-danger">*</span></label>


                        <textarea  required name="description_en" id="description_en"   cols="30" rows="3" class="form-control @error('description_en') is-invalid @enderror">{{  old('description_en')}}</textarea>
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
                        <label for="keywords_ar">  Meta Keywords In Arabic <span class="text-danger">*</span> </label>


                        <textarea required dir="rtl" name="keywords_ar" id="keywords_ar"   cols="30" rows="2" class="form-control @error('keywords_ar') is-invalid @enderror">{{old('keywords_ar')}}</textarea>
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
                        <label for="keywords_en">  Meta Keywords In English <span class="text-danger">*</span> </label>


                        <textarea required  name="keywords_en" id="keywords_en"   cols="30" rows="2" class="form-control @error('keywords_en') is-invalid @enderror">{{old('keywords_en')}}</textarea>
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
          Primary   Image <span class="text-danger">*</span>
        </div>

        <div class="card-body">
                {{-- primary_image --}}

                     <span class="text-danger">Prefer {{ config('imageDimensions.products.width').'*'. config('imageDimensions.products.height') }} Pixels</span>
                    <div class="form-group mb-4 d-flex justify-content-center">
                        <input required  accept="image/*" type="file" name="primary_image"  data-max-file-size="10M" class="dropify @error('primary_image') is-invalid @enderror" value="{{ old('primary_image') }}">
                    </div>


                    @error('primary_image')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror

                {{-- primary_image --}}

        </div>
    </div>




    <div class="card mb-4">
        <div class="card-header">
          Slider   Images
        </div>

        <div class="card-body">
                {{-- images --}}

                     <span class="text-danger">Prefer 600*600 Pixels</span>
                    <div class="form-group mb-4 d-flex justify-content-center">

                        <input accept="image/*" multiple id="images"  type="file" name="images[]"   class=" @error('images') is-invalid @enderror" value="{{ old('images') }}">
                    </div>

                    <div class="py-3 " id="preview-images-container">

                    </div>


                    @error('images')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror

                {{-- images --}}

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
<script src="{{  asset('layouts/admin/js/perview-images.js')  }}"></script>

<script>
    ClassicEditor
    .create( document.querySelector( '#details_ar' ), {
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
    .create( document.querySelector( '#details_en' ), {
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



    $('#taxes').select2(
        {
            width: "100%"
        }
    );

    $('#category_id').select2(
        {
            width: "100%"
        }
    );


    $('#main_category_id').select2(
        {
            width: "100%"
        }
    );

    $('#products_with').select2(
        {
            width: "100%"
        }
    );



    let mainCategoriesSelect = document.getElementById('main_category_id');
let subCategoriesSelect = document.getElementById('category_id');

$('#main_category_id').on('select2:select', async function (e) {
    var id = e.params.data.id;
    try {
     let url = `{{ route('admin.products-categories.subCategoryByParentId') }}?id=${id}`;
                let res = await fetch(url) ;
                let data = await res.json();

                let options ='';
                if(data.length){
                   data.forEach((value, index, array) => {
                    options+= `<option value='${value.id}'>${value.title_en} - ${value.title_ar} </option>`
                   })
                }

                subCategoriesSelect.innerHTML= options;
            } catch (error) {

            }

});


</script>

@endsection
