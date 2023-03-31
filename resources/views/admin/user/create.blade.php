@extends('layouts.admin.master')
@section('title')
Create New User
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
                    <a href="{{ route('admin.users.index') }}">Users</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">Create New User</li>

            </ol>
        </nav>
        <h2 class="h4">Create New User</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('POST')
    <div class="card mb-4">
        <div class="card-header">
            User Info
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


                {{-- gender --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="gender">Gender <span class="text-danger">*</span></label>
                        <select  required name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror">
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
            Area
        </div>

        <div class="card-body">


            <div class="row">

                   {{-- country_id --}}
                   <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="country_id">Country <span class="text-danger">*</span></label>
                        <select required name="country_id" id="country_id" class="form-select @error('country_id') is-invalid @enderror">

                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" >{{  $country->title_en }}</option>
                            @endforeach
                        </select>
                    </div>


                    @error('country_id')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger" >
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- country_id --}}


                {{-- city_id --}}
                   <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label  for="city_id">City <span class="text-danger">*</span></label>
                        <select required name="city_id" id="city_id" class="form-select @error('city_id') is-invalid @enderror">


                            @foreach ($firstCountryCities as $city)
                            <option value="{{ $city->id }}" >{{  $city->title_en }}</option>
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
            </div>

        </div>
    </div>




    <div class="card mb-4">
        <div class="card-header">
            Image
        </div>

        <div class="card-body">
                {{-- image --}}

                     <span class="text-danger">Prefer {{ config('imageDimensions.users.width').'*'. config('imageDimensions.users.height') }} Pixels</span>
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
<script>

$(document).ready(function() {




    $('#city_id').select2(
        {
            width: "100%"
        }
    );


    $('#country_id').select2(
        {
            width: "100%",
        }
    );
});



let countrySelect = document.getElementById('country_id');
let citySelect = document.getElementById('city_id');

$('#country_id').on('select2:select', async function (e) {
    var id = e.params.data.id;
    try {
     let url = `{{ route('admin.cities.cityByCountryId') }}?country_id=${id}`;
                let res = await fetch(url) ;
                let data = await res.json();

                let options ='';
                if(data.length){
                   data.forEach((value, index, array) => {
                    options+= `<option value='${value.id}'>${value.title_en}</option>`
                   })
                }

                citySelect.innerHTML= options;
            } catch (error) {

            }

});





</script>
@endsection
