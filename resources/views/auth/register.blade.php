<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <!--<link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />-->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Veterinaria - Registro</title>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
            /*body {
                background: url('img/PAGINA_DE_REGISTRO.png') no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                background-size: cover;
                -o-background-size: cover;
                margin: 0;
              
            }*/
            body {
                background-color:#D3D3D3;
                background: url('img/PAGINA_DE_REGISTRO.png') no-repeat center center fixed;
                /*margin: 0;*/
            }

            .mi-div {
            width: 400px;
            height: 100px;            
            transform: translateX(-700px); 
            }

            @media only screen and (min-width: 300px) {
                .mi-div {
                    transform: none; 
                    margin: 0; /* Quitar margen horizontal para que esté a la izquierda en pantallas más grandes */
                }
            }
         
            /*.mover-derecha {
               transform: translateX(-700px); /* Mover 200px hacia la derecha 
               /*margin: 0 auto;
                
            }*/
            /*@media only screen and (min-width: 600px) {
                .mover-derecha {
                    /*margin: 0; /* Quitar margen horizontal para que esté a la izquierda */
                   /* transform: translateX(-100px); /* Mover 300px hacia la derecha en pantallas más grandes
                    margin: 0 auto;   
                }
            }
            /*.mi-div {
                width: 600px;
                height: 100px;
                /*background-color: lightblue;
                margin: 0 auto; /* Centrar horizontalmente 
                }

            @media only screen and (min-width: 600px) {
                /* Estilos para pantallas más grandes (por ejemplo, pantallas de PC) 
                .mi-div {
                    margin: 0; /* Quitar margen horizontal para que esté a la izquierda 
                }
            }*/
        </style>
    
</head>
<body>
<!-- Sign Up Form Area -->
<div class="container">
    <div class="signup-form mi-div">
        <div class="logo-two" style="background-color:#D3D3D3;" >
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo-innovavet.jpg') }}" alt="Logo"  width="200px" heigth="200px">
            </a>
        </div>
    
        <form method="POST" action="{{ route('register') }}" onsubmit="return validarTelefono()" novalidate>
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
                        <input id="fono" type="tel" class="form-control{{ $errors->has('fono') ? ' is-invalid' : '' }}" name="fono" value="{{ old('fono') }}" placeholder="Teléfono" pattern="[0-9]{8,10}" required>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript" src='../public/js/jquery.Rut.js'></script>
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

    function validarTelefono() {
    var telefonoInput = document.getElementById("fono");
    var telefonoValue = telefonoInput.value;

    // Verificar si el valor contiene solo números
    if (!/^[0-9]{9,}$/.test(telefonoValue)) {
        alert("Por favor, ingrese un número de teléfono válido con al menos 9 dígitos.");
        return false; // Detener el envío del formulario
        }

        return true; // Permitir el envío del formulario
    }
</script>
</body>
</html>
