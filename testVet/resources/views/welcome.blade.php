<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from envytheme.com/templates/petclinic/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 22:21:52 GMT -->
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Veterinaria - InnovaRedGroup</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Favicon -->
        <!--<link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />-->
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<!--<link rel="stylesheet" href="../public/template/assets/css/bootstrap.min.css">-->
		<!-- Font-awesome CSS -->
		<!--<link rel="stylesheet" href="../public/template/assets/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
		<!-- Flaticon CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/flaticon.css">
		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/owl.carousel.css">
		<!-- Magnific Popup CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/magnific-popup.css">
		<!-- Swiper CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/swiper.min.css">
		<!-- Datepicker CSS -->
		<!--<link rel="stylesheet" href="../public/template/assets/css/datepicker.css">-->
		<!-- Animate CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/animate.css">
		<!-- Style CSS --->
		<link rel="stylesheet" href="../public/template/assets/css/style.css">
	     <!--Responsive CSS -->
		<link rel="stylesheet" href="../public/template/assets/css/responsive.css">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- jQuery min js -->
        <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
        
        <style>
            .swiper-slide {
                height: 400px;
                background-size: cover;
                background-position: center center;
            }
            .slide-bg-1 {
                background-image: url(https://www.innovaredgroup.cl/Veterinaria/public/template/assets/img/blog-item-4.jpg);
            }
            .share-icons {
                border: none; /* o border: 0; */
            }
            .col-md-12.col-lg-3.col-lg-9 .share-icons {
                border: none; /* o border: 0; */
            }
        </style>
	</head>
	
	<body>
        
        <!-- Start Top Header Area -->
        <div class="top-header-area" style="background-color:#808080;border: none;display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <ul>
                            <li><i class="fa  fa-angle-right" area-hiden="true"></i> Lunes a Viernes : 09:30am - 17:00pm</li>
                            <li><a href="#"><i class="fa fa-envelope"></i>contacto@innovaredgroup.cl</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> +56 9 6394 3352</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 col-lg-3">
                        <div class="share-icons">
                            <ul>
                            <li><a href="https://www.tiktok.com/@innovaredgroup" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                <li><a href="https://twitter.com/Innovaredgroup" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=61551138333016&locale=es_LA"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/@InnovaRedGroup" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/innovaredgroup"  target="_blank"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Start Top Header Area -->
        
        <!-- Start Main Menu Area -->
        <div class="main-menu-area" style="background-color:transparent;">
            <div class="container"> 
                <div class="row"> 
                    <div class="col-lg-3"> 
                        <!--<div class="logo">-->
                            <a href="{{ url('/') }}" >
								<img src="{{asset('logo-innovavet.jpg')}}" alt="Logo" width="200px" heigth="200px">
							</a>
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
                                                <a class="dropdown-item" href="{{route('login')}}" target="_blank">Reserva tu hora</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{route('login')}}" target="_blank">Ingreso Administrativo</a>
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
                                        <a class="nav-link" href="{{route('login')}}" target="_blank"><i class="fa fa-user-circle"></i> Login</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register')}}" target="_blank"><i class="fa fa-user-plus"></i> Registrarse</a>
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
        
        <!-- Start Homepage Slider -->
        <div class="homepage-slides-wrapper">
            <!-- Slider main container -->
            <div class="swiper-container swiper1">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <!--<div class="swiper-slide slide-bg-1">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h1>Offering high-quality care for your pets!</h1>
                                            <p>Our friendly and experienced staff welcomes you!</p>
                                            <a class="btn theme-btn" href="appointment.html">make an appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    
                    <div class="swiper-slide slide-bg-2">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <!--<h1>We treat your pets like our own ones!</h1>
                                            <p>Helping pets live life to the fullest.</p>
                                            <a class="btn theme-btn" href="appointment.html">make an appointment</a>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="swiper-slide slide-bg-3">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h1>We really care about your pet's welfare!</h1>
                                            <p>Call to learn more about the services we provide for your pet.</p>
                                            <a class="btn theme-btn" href="appointment.html">make an appointment</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination swiper-pagination1"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        </div>
        <!-- End Homepage Slider -->
        
        
        <!-- Start Services Area -->
        <div class="content-block-area gray-bg">
            <div class="container">
                <div class="row">
                   <div class="col-lg-6 offset-lg-3">
                       <div class="section-title text-center">
                           <h2><span>Teleconsulta  Preventiva y Acompañamiento Médico Veterinario</span></h2>
                           <!--<div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>-->
                       </div>
                   </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="featured-boxed text-center">
                           <div class="icon-boxed">
                                <a href="{{ url('/contacto') }}" target="_blank"><img src="../public/template/assets/img/CONTACTANOS_innovaredgroup.png" alt="dog-1"></a>
                            </div>
                            <h3>Contáctanos</h3>
                            <div class="upper-line"></div>
                            <div class="bottom-line"></div>
                            <p>Estimado Usuario  si quiere comunicarse con telemedicina veterinaria, por favor acceda al formulario.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="featured-boxed text-center">
                            <div class="icon-boxed">
                                <a href="{{ url('/login') }}" target="_blank"><img src="../public/template/assets/img/AGENDAR_HORA_innovaredgorup.png" alt="dog-1"></a>
                            </div>
                            <h3>Agendar Hora</h3>
                            <div class="upper-line"></div>
                            <div class="bottom-line"></div>
                            <p>Estimado Usuario antes de generar su hora médica, deberá tener disponible el archivo de trasferencia para poder adjuntar.</p>
                        </div>
                    </div>
                    
                     <!--<div class="col-md-4">
                        <div class="featured-boxed text-center">
                            <div class="icon-boxed">
                                <img src="/template/assets/img/Pet-3.png" alt="dog-1">
                            </div>
                            <h3>Grooming</h3>
                            <div class="upper-line"></div>
                            <div class="bottom-line"></div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <!-- End Services Area -->
    
        <!-- Start Why Choose Us Area -->
        <!--<div class="content-block-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                       <div class="section-title text-center">
                           <h2><span>Why choose</span> us</h2>
                           <div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                       </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="boxed-item">
                            <span class="sirial-number">01</span>
                            <span class="single-boxed"><i class="fa fa-volume-control-phone"></i></span>
                            <h3>Fast Response</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>  
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="boxed-item">
                            <span class="sirial-number">02</span>
                            <span class="single-boxed"><i class="fa fa-home"></i></span>
                            <h3>Comfortable Office</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>  
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="boxed-item">
                            <span class="sirial-number">03</span>
                            <span class="single-boxed"><i class="fa fa-cogs"></i></span>
                            <h3>High Quality Equipment</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>  
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                        <div class="boxed-item">
                            <span class="sirial-number">04</span>
                            <span class="single-boxed"><i class="fa fa-user-md"></i></span>
                            <h3>Very Friendly Staff</h3>
                            <p>It is a long established fact that a reader will be distracted by the readable content.</p>  
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-12 text-center">
                    <a href="about-us.html" class="btn theme-btn m-t-50">about us</a>
                </div>
            </div>
        </div>-->
        <!-- End Why Choose Us Area -->
        
        <!-- Start Count-Down Area -->
        <!--<div class="count-down-area count-bg jarallax">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="count-down-boxed text-center">
                            <div class="icon-box">
                               <i class="fa fa-smile-o"></i>
                            </div>
                            <span class="count-icon">
                                <span class="count-number counter">12,500</span>
                            </span>
                            <h3 class="count-info">Happy Clients</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="count-down-boxed text-center">
                           <div class="icon-box">
                               <i class="fa fa-building-o"></i>
                            </div>
                            <span class="count-icon">
                                <span class="count-number counter">17,500</span>
                            </span>
                            <h3 class="count-info">Completed Projects</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="count-down-boxed text-center">
                           <div class="icon-box">
                               <i class="fa fa-trophy"></i>
                            </div>
                            <span class="count-icon">
                                <span class="count-number counter">15,500</span>
                            </span>
                            <h3 class="count-info">WINNING AWARD</h3>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="count-down-boxed text-center">
                           <div class="icon-box">
                               <i class="fa fa-clock-o"></i>
                            </div>
                            <span class="count-icon"> 
                                <span class="count-number counter">14,500</span>
                            </span>
                            <h3 class="count-info">Hours Worked</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- End Count-Down Area -->
        
        <!-- Start Services Area -->
        <!--<div class="content-block-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                       <div class="section-title text-center">
                           <h2><span>Special</span> services</h2>
                           <div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                       </div>
                    </div>
                </div>
                
                <div class="content service_content">
                    <div class="row">
                      <div class="service_left">
                        <div class="apartment">
                            <a href="#">
                                <div class="service_icon round"></div>
                                <h5 class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">Behavior Counseling</h5>
                            </a>
                        </div>
                        <div class="office">
                            <a href="#">
                                <div class="service_icon round"></div>
                                <h5 class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">Bereavement Counseling</h5>
                            </a>
                        </div>
                        <div class="move_in_out">
                            <a href="#">
                                <div class="service_icon round"></div>
                                <h5 class="wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">General Surgery</h5>
                            </a>
                        </div>
                      </div>
                      <div class="service_middle round"> 
                        <img class="round" src="/template/assets/img/service.png" alt="" />
                      </div>
                      <div class="service_right">
                        <div class="car_washing">
                            <a href="#">
                              <div class="service_icon round"></div>
                              <h5 class="wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">Diabetes Management</h5></a>
                        </div>
                        <div class="renovation">
                            <a href="#">
                              <div class="service_icon round"></div>
                              <h5 class="wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">Diagnostic Procedures</h5></a>
                        </div>
                        <div class="green_cleaning">
                            <a href="#">
                              <div class="service_icon round"></div>
                              <h5 class="wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">Fecal Testing</h5></a>
                        </div>
                      </div>
                    </div>
                </div>

            </div>
        </div>-->
        <!-- End Services Area -->
        
        <hr>
        <!-- Start Appointment Area -->
        <!--<div class="content-block-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                       <div class="section-title text-center">
                           <h2><span>request an</span> appointment</h2>
                           <div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                       </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-5">
                        <div class="apointment-preview-boxed man-image-bg wow fadeInUp"></div>
                    </div>
                    <div class="col-lg-7">
                        <form class="appointment-form" action="https://envytheme.com/templates/petclinic/default/index.html">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Preferred Time Of Day</label>
                                    <select id="Year">
                                        <option value="hide">-- Time Of Day --</option>
                                        <option value="1">Morning</option>
                                        <option value="2">Afternoon</option>
                                        <option value="3">Evening</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Patient Type</label>
                                    <select id="selectServices">
                                        <option value="hide">-- Select Type --</option>
                                        <option value="1">New Patient</option>
                                        <option value="2">Current Patient</option>
                                        <option value="3">Returning Patient</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Appointment Date</label>
                                    <input type="text" id="datepicker" name="appointmentDate" placeholder="Appointment Date" required>
                                </div>
                                <div class="col-lg-6">
                                    <label>Appointment Time</label>
                                    <select id="Time">
                                        <option value="hide">-- Choose --</option>
                                        <option value="2010">09:00AM - 10:00AM</option>
                                        <option value="2011">10:00AM - 11:00AM</option>
                                        <option value="2012">11:00AM - 12:00PM</option>
                                        <option value="2013">12:00PM - 01:00PM</option>
                                        <option value="2014">01:00PM - 02:00PM</option>
                                        <option value="2015">02:00PM - 03:00PM</option>
                                        <option value="2015">03:00PM - 04:00PM</option>
                                        <option value="2015">04:00PM - 05:00PM</option>
                                        <option value="2015">05:00PM - 06:00PM</option>
                                        <option value="2015">06:00PM - 07:00PM</option>
                                        <option value="2015">07:00PM - 08:00PM</option>
                                        <option value="2015">08:00PM - 09:00PM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                               <div class="col-lg-12">
                                   <p>Contact Details</p>
                               </div>
                                <div class="col-lg-6">
                                    <input type="text" name="yourName" placeholder="Your Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" name="yourEmail" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="yourPhone" placeholder="Your Phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="yourMessage" id="yourMessage" placeholder="Your Message" required></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <button class="btn theme-btn" type="submit">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- End Appointment Area -->
        
        <!-- Start Our Parners Area -->
        <!--<div class="content-block-area">
            <div class="container">
               <div class="row">
                   <div class="col-lg-6 offset-lg-3">
                       <div class="section-title text-center">
                           <h2><span>Our</span> Partner</h2>
                           <div class="car-icon"><img src="/template/assets/img/dog.png" alt="car"></div>
                           <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                       </div>
                   </div>
                </div>
                <div class="partner-slides">
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-1.png" alt="Image Description"></a>
                    </div>
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-2.png" alt="Image Description"></a>
                    </div>
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-3.png" alt="Image Description"></a>
                    </div>
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-4.png" alt="Image Description"></a>
                    </div>
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-5.png" alt="Image Description"></a>
                    </div>
                    <div class="single-partner-slide">
                        <a class="partners-logo" href="#"><img src="/template/assets/img/partner-6.png" alt="Image Description"></a>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- End Our Parners Area -->
        
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
                            <div class="footer-wid" >
                                <a href="https://www.innovaredgroup.cl" class="footer-logo" style="background-color:#808080;">
									<img src="{{ asset('logo-innovaRedGroup_3.png') }}" alt="logo" width="200px" heigth="200px">
								</a>
                                <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a href="#" class="link-color">Read More About Us <i class="fa  fa-long-arrow-right"></i></a>-->
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12" style="background-color:#808080;">
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
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
                                            <li><i class="fa  fa-envelope"></i>  &nbsp;contacto@innovaredgroup.cl</li>
                                            <li><i class="fa fa-map-o"></i>  &nbsp;Santiago y todo chile!!! </li>
                                            <li><i class="fa  fa-angle-right"></i> Lunes a Viernes : 09:30am - 17:00pm</li>
                                            <!--<li><i class="fa  fa-angle-right"></i> Friday:7:30am - 17:30pm</li>
                                            <li><i class="fa  fa-angle-right"></i> Saturday:7:30am - 3:00pm</li>
                                            <li><i class="fa  fa-angle-right"></i> Sunday: Closed</li>-->
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 col-lg-4" style="background-color:#808080;">
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
                        <div class="col-lg-12 text-center" style="background-color:#808080;">
                            <div class="social-icos">    
                                <ul class="list-inline">
                                <li><a href="https://www.tiktok.com/@innovaredgroup" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                <li><a href="https://twitter.com/Innovaredgroup" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/profile.php?id=61551138333016&locale=es_LA"  target="_blank"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/@InnovaRedGroup" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/innovaredgroup"  target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Footer Top -->

            <!-- Footer Bottom Area -->
            <div class="footer-copyright-area" style="background-color:#808080">
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
        
        <!-- Back Top top -->
        <a href="#content" class="back-to-top">Top</a>
        <!-- End Back Top top -->
        
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
		<!-- Datepicker JS file -->
		<!--<script src="../public/template/assets/js/datepicker.js"></script>-->
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
        <!-- jQuery Google Map JS file -->
        <!--<script src="../public/template/assets/js/jquery.googlemap.js"></script>-->
        <!-- Google Map api -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0jIY1DdGJ7yWZrPDmhCiupu_K2En_4HY"></script>
        <!-- Custom JS file -->
        <script src="../public/template/assets/js/active.js"></script>
        <script type="text/javascript">
            $(document).ready(function($){
            });
        </script>
	</body>

<!-- Mirrored from envytheme.com/templates/petclinic/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Jul 2020 22:22:38 GMT -->
</html>