<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title> e-commerce | @yield('title')</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no">

	@yield('styles')

	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<header>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="{{ route('home') }}">E-COMMERCETEST</a>

			<ul class="navbar-nav ml-auto">
			@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
			@else
				<li class="nav-item">
					<a type="button" class="btn btn-light nav-link text-dark" href="{{ route('cart.checkout') }}">
                        <i class="fa fa-shopping-cart"></i> View Cart <span class="badge badge-pill badge-danger">{{ session()->has('cart') ? count(session()->get('cart')) : 0 }}</span>
                    </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('users.index') }}">USERS</a>
					</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('products.create') }}">CREATE PRODUCT</a>
				</li>
				<li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
			@endguest

			</ul>
		</nav>
	</header>

	<section class="content">
		<br>
		<div class="box box-primary">
			<div class="box-header"> </div>
			<div class="box-body pad">
				@yield('content')

				<div id="app"></div>
			</div>
		</div>
	</section>

	<footer>
		<br>
		<div align="center">
			<div class="container">
				<p class="text-muted"> </p>
			</div>
		</div>
	</footer>

	<script src="{{ asset('js/app.js') }}"></script>
	
</body>
</html>