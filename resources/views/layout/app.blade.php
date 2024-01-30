<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Favicon -->
            <!--<link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
            <link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />-->

    <title>Mi Dashboard</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
          
        <!-- <script src="https://innovaredgroup.cl/testVet/public/dashboard/js/app.js" type="text/javascript"></script>-->
          <link rel="stylesheet" href="../public/dashboard/css/main.css">-
          <link rel="stylesheet" href="../dashboard/css/main.css">
                  <!-- <link rel="stylesheet" href="https://innovaredgroup.cl/testVet/public/dashboard/css/main.css" >-->
       
      
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
		<link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
    <!--<link rel="stylesheet" href="https://innovaredgroup.cl/testVet/public/dashboard/css/main.css>-->
</head>
<body>
    <div id="app">
      
        <div class="content-wrapper ml-0 mt-100 mt-lg-105">
            <div class="container">
                <div class="box-layout">
                    <div class="main-layout full-width">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
	</div>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
	<script src="{{ asset('js/app.js') }}"></script>
	<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://www.innovaredgroup.cl/testVet/public/js/jquery.Rut.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
	<script type="text/javascript" src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js"></script>
	@yield('scripts')
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <!--<script src="https://innovaredgroup.cl/Veterinaria/public/dashboard/js/app.js" type="text/javascript"></script>-->
    <script src="../public/dashboard/js/app.js" type="text/javascript"></script>
  	     <script src="../dashboard/js/app.js" type="text/javascript"></script>
  
    
</body>
</html>
