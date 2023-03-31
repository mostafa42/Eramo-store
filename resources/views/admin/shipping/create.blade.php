@extends('layouts.admin.master')
@section('title')
Create New Shippings
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
                    <a href="{{ route('admin.shippings.index') }}">Shippings</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Create New Shippings</li>

            </ol>
        </nav>
        <h2 class="h4">Create New Shippings</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.shippings.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('POST')
    <div class="card mb-4">

        <div class="card-body">



            <div class="row">





              {{-- text_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="text_ar">Text In Arabic <span class="text-danger">*</span></label>
                        <input dir="rtl" required type="text" name="text_ar" class="form-control @error('text_ar') is-invalid @enderror" value="{{ old('text_ar') }}">
                    </div>


                    @error('text_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- text_ar --}}


              {{-- text_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="text_en">Text In English <span class="text-danger">*</span></label>
                        <input required type="text" name="text_en" class="form-control @error('text_en') is-invalid @enderror" value="{{ old('text_en') }}">
                    </div>


                    @error('text_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- text_en --}}

                {{-- city_id --}}
                   <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="city_id">City <span class="text-danger">*</span></label>
                        <select  required name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror">

                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ?'selected':''}}>{{  $city->title_en }}</option>
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

                {{-- city_id --}}



            {{-- cost --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="cost">Cost <span class="text-danger">*</span></label>
                        <input required type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" value="{{ old('cost') }}">
                    </div>


                    @error('cost')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- cost --}}




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









    <button type="submit" class="btn btn-primary d-block m-auto">
        Create
        <i class="fas fa-plus icon icon-xs ms-2"></i>
    </button>
</form>



@endsection


@section('scripts')
<script>

$(document).ready(function() {
    $('#city_id').select2(
        {
            width: "100%"
        }
    );
});
</script>
@endsection
