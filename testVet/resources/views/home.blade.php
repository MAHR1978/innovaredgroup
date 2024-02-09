@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="container">
                <div class="row">
                    <!-- Single Service Right -->
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <div class="container">                              
                            @yield('contenido')
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service Right -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


