<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
            <!-- Favicon -->
            <link rel="apple-touch-icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-180x180.png" />
<link rel="icon" href="https://www.vbrand.cl/delalba/wp-content/uploads/2021/07/cropped-favicon-udalba-32x32.png" sizes="32x32" />

    <title>Mi Dashboard</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    	<script src="../public/dashboard/js/app.js"></script>
        <link rel="stylesheet" href="../public/dashboard/css/main.css">

		{!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css') !!}
		{!! Html::style('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css') !!}
		{!! Html::style('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css') !!}
		{!! Html::style('https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css') !!}

    
</head>
<body>
    <div id="app">
       @include('partials.navigator')
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
	{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js') !!}
	<script src="{{ asset('js/app.js') }}"></script>
	{!! Html::script('//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') !!}
    {!! Html::script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') !!}
	{!! Html::script('js/jquery.Rut.js') !!}
	{!! Html::script('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js') !!}
	{!! Html::script('https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js') !!}
	{!! Html::script('https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js') !!}
	@yield('scripts')
	{!! Html::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
	{!! Html::script('https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js') !!}
</body>
</html>
