<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from envytheme.com/templates/petclinic/default/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 22:24:13 GMT -->
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Contáctanos - InnovaRedGroup</title>
        <!-- Favicon -->
        <!--<link rel="icon" type="image/x-icon" href="https://www.upv.cl/wp-content/uploads/2019/06/favicon.ico" sizes="32x32" />
        <link rel="shortcut icon" href="https://www.upv.cl/wp-content/uploads/2019/06/favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="https://www.upv.cl/wp-content/uploads/2019/06/favicon.ico">-->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!-- Font-awesome CSS -->
		<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-ezRkUeRlSLuBMJ3pGeUmJovgWhYU2M0Pzfuap7v2FFeSiXr9NXSe4npixFA5Hsnf" crossorigin="anonymous">-->
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
		<!-- Style CSS --->
		<link rel="stylesheet" href="../public/template/assets/css/style.css">
	     <!--Responsive CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

       
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<!-- jQuery min js -->
		<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
	</head>
	
	<body>
        <!-- Start Top Header Area -->
        <!--<div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <ul>
                            <li><i class="fa  fa-angle-right"></i> Lunes a Viernes : 09:30am - 17:30pm</li>
                            <li><a href="#"><i class="fa fa-envelope"></i> contacto@innovaredgroup.cl</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> +56 9 6394 3352</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="share-icons">
                            <ul>
                                <li><a href="https://www.tiktok.com/@innovaredgroups" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                <li><a href="https://twitter.com/Innovaredgroup" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=61551138333016&locale=es_LA"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/@InnovaRedGroup" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/innovaredgroup"  target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- End Start Top Header Area -->
        
        <!-- Start Main Menu Area -->
        <div class="main-menu-area" style="background-color:transparent;">
            <div class="container"> 
                <div class="row"> 
                    <div class="col-lg-3"> 
                        <!--<div class="logo">-->
                            <a href="{{ url('/') }}"><img src="{{ asset('logo-innovavet.jpg') }}" alt="Logo" width="200px" heigth="200px"></a>
                        <!--</div>-->
                    </div>
                    
                    <div class="col-lg-9"> 
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav main-menu ml-auto">
                                    <li class="nav-item dropdown active">
                                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li class="active">
                                                <a class="dropdown-item" href="{{ route('login') }}" target="_blank">Reserva tu hora</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}" target="_blank">Ingreso Administrativo</a>
                                            </li>
                                            <!--<li>
                                                <a class="dropdown-item" href="index-video-bg.html">Home V.2</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index3.html">Home V.3</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="index4.html">Home V.4</a>
                                            </li>-->
                                        </ul>
                                    </li> 
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}" target="_blank"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}" target="_blank"><i class="fa fa-user-plus"></i> Registro</a>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->   
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Menu Area -->
 
        <!-- SearchBox Modal -->
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="SEARCH KEYWORD(s)" />
                <button type="submit" class="btn theme-btn"><i class="fa fa-search"></i> Search</button>
            </form>
        </div>
        <!-- End SearchBox Modal -->
        
        <!-- Start Breadcumbs Area -->
        <div class="breadcumbs-area breadcumbs-bg-1 bc-area-padding">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <!--<h2>Contact us</h2>
                                <span><a href="index.html">home</a> / Contact us</span>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcumbs Area -->
        
        
        <!-- Contact Form Area -->
        <div class="content-block-area contact-us">
            <div class="container">
               <!--<h2 class="area-title">Información de Contacto</h2>-->
               <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-title text-center">
                        <h2><span>Contáctanos</span></h2>
                        <!--<div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>-->
                    </div>
                </div>
             </div>
                <!--<div class="row">
                    <div class="col-md-4"> 
                        <div class="media">
                            <div class="media-left">
                                <i class="ion-ios-location-outline"></i>
                            </div>
                            <div class="media-body">
                                <h4>Av. Ejército Libertador 171-177. Santiago</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4"> 
                        <div class="media">
                            <div class="media-left">
                                <i class="ion-ios-telephone-outline"></i>
                            </div>
                            <div class="media-body">
                                <h4>22505 4542 - 2505 4557</h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4"> 
                        <div class="media">
                            <div class="media-left">
                                <i class="ion-ios-email-outline"></i>
                            </div>
                            <div class="media-body">
                                <h4>consultaveterinaria@udalba.cl <br> </h4>
                            </div>
                        </div>
                    </div>
                </div>-->
                
                <div class="contact-form-area">
                   <h2 class="area-title">Formulario de Contacto</h2>
                    <div class="row">
                        <div class="col-md-5 col-lg-4">
                            <div>
                            <img src="../public/template/assets/img/CONTACTANOS_innovaredgroup.png" width="400px" heigth="400px"  alt="dog-1">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-8">
                            <form id="contatcForm" method="POST" action="{{ route('contacto') }}" name="myform">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Completo" required="" onkeyup= "mayus(this);">
                                        </div>
                                    </div>
    
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="" onkeyup= "mayus(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fono" id="fono" placeholder="Teléfono"  required="" maxlength="9" onKeyPress="return soloNumeros(event)">
                                        </div>
                                    </div>
                                    <div class="col-md-6"> 
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="asunto" id="asunto" placeholder="Asunto" required="" onkeyup= "mayus(this);">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea id="mensaje" class="form-control" name="mensaje" rows="6" placeholder="Mensaje" required="" onkeyup= "mayus(this);"></textarea>
                                </div>
                                <div id="contact_send_status"></div>
                                <button type="button" class="btn theme-btn" id="btnMensaje">Enviar Mensaje</button>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- End Contact Form Area -->
        
        <!-- Google Map Area -->
        <!--<div id="map"></div>-->
        <!-- Google Map Area -->    
            
        <!-- Footer Area -->
        <footer class="site-footer" style="background-color:#808080;">
            <!-- Footer Top Area -->
            <div class="footer-top-area" style="background-color:#808080;">
                <div class="container">
                   <!--<div class="row">
                       <div class="col-md-5">
                            <div class="footer-top-info">
                               <span class="footer-icons"><i class="fa fa-map-o"></i></span> <p>Av. Ejército Libertador 171-177. Santiago</p>
                            </div>
                       </div>
                       <div class="col-md-2">
                            <div class="footer-top-info">
                               <span class="footer-icons"><i class="fa fa-envelope"></i></span> <p>consultaveterinaria@udalba.cl</p>
                            </div>
                       </div>
                       <div class="col-md-5">
                            <div class="footer-top-info">
                               <span class="footer-icons"><i class="fa fa-headphones"></i></span> <p>Give us a free call (224) 228-8475</p>
                            </div>
                       </div>
                   </div>-->
                   <div class="hr-line"></div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12" style="background-color:#808080;">
                            <div class="footer-wid">
                                <a href="index.html" class="footer-logo"  style="background-color:#808080;">
                                    <img src="{{ asset('logo-innovaRedGroup_3.png') }}" alt="logo" width="200px" heigth="200px">
                                </a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a href="#" class="link-color">Read More About Us <i class="fa  fa-long-arrow-right"></i></a>-->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="row">
                                <div class="col-md-4 col-lg-4" style="background-color:#808080;">
                                    <!--<div class="footer-wid footer-menu">
                                        <h3 class="footer-wid-title">Navigation</h3>
                                        <ul>
                                            <li><a href="index.html"><i class="fa  fa-angle-right"></i> home</a></li>
                                            <li><a href="about-us.html"><i class="fa  fa-angle-right"></i> About</a></li>
                                            <li><a href="projects.html"><i class="fa  fa-angle-right"></i> our mission</a></li>
                                            <li><a href="industries.html"><i class="fa  fa-angle-right"></i> services</a></li>
                                            <li><a href="gallery.html"><i class="fa  fa-angle-right"></i> gallery</a></li>
                                            <li><a href="blog.html"><i class="fa  fa-angle-right"></i> blog</a></li>
                                            <li><a href="contact-us.html"><i class="fa  fa-angle-right"></i> contact</a></li>
                                        </ul>
                                    </div>-->
                                </div>

                                <div class="col-md-4 col-lg-4" style="background-color:#808080;">
                                    <div class="footer-wid footer-menu">
                                        <h3 class="footer-wid-title">Contáctanos</h3>
                                        <ul>
                                            <li><i class="fa  fa-phone"></i>  &nbsp; +56 9 6394 3352</li>
                                            <li><i class="fa fa-envelope"></i>  &nbsp;contacto@innovaredgroup.cl</li>
                                            <li><i class="fa fa-map-o"></i>  &nbsp Santiago y en todo chile !!!</li>
                                            <li><i class="fa  fa-angle-right"></i> Lunes a Viernes : 09:30am - 17:30pm</li>
                                            <!--<li><i class="fa  fa-angle-right"></i> Thursday:7:30am - 5:30pm</li>
                                            <li><i class="fa  fa-angle-right"></i> Friday:7:30am - 5:30pm</li>
                                            <li><i class="fa  fa-angle-right"></i> Saturday:7:30am - 3:00pm</li>
                                            <li><i class="fa  fa-angle-right"></i> Sunday: Closed</li>-->
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4">
                                    <!--<div class="footer-wid map-preview">
                                        <h3 class="footer-wid-title">Get In Touch</h3>
                                        <p>1828 Johns Drive Glenview, IL 60025</p>
                                        <div class="address-info">
                                            <span><i class="fa  fa-phone"></i> (224) 228-8475</span><br>
                                            <span><i class="fa  fa-envelope"></i> support@petclinic.com </span>
                                        </div>-->
                                        <!--<div class="subscribe">
                                            <form action="https://envytheme.com/templates/petclinic/default/index.html">
                                                <input type="text" placeholder="Type your email" required>
                                                <button>Subscribe now <i class="fa  fa-paper-plane"></i></button>
                                            </form>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="social-icos">    
                                <ul class="list-inline">
                                    <li><a href="https://www.tiktok.com/@innovaredgroups" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                    <li><a href="https://www.facebook.com/upedrodevaldivia/"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/UPV_Chile"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCx3MYMkqIUm4flvI8SBAywA?view_as=subscriber"><i class="fab fa-youtube"></i></a></li>
                                    <li><a href="https://www.instagram.com/upv_chile/"><i class="fab fa-instagram"></i></a></li>
                                    <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Footer Top -->

            <!-- Footer Bottom Area -->
            <div class="footer-copyright-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-5">
                            &copy; InnovaRedGroup 2023.
                        </div>
                        <!--<div class="col-lg-6 col-md-7 text-right">
                            <a href="#">Terms & Condition</a> <span class="seprator">|</span> <a href="#">Privacy Policy</a>
                        </div>-->
                    </div>
                </div>
            </div> <!-- End Footer Bottom Area -->
        </footer> <!-- End Footer Area -->
            
        <!-- Bootstrap JS file -->
        <script src="../public/template/assets/js/bootstrap.min.js"></script>
        <!-- Popper JS -->
        <script src="../public/template/assets/js/popper.min.js"></script>
		<!-- Owl-Carousel JS file -->
		<script src="../public/template/assets/js/owl.carousel.min.js"></script>
		<!-- Magnific Popup JS file -->
		<script src="../public/template/assets/js/jquery.magnific-popup.min.js"></script>
		<!-- Mixitup JS file -->
		<script src="../public/template/assets/js/mixitup.min.js"></script>
		<!-- Swiper JS file -->
		<script src="../public/template/assets/js/swiper.jquery.min.js"></script>

		<!-- WOW JS file -->
		<script src="../public/template/assets/js/wow.min.js"></script>
		<!-- Isotop JS JS file -->
        <script src="../public/template/assets/js/isotope.pkgd.min.js"></script>
		<!-- Waypoints JS file -->
		<script src="../public/template/assets/js/waypoints.min.js"></script>
		<!-- Counter JS file -->
		<script src="../public/template/assets/js/jquery.counterup.min.js"></script>
		<!-- RipplesJS -->
		<script src="../public/template/assets/js/jquery.ripples-min.js"></script>
		<!-- YTPlayer JS -->
		<script src="../public/template/assets/js/jquery.mb.YTPlayer.min.js"></script>
		<!-- Jarallax JS -->
		<script src="../public/template/assets/js/jarallax.min.js"></script>
		<!-- Parsley JS -->
        <script src="../public/template/assets/js/parsley.min.js"></script>
        <!-- Custom JS file -->
        <script src="../public/template/assets/js/active.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <!--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function($){
                          $('#btnMensaje').on('click', function(e) {
            e.preventDefault();
           // alert("funciona jquery");
            var Nombre = $('#nombre').val();
            var Email = $('#email').val();
            var Telefono = $('#fono').val();
            var Asunto = $('#asunto').val();
            var Comentario = $('#mensaje').val();
        
            if(Nombre === '')
            {
             //alert(Nombre);
                toastr.error('Ingrese un Nombre', 'Error!', {timeOut: 3000})
                return false;
            }

            if(Email === '')
            {
                toastr.error('Ingrese su Email', 'Error!', {timeOut: 3000})
                return false;
            }
            if($('#email').val().indexOf('@', 0) == -1 || $('#email').val().indexOf('.', 0) == -1)
            {

            toastr.error('Ingrese Email Valido.', 'Erro!', {timeOut: 3000})
            return false;
            
            }
            if(Telefono == "")
            {
                toastr.error('Ingrese su Teléfono', 'Error!', {timeOut: 3000})
            return false;
            }
            if(Asunto == "")
            {
                toastr.error('Ingrese un Asunto', 'Error!', {timeOut: 3000})
            return false;
            }
            if(Comentario == "")
            {
                toastr.error('Ingrese un Mensaje', 'Error!', {timeOut: 3000})
            return false;
            }
            var form = $('#contatcForm');
                var url = form.attr('action');
               
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: form.serialize(),
                    dataType: 'JSON',
                        beforeSend: function() {
                        $("#btnMensaje").attr("disabled", true).html('Registrando... <i class="fa fa-refresh fa-spin"></i>');
                        },
                        success: function(respuesta) {
                        if (respuesta.message == 'success') {
                            $("#contatcForm")[0].reset();
                            Swal.fire({
                                title: "Gracias!",
                                text: "Tus datos fueron enviados satisfactoriamente, en breve nos pondremos en contacto con usted.",
                                icon: "success"
                            }).then((result) => {
                                $("#btnMensaje").attr("disabled", false).html('Enviar Datos');
                            })
                            
                            //$('#Ok').show();
                        }
                    }
                });
        
        
            });
        });

        function mayus(e) {
    e.value = e.value.toUpperCase();
      }
    function soloNumeros(e)
    {
      var key = window.Event ? e.which : e.keyCode
      return ((key >= 48 && key <= 57) || (key==8))
    }
        </script>
        
        
	</body>

<!-- Mirrored from envytheme.com/templates/petclinic/default/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 22:24:14 GMT -->
</html>