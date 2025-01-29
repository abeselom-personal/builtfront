@extends('frontend.layout-v2.master')
@section('title', 'Sign In')

@section('content')
    <div class="container py-10">
        <div class="row signup align-items-center grid md:grid-cols-2 grid-cols-1 gap-5 items-center ">

            <div class="col-lg-6 flex justify-center ">
                <div class="x-splash-image m-auto w-3/4">
                    <img class="w-3/4" src="{{ asset('public/frontend-v2/sign-in.jpg') }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="signup-form" >

                    <div class="x-heading m-t-30">
                        <h1 class="text-3xl font-semibold">{{ $section->frontend_data_1 }}</h1>
                    </div>
                    <div class="x-sub-heading">
                        {{ $section->frontend_data_2 }}
                    </div>
                    <form class="form-horizontal form-material x-form p-t-30" id="loginForm" novalidate="novalidate" _lpchecked="1">
                        <div class="input-group m-b-30">
                            <input type="text" class="form-control w-6\/12 my-5" name="domain_name" placeholder="{{ $section->frontend_data_4 }}"
                                   aria-describedby="basic-addon2">
                            <span class="input-group-addon x-sub-domain" id="basic-addon2">.{{ config('system.settings_base_domain') }}</span>
                        </div>




                        <div class="form-group text-center m-t-10 p-b-10">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block py-3 w-full rounded text-lg ajax-request" id="loginSubmitButton"
                                        data-button-loading-annimation="yes"
                                        data-url="{{ url('account/login') }}"
                                        data-type="form"
                                        data-form-id="loginForm"
                                        data-ajax-type="post"
                                        data-button-loading-annimation="yes"
                                        data-progress-bar="hidden"
                                        type="submit">{{ $section->frontend_data_3 }}</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('head')
    <meta name="description" content="">
    <link rel="canonical" href="{{ url('/account/login') }}" />

    <style>
        /*nprogress.css*/
        #nprogress{pointer-events:none}#nprogress .bar{background:#20aee3;position:fixed;z-index:1031;top:0;left:0;width:100%;height:4px}#nprogress .peg{display:block;position:absolute;right:0;width:100px;height:100%;box-shadow:0 0 10px #20aee3,0 0 5px #20aee3;opacity:1;-webkit-transform:rotate(3deg) translate(0,-4px);-ms-transform:rotate(3deg) translate(0,-4px);transform:rotate(3deg) translate(0,-4px)}.nprogress-custom-parent{overflow:hidden;position:relative}.nprogress-custom-parent #nprogress .bar,.nprogress-custom-parent #nprogress .spinner{position:absolute}@-webkit-keyframes nprogress-spinner{0%{-webkit-transform:rotate(0)}100%{-webkit-transform:rotate(360deg)}}@keyframes nprogress-spinner{0%{transform:rotate(0)}100%{transform:rotate(360deg)}}
        /*noty.css*/
        .noty_message{font-size:15px!important;color:#fff;padding:20px!important}.noty_message:after{clear:both}.noty_type_warning{background-color:#d9534f;border-color:#d9534f!important;border-radius:3px}.noty_type_information{background-color:#5bc0de;border-color:#5bc0de;border-radius:3px}.noty_type_success{background-color:#60ba87;border-color:#60ba87;border-radius:3px}#noty_top_layout_container{left:1%!important;width:98%!important;text-align:center}.i-am-new li{background:0 0!important;border-radius:0!important;border:0!important}#noty_bottomLeft_layout_container li,#noty_bottomRight_layout_container li,#noty_topLeft_layout_container li,#noty_topRight_layout_container li{border:0!important;background-color:transparent!important;box-shadow:none!important}


        input.form-control:focus-visible{
            outline: none !important;
        }
        input.form-control{
            padding: 10px !important;
        }
        .signup .signup-form .x-sub-domain{
            padding: 10px !important;
        }

    </style>
@endpush

@push('footer')
    <script src="{{ asset('public/js/landlord/frontend/vendor.js') }}"></script>
    <script src="{{ asset('public/js/landlord/frontend/app.js') }}"></script>
    <script src="{{ asset('public/js/landlord/frontend/ajax.js') }}"></script>
    <script src="{{ asset('public/js/landlord/frontend/events.js')}}"></script>


@endpush