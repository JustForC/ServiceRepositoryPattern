<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('template/images/favicon.png')}}">
	<link rel="stylesheet" href="{{asset('template/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('template/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/style.css')}}" rel="stylesheet">
    @livewireStyles()
	
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        @yield('content')
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    @livewireScripts()
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('template/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('template/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('template/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	
	<!-- Chart piety plugin files -->
    <script src="{{asset('template/vendor/peity/jquery.peity.min.js')}}"></script>
	
	<!-- Apex Chart -->
	<script src="{{asset('template/vendor/apexchart/apexchart.js')}}"></script>
	
	<!-- Dashboard 1 -->
	<script src="{{asset('template/js/dashboard/dashboard-1.js')}}"></script>
	
	<script src="{{asset('template/vendor/owl-carousel/owl.carousel.js')}}"></script>
    <script src="{{asset('template/js/custom.min.js')}}"></script>
	<script src="{{asset('template/js/deznav-init.js')}}"></script>
    @yield('javascript')
    
</body>
</html>