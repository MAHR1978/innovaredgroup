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

    <title>Veterinaria - Registro</title>
    

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
            background: url('img/registro.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            background-size: cover;
            -o-background-size: cover;
            }
        </style>
    
</head>
<body>
<!-- Sign Up Form Area -->
<div class="container">
    <div class="signup-form">
        <div class="logo-two">
            <a href="index.html">
                <img src="{{ asset('logo-menu.png') }}" alt="Logo">
            </a>
        </div>
    
        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            <div class="form-row">
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-drivers-license"></i></span>
                            <input type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut" id="rut" value="{{ old('rut') }}" placeholder="Rut" maxlength="12" required autofocus>
                            @if ($errors->has('rut'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('rut') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nombre" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="apellido_paterno" type="text" class="form-control{{ $errors->has('apellido_paterno') ? ' is-invalid' : '' }}" name="apellido_paterno" value="{{ old('apellido_paterno') }}" placeholder="Apellido Paterno" required autofocus>
                            @if ($errors->has('apellido_paterno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input id="apellido_materno" type="text" class="form-control{{ $errors->has('apellido_materno') ? ' is-invalid' : '' }}" name="apellido_materno" value="{{ old('apellido_materno') }}" placeholder="Apellido Materno" required autofocus>
                            @if ($errors->has('apellido_materno'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('apellido_materno') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-16">
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
                </div>
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                                <i class="fa fa-check"></i>
                            </span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Password" required>
                        </div>
                    </div>
                </div>
            </div>
                <div class="form-row">
                <div class="col-md-6 mb-16">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-address-book"></i>
                        </span>
                        <input id="direccion" type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{ old('direccion') }}" placeholder="Dirección" required>
                        @if ($errors->has('direccion'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                    @endif
                    </div>
                </div>
                </div>
                <div class="col-md-6 mb-16">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-address-book"></i>
                            </span>
                            <input id="comuna" type="text" class="form-control{{ $errors->has('comuna') ? ' is-invalid' : '' }}" name="comuna" value="{{ old('comuna') }}" placeholder="Comuna" required>
                            @if ($errors->has('comuna'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comuna') }}</strong>
                            </span>
                        @endif
                        </div>
                    </div>
                    </div>
            </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input id="fono" type="text" class="form-control{{ $errors->has('fono') ? ' is-invalid' : '' }}" name="fono" value="{{ old('fono') }}" placeholder="Teléfono" required>
                        @if ($errors->has('fono'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('fono') }}</strong>
                                </span>
                            @endif
                    </div>
                </div>    
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">Registrarse</button>
            </div>
            <p class="text-center">Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión aquí</a>.</p>
        </form> 
    </div>
</div>
<!-- End Sign Up Form Area -->
<!-- Scripts -->
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js') !!}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
{!! Html::script('js/jquery.Rut.js') !!}
<script type="text/javascript">
    $('#rut').Rut({
        on_error: function(){
            Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: 'Rut incorrecto!'
            });
            $('#rut').val('');
            },
        format_on: 'keyup'
        });
</script>
</body>
</html>
