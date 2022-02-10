<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="{{ asset('logo_small_icon_only.png') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <title>HelpHome.it • @yield('title')</title>
        @yield('scripts')
    </head>
    <body>
    	<div id="wrapper">
    		<!-- HEADER -->
    		@include('layouts._header')
    		<!-- NAVBAR-->
    		@yield('navbar')

        <!-- Eventuale copertina-->
        @yield('image')

    		<!-- BREADCRUMB -->
    		<ul class="breadcrumb">
                <li><a href="{{ route('home1') }}">Home</a></li>
                @yield('breadcrumb')
    		</ul>
    		@yield('content')
    		<!-- FOOTER -->
    		@include('layouts._footer')
    		<div class="clear"></div>
    	</div>
    	<!--chiude il div class="wrapper" -->
    </body>
</html>
