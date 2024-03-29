<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">

	<!-- PAGE TITLE HERE -->
	<title>Dashboard</title>

	<!-- FAVICONS ICON -->

	<link rel="shortcut icon" type="/image/png" href="/images/favicon.png">
	<link href="{{asset('vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
	<link href="{{asset('vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('vendor/nouislider/nouislider.min.css')}}">

	<!-- Style css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

     <!-- Datatable -->
     <link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
{{-- font  --}}
<link rel="shortcut icon" href="{{asset('favicon1.ico')}}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }

        .card-header,li {
            font-weight: bold;
        }

        .myDropDown
{
   height: 50px;
   overflow: auto;
}
    </style>
</head>
<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->
    <div id="main-wrapper">
         @include('dashboard.partials.header')
    @include('dashboard.partials.sidebar')



@yield('content')

    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

	<!-- Apex Chart -->
	<script src="{{asset('vendor/apexchart/apexchart.js')}}"></script>

	<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{asset('js/dashboard/dashboard-1.js')}}"></script>

	<script src="{{asset('vendor/owl-carousel/owl.carousel.js')}}"></script>

    <script src="{{asset('js/custom.min.js')}}"></script>
	<script src="{{asset('js/dlabnav-init.js')}}"></script>
	<script src="{{asset('js/dlabnav-init.js')}}"></script>

      <!-- Datatable -->
      <script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

      <script src="{{asset('vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

      {{-- sweet alert --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


      @yield('js')






</body>
</html>
