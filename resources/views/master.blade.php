
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name') }} - @yield('title')</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	@stack('style')
</head>
<body class="hold-transition skin-blue layout-top-nav fixed">
	<div class="wrapper">

		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name') }}</a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							
						</ul>
					</div>
					<!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							@if(Auth::check())

							<li>
								<a href="{{ url('cart') }}">
									<i class="fa fa-shopping-cart"></i>
									<span class="label label-warning">2</span>
								</a>
							</li>
						
							<!-- User Account Menu -->
							<li class="dropdown user user-menu">
							<!-- Menu Toggle Button -->
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!-- The user image in the navbar-->
									<img src="{{ asset('img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
									<!-- hidden-xs hides the username on small devices so only the image appears. -->
									<span class="hidden-xs">{{ Auth::user()->name }}</span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="#">Profil</a></li>
									<li>
										<a href="javascript:void(0)" onclick="getElementById('logoutForm').submit()">Keluar</a>
										<form id="logoutForm" method="post" action="{{ url('logout') }}">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
							@else
							<li>
								<a href="{{ url('login') }}">
									<i class="fa fa-sign-in"></i>

									Login
								</a>
							</li>
							@endif
						</ul>
					</div>
					<!-- /.navbar-custom-menu -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper">
			<div class="container">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						@yield('title')
						<small>@yield('page_description')</small>
					</h1>
					<ol class="breadcrumb">
						<li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a></li>
						@yield('breadcrumb')
					</ol>
				</section>

				<!-- Main content -->
				<section class="content">
					@yield('content')
				</section>
				<!-- /.content -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="container">
				<strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a>.</strong> All rights
				reserved.
			</div>
			<!-- /.container -->
		</footer>
	</div>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
