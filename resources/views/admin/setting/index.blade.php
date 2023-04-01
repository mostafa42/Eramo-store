@extends('layouts.admin.master')
@section('title')
App Settings
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


                <li class="breadcrumb-item active" aria-current="page">App Settings</li>

            </ol>
        </nav>
        <h2 class="h4">App Settings</h2>

    </div>

</div>






{{-- on top --}}


<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">


    @csrf
    @method('PUT')
    <div class="card my-4">

        <div class="card-header">
            Basic Information
        </div>

        <div class="card-body">



            <div class="row">

                {{-- title_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_ar"> App Title In Arabic </label>
                        <input dir="rtl" type="text" name="title_ar"
                            class="form-control @error('title_ar') is-invalid @enderror"
                            value="{{ $settings->title_ar }}">
                    </div>


                    @error('title_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- title_ar --}}


                {{-- title_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="title_en"> App Title In English </label>
                        <input type="text" name="title_en" class="form-control @error('title_en') is-invalid @enderror"
                            value="{{ $settings->title_en }}">
                    </div>


                    @error('title_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- title_en --}}





                {{-- nickname_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="nickname_ar"> App Nickname In Arabic </label>
                        <input dir="rtl" type="text" name="nickname_ar"
                            class="form-control @error('nickname_ar') is-invalid @enderror"
                            value="{{ $settings->nickname_ar }}">
                    </div>


                    @error('nickname_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- nickname_ar --}}


                {{-- nickname_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="nickname_en"> App Nickname In English </label>
                        <input type="text" name="nickname_en"
                            class="form-control @error('nickname_en') is-invalid @enderror"
                            value="{{ $settings->nickname_en }}">
                    </div>


                    @error('nickname_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- nickname_en --}}



                {{-- slogan_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="slogan_ar"> App Slogan In Arabic </label>
                        <input dir="rtl" type="text" name="slogan_ar"
                            class="form-control @error('slogan_ar') is-invalid @enderror"
                            value="{{ $settings->slogan_ar }}">
                    </div>


                    @error('slogan_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- slogan_ar --}}


                {{-- slogan_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="slogan_en"> App Slogan In English </label>
                        <input type="text" name="slogan_en"
                            class="form-control @error('slogan_en') is-invalid @enderror"
                            value="{{ $settings->slogan_en }}">
                    </div>


                    @error('slogan_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- slogan_en --}}



                {{-- summary_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="summary_ar"> App Summary In Arabic </label>


                        <textarea dir="rtl" name="summary_ar" id="summary_ar" cols="30" rows="6"
                            class="form-control @error('summary_ar') is-invalid @enderror">{{ $settings->summary_ar }}</textarea>
                    </div>


                    @error('summary_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- summary_ar --}}



                {{-- summary_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="summary_en"> App Summary In English </label>


                        <textarea name="summary_en" id="summary_en" cols="30" rows="6"
                            class="form-control @error('summary_en') is-invalid @enderror">{{ $settings->summary_en }}</textarea>
                    </div>


                    @error('summary_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- summary_en --}}






                {{-- status --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="status">Status </label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="1" {{ $settings->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $settings->status == '0' ? 'selected' : '' }}>InActive</option>
                        </select>
                    </div>


                    @error('status')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- status --}}








            </div>

        </div>
    </div>



    <div class="card my-4">

        <div class="card-header">
            SEO (Search Engine Optimization) Information


        </div>

        <div class="card-body">

            <div class="row">





                {{-- description_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_ar"> App Meta Description In Arabic </label>


                        <textarea dir="rtl" name="description_ar" id="description_ar" cols="30" rows="3"
                            class="form-control @error('description_ar') is-invalid @enderror">{{ $settings->description_ar }}</textarea>
                    </div>


                    @error('description_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- description_ar --}}



                {{-- description_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_en"> App Meta Description In English </label>


                        <textarea name="description_en" id="description_en" cols="30" rows="3"
                            class="form-control @error('description_en') is-invalid @enderror">{{ $settings->description_en }}</textarea>
                    </div>


                    @error('description_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- description_en --}}






                {{-- keywords_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="keywords_ar"> App Meta Keywords In Arabic </label>


                        <textarea dir="rtl" name="keywords_ar" id="keywords_ar" cols="30" rows="2"
                            class="form-control @error('keywords_ar') is-invalid @enderror">{{ $settings->keywords_ar }}</textarea>
                    </div>


                    @error('keywords_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- keywords_ar --}}



                {{-- keywords_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="keywords_en"> App Meta Keywords In English </label>


                        <textarea name="keywords_en" id="keywords_en" cols="30" rows="2"
                            class="form-control @error('keywords_en') is-invalid @enderror">{{ $settings->keywords_en }}</textarea>
                    </div>


                    @error('keywords_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- keywords_en --}}























            </div>

        </div>
    </div>











    <div class="card my-4">

        <div class="card-header">
            Contacts Information


        </div>

        <div class="card-body">

            <span class="d-block mb-5 text-danger">You can add multiple items by adding <strong
                    style="font-size: 40px">&#44;</strong> after the end of each item </span>



            <div class="row">





                {{-- address_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="address_ar"> App Address In Arabic </label>


                        <textarea dir="rtl" name="address_ar" id="address_ar" cols="30" rows="2"
                            class="form-control @error('address_ar') is-invalid @enderror">{{ implode(' , ', $settings->address_ar) }}</textarea>
                    </div>


                    @error('address_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- address_ar --}}



                {{-- address_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="address_en"> App Address In English </label>


                        <textarea name="address_en" id="address_en" cols="30" rows="2"
                            class="form-control @error('address_en') is-invalid @enderror">{{ implode(' , ', $settings->address_en) }}</textarea>
                    </div>


                    @error('address_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- address_en --}}




                {{-- emails --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="emails"> App Emails </label>


                        <textarea name="emails" id="emails" cols="30" rows="2"
                            class="form-control @error('emails') is-invalid @enderror">{{ implode(' , ', $settings->emails) }}</textarea>
                    </div>


                    @error('emails')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- emails --}}



                {{-- faxes --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="faxes"> App Faxes </label>


                        <textarea name="faxes" id="faxes" cols="30" rows="2"
                            class="form-control @error('faxes') is-invalid @enderror">{{ implode(' , ', $settings->faxes) }}</textarea>
                    </div>


                    @error('faxes')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- faxes --}}



                {{-- phone_numbers --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="phone_numbers"> App Phone Numbers </label>


                        <textarea name="phone_numbers" id="phone_numbers" cols="30" rows="2"
                            class="form-control @error('phone_numbers') is-invalid @enderror">{{ implode(' , ', $settings->phone_numbers) }}</textarea>
                    </div>


                    @error('phone_numbers')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- phone_numbers --}}


                {{-- map_iframe --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="map_iframe"> Map Iframe </label>

                        <textarea name="map_iframe" class="form-control @error('map_iframe') is-invalid @enderror"
                            id="map_iframe" cols="30" rows="2">{{ $settings->map_iframe }}</textarea>
                    </div>


                    @error('map_iframe')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- map_iframe --}}













            </div>

        </div>
    </div>






    {{--

    <div class="card my-4">

        <div class="card-header">
            Map Location Information
        </div>

        <div class="card-body">



            <div class="row">



                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="map_latitude"> Map Latitude </label>
                        <input type="text" name="map_latitude"
                            class="form-control @error('map_latitude') is-invalid @enderror"
                            value="{{ $settings->map_latitude }}">
                    </div>


                    @error('map_latitude')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>




                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="map_longitude"> Map Longitude </label>
                        <input type="text" name="map_longitude"
                            class="form-control @error('map_longitude') is-invalid @enderror"
                            value="{{ $settings->map_longitude }}">
                    </div>


                    @error('map_longitude')
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

    --}}

    {{-- @if ($settings->map_latitude && $settings->map_longitude)
    <div class="card card-body my-4">



        <iframe
            src="https://maps.google.com/maps?q={{ $settings->map_latitude }},{{ $settings->map_longitude }}&hl=en&z=14&amp;output=embed"
            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>


    </div>
    @endif --}}











    @if ($settings->map_iframe)
    <div class="card card-body my-4 text-center">

        <div class="d-flex justify-content-center">
            {!! $settings->map_iframe !!}
        </div>
    </div>
    @endif






    <div class="card my-4">

        <div class="card-header">
            App Currency
        </div>

        <div class="card-body">



            <div class="row">




                {{-- currency_name_ar --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="currency_name_ar"> Currency Name In Arabic </label>
                        <input dir="rtl" type="text" name="currency_name_ar"
                            class="form-control @error('currency_name_ar') is-invalid @enderror"
                            value="{{ $settings->currency_name_ar }}">
                    </div>


                    @error('currency_name_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- currency_name_ar --}}


                {{-- currency_name_en --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="currency_name_en"> Currency Name In English </label>
                        <input type="text" name="currency_name_en"
                            class="form-control @error('currency_name_en') is-invalid @enderror"
                            value="{{ $settings->currency_name_en }}">
                    </div>


                    @error('currency_name_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- currency_name_en --}}





                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_verification_ar"> description verification In arabic </label>
                        <input type="text" name="description_verification_ar"
                            class="form-control @error('description_verification_ar') is-invalid @enderror"
                            value="{{ $settings->description_verification_ar }}">
                    </div>


                    @error('description_verification_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>



                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="description_verification_en"> description verification In english </label>
                        <input type="text" name="description_verification_en"
                            class="form-control @error('description_verification_en') is-invalid @enderror"
                            value="{{ $settings->description_verification_en }}">
                    </div>


                    @error('description_verification_en')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>



                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="text_verification_ar"> text verification In arabic </label>
                        <input type="text" name="text_verification_ar"
                            class="form-control @error('text_verification_ar') is-invalid @enderror"
                            value="{{ $settings->text_verification_ar }}">
                    </div>


                    @error('text_verification_ar')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="text_verification_ar"> text verification In english </label>
                        <input type="text" name="text_verification_en"
                            class="form-control @error('text_verification_en') is-invalid @enderror"
                            value="{{ $settings->text_verification_en }}">
                    </div>


                    @error('text_verification_en')
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


    <div class="card my-4">

        <div class="card-header">
            Social Accounts Links
        </div>

        <div class="card-body">



            <div class="row">



                {{-- facebook_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="facebook_link">FaceBook </label>
                        <input type="text" name="facebook_link"
                            class="form-control @error('facebook_link') is-invalid @enderror"
                            value="{{ $settings->facebook_link }}">
                    </div>


                    @error('facebook_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- facebook_link --}}


                {{-- instagram_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="instagram_link">Instagram </label>
                        <input type="text" name="instagram_link"
                            class="form-control @error('instagram_link') is-invalid @enderror"
                            value="{{ $settings->instagram_link }}">
                    </div>


                    @error('instagram_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- instagram_link --}}



                {{-- twitter_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="twitter_link">Twitter </label>
                        <input type="text" name="twitter_link"
                            class="form-control @error('twitter_link') is-invalid @enderror"
                            value="{{ $settings->twitter_link }}">
                    </div>


                    @error('twitter_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- twitter_link --}}


                {{-- youtube_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="youtube_link">Youtube </label>
                        <input type="text" name="youtube_link"
                            class="form-control @error('youtube_link') is-invalid @enderror"
                            value="{{ $settings->youtube_link }}">
                    </div>


                    @error('youtube_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- youtube_link --}}



                {{-- tiktok_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="tiktok_link">TikTok </label>
                        <input type="text" name="tiktok_link"
                            class="form-control @error('tiktok_link') is-invalid @enderror"
                            value="{{ $settings->tiktok_link }}">
                    </div>


                    @error('tiktok_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- tiktok_link --}}




                {{-- linkedin_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="linkedin_link">LinkedIn </label>
                        <input type="text" name="linkedin_link"
                            class="form-control @error('linkedin_link') is-invalid @enderror"
                            value="{{ $settings->linkedin_link }}">
                    </div>


                    @error('linkedin_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- linkedin_link --}}



                {{-- pinterest_link --}}
                <div class="col-md-6">
                    <div class="form-group mb-4">
                        <label for="pinterest_link">Pinterest </label>
                        <input type="text" name="pinterest_link"
                            class="form-control @error('pinterest_link') is-invalid @enderror"
                            value="{{ $settings->pinterest_link }}">
                    </div>


                    @error('pinterest_link')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror
                </div>

                {{-- pinterest_link --}}














            </div>

        </div>
    </div>



    <div class="card my-4">

        <div class="card-header">
            Logo
        </div>

        <div class="card-body">



            <div class="row">


                {{-- logo --}}

                <div class="col-md-6">



                    {{-- <span>Prefer 180*180 Pexel</span> --}}
                    <label for="map_longitude"> Logo </label>
                    <div class="form-group mb-4 d-flex justify-content-center">


                        <input accept="image/*" type="file" name="logo" data-default-file="{{ $settings->logo_url }}"
                            data-max-file-size="10M" class="dropify @error('logo') is-invalid @enderror"
                            value="{{ old('logo') }}">
                    </div>


                    @error('logo')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror


                </div>

                {{-- logo --}}



                {{-- logo_light --}}

                <div class="col-md-6">



                    {{-- <span>Prefer 180*180 Pexel</span> --}}
                    <label for="map_longitude"> Logo Light </label>
                    <div class="form-group mb-4 d-flex justify-content-center">


                        <input accept="image/*" type="file" name="logo_light"
                            data-default-file="{{ $settings->logo_light_url }}" data-max-file-size="10M"
                            class="dropify @error('logo_light') is-invalid @enderror" value="{{ old('logo_light') }}">
                    </div>


                    @error('logo_light')
                    <div class="d-flex justify-content-center ">

                        <div class="text-danger">
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                    @enderror


                </div>

                {{-- logo_light --}}






                <div class="col-md-6">



                    {{-- <span>Prefer 180*180 Pexel</span> --}}
                    <label for="map_longitude"> verification banner </label>
                    <div class="form-group mb-4 d-flex justify-content-center">


                        <input accept="image/*" type="file" name="logo_light"
                            data-default-file="{{ $settings->verification_banner }}" data-max-file-size="10M"
                            class="dropify @error('verification_banner') is-invalid @enderror"
                            value="{{ old('verification_banner') }}">
                    </div>


                    @error('verification_banner')
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