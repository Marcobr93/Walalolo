<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('images/W.png') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/walalolo.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinner.css') }}" rel="stylesheet">
    <link href="{{ asset('css/iziModal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">

    <!-- CDN jquery.ui(CSS) -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- CDN datatables.js(CSS) -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.16/r-2.2.1/sc-1.4.4/datatables.min.css"/>

    <!-- CDN leaflet(CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
          integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
          crossorigin=""/>


</head>
<body class="bg-color">
<div id="app">
    @include('layouts.navbar')
    <div class="row">
        <div class="col-lg-2 marginTop">
            @if((Request::is('/')) || (Request::is('busqueda*')))
                {{--<button id="btnCollapseBusqueda" data-toggle="collapse" class="btn btn-dark center my-4">--}}
                    {{--Mostrar búsqueda--}}
                {{--</button>--}}

                {{--<div class="collapse multi-collapse" id="mostrarBusqueda">--}}
                        {{--@include('productos.categorias')--}}
                {{--</div>--}}
                @endif
        </div>
        <div class="col-lg-8 mt-4">
            @yield('content')
        </div>
    </div>
</div>

@include('layouts.footer')

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/disableButton.js') }}"></script>
<script src="{{ asset('js/collapse.js') }}"></script>


<!-- CDN jquery.ui(JS) -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- CDN datatables.js(JS) -->
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4-4.0.0/dt-1.10.16/af-2.2.2/b-1.5.1/cr-1.4.1/r-2.2.1/sc-1.4.4/datatables.min.js"></script>

<!-- CDN leaflet(JS) -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>

@stack('scripts')
</body>

</html>
