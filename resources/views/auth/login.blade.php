<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <!--<link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
    <link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />
    -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Veterinaria - Login </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- Font-awesome CSS -->
		<!--<link rel="stylesheet" href="../public/template/assets/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            /*body {
            background: url('img/PANTALLA_LOGIN.png') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            animation: moveRight 2s linear infinite;
            }
            .mover-derecha {
                transform: translateX(-700px); /* Mover 200px hacia la derecha 
            }
            /*.animar-div {
                width: 100px;
                height: 100px;
                background-color: lightblue;
                animation: moveRight 2s linear infinite; /* Animación continua durante 2 segundos 
            }*/
            body {
                background: url('img/PANTALLA_LOGIN.png') no-repeat center center fixed;
                margin: 0;
            }

            .mi-div {
            width: 400px;
                height: 100px;
                float: left;        
                /*margin: 0 auto; /* Centrar horizontalmente */
            }

            @media only screen and (min-width: 600px) {
                .mi-div {
                    /*float: none; /* Quitar flotación en pantallas más pequeñas */
                    margin: 0 auto; /* Quitar margen horizontal para que esté a la izquierda en pantallas más grandes */
                }
            }
            
        </style>
</head>
<body>
<!-- Sign In Form Area -->
<div class="container">
    <div class="signup-form signin-form mi-div">	    
        <div class="logo-two" style="background-color:#D3D3D3;">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo-innovavet.jpg') }}" alt="Logo" width="150px" heigth="150px">
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
                        <strong><strong>{{ $errors->first('email') }}</strong></strong>
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
            <p class="text-center">Olvido su contraseña? <a href="{{ route('password.request') }}">Pinche Aquí</a>.</p>
        </form>
    </div>
</div>
<!-- End Sign In Form Area -->

</body>
</html>
