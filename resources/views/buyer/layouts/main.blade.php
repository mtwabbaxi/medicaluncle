<!doctype html>
<html class="fixed">
	<head>
		<meta charset="UTF-8">
		<title>Buyer | Medical Uncle</title>
		<meta name="keywords" content="Medical Uncle" />
		<meta name="description" content="Medical Equipments Selling">
		<meta name="author" content="Muhammad Talha Waseem">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="{{ url('/assets/images/favicon.png') }}" type="image/x-icon">
		@include('buyer.layouts.common.css')
		@include('layouts.css')
	</head>
	<body >
		<section class="body">
			@include('buyer.layouts.common.header')
			<div class="inner-wrapper" style="padding-top: 90px !important;">
				@include('buyer.layouts.common.sidebar')
				@include('buyer.layouts.common.navbar');
					<section role="main" class="content-body">
                        @yield('content')
					</section>
			</div>
		</section>
		@include('buyer.layouts.common.footer')
		@include('buyer.layouts.common.js')
		@include('layouts.js')
	</body>
</html>