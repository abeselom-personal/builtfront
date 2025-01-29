<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.layout-v2.head')
    <title>
        @if(request()->url() == url('/'))
            {{ config('app.name') }} | @yield('title')
        @else
            @yield('title') | {{ config('app.name') }}
        @endif
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" id="meta-csrf" />
    <script type="text/javascript">
        //name space & settings
        NX = (typeof NX == 'undefined') ? {} : NX;
        NXJS = (typeof NXJS == 'undefined') ? {} : NXJS;
        NXLANG = (typeof NXLANG == 'undefined') ? {} : NXLANG;
        NXINVOICE = (typeof NXINVOICE == 'undefined') ? {} : NXINVOICE;
        NX.data = (typeof NX.data == 'undefined') ? {} : NX.data;

        NXINVOICE.DATA = {};
        NXINVOICE.DOM = {};
        NXINVOICE.CALC = {};

        //variables
        NX.site_url = "{{ url('/') }}";
        NX.csrf_token = "{{ csrf_token() }}";
        NX.notification_position = "{{ config('settings.notification_position') }}";
        NX.notification_error_duration = "{{ config('settings.notification_error_duration') }}";
        NX.notification_success_duration = "{{ config('settings.notification_success_duration') }}";

        //javascript console debug modes
        NX.debug_javascript = "{{ config('app.debug_javascript') }}";

        //popover template
        NX.basic_popover_template = '<div class="popover card-popover" role="tooltip">' +
            '<span class="popover-close" onclick="$(this).closest(\'div.popover\').popover(\'hide\');" aria-hidden="true">' +
            '<i class="ti-close"></i></span>' +
            '<div class="popover-header"></div><div class="popover-body" id="popover-body"></div></div>';

        //lang - used in .js files
        NXLANG.delete_confirmation = "{{ cleanLang(__('lang.delete_confirmation')) }}";
        NXLANG.are_you_sure_delete = "{{ cleanLang(__('lang.are_you_sure_delete')) }}";
        NXLANG.cancel = "{{ cleanLang(__('lang.cancel')) }}";
        NXLANG.continue = "{{ cleanLang(__('lang.continue')) }}";
        NXLANG.are_you_sure = "{{ cleanLang(__('lang.are_you_sure')) }}";
        NXLANG.ok = "{{ cleanLang(__('lang.ok')) }}";
        NXLANG.cancel = "{{ cleanLang(__('lang.cancel')) }}";
        NXLANG.close = "{{ cleanLang(__('lang.close')) }}";

        //arrays to use generically
        NX.array_1 = [];
        NX.array_2 = [];
        NX.array_3 = [];
        NX.array_4 = [];
    </script>
    @stack('head')
</head>
<body>
<!-- ----------------- navbar ------------- -->
@include('frontend.layout-v2.navbar')
<!-------------------- movile nav contailer ----------------------- -->
@include('frontend.layout-v2.mobile-navbar')

@yield('content')

<!-- -------------------foooter ------------------ -->
@include('frontend.layout-v2.footer')
@stack('footer')
</body>
</html>
