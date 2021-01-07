<!DOCTYPE html>
@langrtl
    <html lang="{{ app()->getLocale() }}" dir="rtl">
@else
    <html lang="{{ app()->getLocale() }}">
@endlangrtl
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        <meta name="description" content="@yield('meta_description', 'WorkTop Store')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        @yield('meta')
        {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
        @stack('before-styles')
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />
       {!! style(mix('css/main.css')) !!}

        <!--[if lt IE 9]>
            <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
        <![endif]-->
        <link rel="stylesheet" href="css/colors.php?color=1c85e8" type="text/css" />

        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css" />

        @stack('after-styles')
    </head>
    <body class="stretched">


        	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
        @yield('content')
     </div><!-- #wrapper end -->


     @include('frontend.includes.footer')



     <script type="text/javascript">
        var APP_URL = {!! json_encode(url('/')) !!}
        </script>
        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/frontend.js')) !!}

        @stack('after-scripts')

        @include('includes.partials.ga')


    <!-- External JavaScripts
	============================================= -->
    <script src="{{ asset('js/jquery.js') }}"></script>
	<script src="{{ asset('js/plugins.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>


    </body>
</html>
