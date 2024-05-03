<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

    <title>{{ $title ?? 'Cultuguide' }}</title>
    <link rel="icon" href="{{ asset('assets/imgs/icon.png') }}" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/leadmark.css') }}">
    <!-- JavaScript de Bootstrap (requiere jQuery) -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/leadmark.css">


    <!-- modernizr -->
    <script src="js/modernizr.js"></script>

    <!--Leaflet-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <!-- Dropzone -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>
<body>
    <nav class="navbar custom-navbar navbar-expand-md navbar-dark bg-dark fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <div>
                <a class="text-info h1titulo">CultuGuide</a>
            </div>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    @if( !Route::is('login') and !Route::is('register'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('lugar.index') }}" class="btn btn-outline-info rounded">Ir al inicio</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-outline-info rounded">Inicio de sesión</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="ml-4 nav-link btn btn-info btn-sm rounded">Registro</a>
                            </li>
                        @endauth  
                    @endif                   
                    
                </ul>
            </div>
        </div>
    </nav>
    <br>

    <section  id="service" class="section pt-0">
        <div class="container"></div>
    </section>

    {{$slot}}

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-2.1.1.js"></script>
        <!--  plugins -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/menu.js"></script>
        <script src="js/animated-headline.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
        <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    
        <!-- bootstrap 3 affix -->
        <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    
        <!-- Isotope -->
        <script src="assets/vendors/isotope/isotope.pkgd.js"></script>
    
        <!-- LeadMark js -->
        <script src="assets/js/leadmark.js"></script>
    
        <!--  custom script -->
        <script src="js/custom.js"></script>

        @yield('js')
        @livewireScripts
</body>
</html>