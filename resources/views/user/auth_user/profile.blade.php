@extends('user.layout.authes')

@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>profile</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!-- personal deatail section start -->
    <section class="contact-page register-page">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>PERSONAL DETAIL</h3>
                    <div style="width: 60%; margin: auto">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                    <form class="theme-form" action="{{ url('update-profile') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter Your name"
                                    name="name" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="review">Phone number</label>
                                <input type="text" class="form-control" id="review" placeholder="Enter your number"
                                    name="phone" value="{{ $user->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email"
                                    value="{{ $user->email }}" name="email">
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-sm btn-solid" type="submit">Save setting</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- address section start -->
    <section class="contact-page register-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>SHIPPING ADDRESS</h3>
                    <form class="theme-form" action="{{ url('update-shipping-address') }}" method="POST">
                        @csrf
                        <div class="form-row row">
                            <div class="col-md-6">
                                <label for="name">flat / plot</label>
                                @if ($address && $address->flat)
                                    <input type="text" class="form-control" id="home-ploat" placeholder="flat / plot"
                                        name="flat" required="" value="{{ $address->flat }}">
                                @else
                                    <input type="text" class="form-control" id="home-ploat" placeholder="flat / plot"
                                        name="flat" required="">
                                @endif

                            </div>
                            <div class="col-md-6">
                                <label for="name">Address *</label>
                                @if ($address && $address->address)
                                    <input type="text" class="form-control" id="address-two" placeholder="Address"
                                        name="address" required="" value="{{ $address->address }}">
                                @else
                                    <input type="text" class="form-control" id="address-two" placeholder="Address"
                                        name="address" required="">
                                @endif

                            </div>
                            <div class="col-md-6 select_input">
                                <label for="review">Country *</label>
                                <select name="country_id" class="form-control" id="country">
                                    <option value="">Choose Country ----</option>
                                    @foreach ($countries as $county)
                                        <option value="{{ $county->id }}">{{ $county->title_en }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="email">Zip Code *</label>
                                <input type="number" disabled class="form-control" id="zip-code">
                                <input type="number" hidden class="form-control" id="zip-code2" name="zip_code">
                            </div>


                            <div class="col-md-6 select_input"">
                                <label for="city_id">City *</label>
                                <select name="city_id" class="form-control" id="cities">

                                </select>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-sm btn-solid" type="submit">Save setting</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->
@endsection
