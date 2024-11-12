<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('asset/frontend/css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('asset/frontend/css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('asset/frontend/css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('asset/frontend/css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('asset/frontend/css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('asset/frontend/css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
	@include('frontend.header')
		<!-- /HEADER -->

		<!-- NAVIGATION -->
@include('frontend.navber')
		<!-- /NAVIGATION -->

@yield('content')
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
	@include('frontend.newslatter')
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
@include('frontend.footer')
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('asset/frontend/js/jquery.min.js') }}"></script>
		<script src="{{ asset('asset/frontend/ js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('asset/frontend/js/slick.min.js') }}"></script>
		<script src="{{ asset('asset/frontend/js/nouislider.min.js') }}"></script>
		<script src="{{ asset('asset/frontend/') }}js/jquery.zoom.min.js"></script>
		<script src="{{ asset('asset/frontend/js/main.js') }}"></script>

	</body>
</html>
