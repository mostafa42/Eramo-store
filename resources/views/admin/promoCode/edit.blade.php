@extends('layouts.admin.master')
@section('title')
    Edit Promo Code
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
                        <a href="{{ route('admin.promo-codes.index') }}">Promo Codes</a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">Edit Promo Code</li>

                </ol>
            </nav>
            <h2 class="h4">Edit Promo Code</h2>

        </div>

    </div>






    {{-- on top --}}


    <form action="{{ route('admin.promo-codes.update', $promo->id) }}" method="POST" enctype="multipart/form-data">


        @csrf
        @method('PUT')
        <div class="card mb-4">

            <div class="card-body">



                <div class="row">





                    {{-- title --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="title">Promo Title <span class="text-danger">*</span></label>
                            <input required type="text" name="title"
                                class="form-control @error('title') is-invalid @enderror" value="{{ $promo->title }}">
                        </div>


                        @error('title')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- title --}}

                    {{-- maximum_times_of_use --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="maximum_times_of_use"> Maximum Times of Use <span
                                    class="text-danger">*</span></label>
                            <input required type="number" name="maximum_times_of_use"
                                class="form-control @error('maximum_times_of_use') is-invalid @enderror"
                                value="{{ $promo->maximum_times_of_use }}">
                        </div>


                        @error('maximum_times_of_use')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- maximum_times_of_use --}}


                    {{-- from --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="from">From Date <span class="text-danger">*</span></label>
                            <input required type="date" name="from"
                                class="form-control @error('from') is-invalid @enderror" value="{{ $promo->from }}">
                        </div>


                        @error('from')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- from --}}


                    {{-- to --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="to">To Date <span class="text-danger">*</span></label>
                            <input required type="date" name="to"
                                class="form-control @error('to') is-invalid @enderror" value="{{ $promo->to }}">
                        </div>


                        @error('to')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- to --}}





                    {{-- type --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="type">Promo Type <span class="text-danger">*</span></label>
                            <select required name="type" id="type"
                                class="form-select @error('type') is-invalid @enderror">
                                <option value="amount" {{ $promo->type == 'amount' ? 'selected' : '' }}>Amount</option>
                                <option value="percent" {{ $promo->type == 'percent' ? 'selected' : '' }}>Percent%</option>
                            </select>
                        </div>


                        @error('type')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- type --}}



                    {{-- value --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="value"> Promo Value <span class="text-danger">*</span></label>
                            <input required type="number" name="value"
                                class="form-control @error('value') is-invalid @enderror" value="{{ $promo->value }}">
                        </div>


                        @error('value')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- value --}}







                    {{-- status --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select required name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                                <option value="1" {{ $promo->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $promo->status == '0' ? 'selected' : '' }}>InActive</option>
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







        <div class="card  mb-4">

            <div class="card-body">
                {{-- @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif --}}

                <div class="row">

                    {{-- dedicated_to --}}
                    <div class="col-md-6">
                        <div class="form-group mb-4">
                            <label for="dedicated_to">Dedicated To <span class="text-danger">*</span></label>
                            <select required name="dedicated_to" id="dedicated_to"
                                class="form-select @error('dedicated_to') is-invalid @enderror">
                                <option value="all_users" {{ $promo->dedicated_to == 'all_users' ? 'selected' : '' }}>All Users
                                </option>
                                <option value="females" {{ $promo->dedicated_to == 'females' ? 'selected' : '' }}>Females
                                </option>
                                <option value="males" {{ $promo->dedicated_to == 'males' ? 'selected' : '' }}>Males</option>
                                <option value="spacial_user" {{ $promo->dedicated_to == 'spacial_user' ? 'selected' : '' }}>
                                    Spacial User</option>

                            </select>
                        </div>


                        @error('dedicated_to')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- dedicated_to --}}



                    {{-- user_id --}}
                    <div class="col-md-6">
                        {{-- style="display: none" --}}
                        <div class="form-group mb-4 users_select" style="display: {{ $promo->user ? 'block' : 'none' }}">
                            <label for="user_id">User <span class="text-danger">*</span></label>
                            <select name="user_id" id="user_id"
                                class="form-select @error('user_id') is-invalid @enderror">

                                <option value=>Saerch For User By Phone Or Email</option>

                                @if ($promo->user)
                                    <option value="{{ $promo->user->id }}" selected>
                                        {{ $promo->user->name . '-' . $promo->phone }}</option>
                                @endif
                            </select>
                        </div>


                        @error('user_id')
                            <div class="d-flex justify-content-center ">

                                <div class="text-danger">
                                    <strong>{{ $message }}</strong>
                                </div>
                            </div>
                        @enderror
                    </div>

                    {{-- user_id --}}





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




            $('#user_id').select2({
                ajax: {
                    url: '{{ route('admin.users.search') }}',
                    data: function(params) {
                        var query = {
                            search: params.term,
                        }

                        return query;
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name + ' - ' + item.phone,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });




        });


        let dedicatedToForm = document.getElementById('dedicated_to');

        let userSelectContainer = document.querySelector('.users_select');


        dedicatedToForm.addEventListener('change', function(event) {

            let selectVal = event.target.value;
            if (selectVal == 'spacial_user') {
                userSelectContainer.style.display = 'block';
            } else {
                userSelectContainer.style.display = 'none';
                document.getElementById('user_id').innerHTML = ''


            }
        })
    </script>
@endsection
