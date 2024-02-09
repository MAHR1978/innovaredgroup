<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Veterinaria - Login </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/bootstrap.min.css">
		<!-- Font-awesome CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/font-awesome.min.css">
		<!-- Flaticon CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/flaticon.css">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/owl.carousel.css">
		<!-- Magnific Popup CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/magnific-popup.css">
		<!-- Swiper CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/swiper.min.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/datepicker.css">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/animate.css">
		<!-- Style CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/style.css">
		<!-- Responsive CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/responsive.css">

        <style>
            /* Set a background image by replacing the URL below */
            body {
            background: url('img/login.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            }
        </style>
</head>
<body>
<!-- Sign In Form Area -->
<div class="container">
    <div class="signup-form signin-form">	    
        <div class="logo-two" style="background-color:#808080;">
            <a href="index.html">
                <img src="{{ asset('logo-innovaRedGroup_3.png') }}" alt="Logo" width="150px" heigth="150px">
            </a>
        </div>
    
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Login</button>
            </div>
            <p class="text-center">No tienes cuenta? <a href="{{ route('register') }}">Regístrate Aquí</a>.</p>
        </form>
    </div>
</div>
<!-- End Sign In Form Area -->

</body>
</html>
