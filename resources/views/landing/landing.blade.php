<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CultuGuide</title>
    <!-- font icons -->
    <link rel="icon" href="{{ asset('assets/imgs/icon.png')  }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/vendors/themify-icons/css/themify-icons.css')  }}">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="{{ asset('assets/css/leadmark.css')  }}">
    <!-- JavaScript de Bootstrap (requiere jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+6zEiZ6taOe7k6Kpe8BdV3i3R5OyZjs5W93nV7C1Pai5iLv6P1txNqNaeD" crossorigin="anonymous"></script>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <div>
                <h1 class="text-info">CultuGuide</h1>
            </div>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{--<div class="search">
                <input type="text" placeholder="Buscar..." id="search-input">
            </div>--}}
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
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
                    
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Of Second Navigation -->
    
    <!-- Page Header -->
    <header class="header">
        <div class="overlay">
            <h1 class="subtitle">ENCUENTRA TU</h1>
            <h1 class="title">LUGAR IDEAL</h1>  
        </div>  
        <div class="shape">
            <svg viewBox="0 0 1500 200">
                <path d="m 0,240 h 1500.4828 v -71.92164 c 0,0 -286.2763,-81.79324 -743.19024,-81.79324 C 300.37862,86.28512 0,168.07836 0,168.07836 Z"/>
            </svg>
        </div>  
        <div class="mouse-icon"><div class="wheel"></div></div>
    </header>
    <!-- End Of Page Header -->
    <section  id="service" class="section pt-0">
        <div class="container"></div>
    </section>
    <!-- Service Section -->
    <section  id="service" class="section pt-0">
        <div class="container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-cafRes-tab" data-toggle="pill" href="#pills-cafRes" role="tab" aria-controls="pills-cafRes" aria-selected="false">
                        <i class="fas fa-coffee fa-2x"></i> <span><br>Cafeterías y <br> restaurantes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-artes-tab" data-toggle="pill" href="#pills-artes" role="tab" aria-controls="pills-artes" aria-selected="false">
                        <i class="fas fa-university fa-2x"></i> <span><br>Artes escénicas<br> y visuales</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-musEve-tab" data-toggle="pill" href="#pills-musEve" role="tab" aria-controls="pills-musEve" aria-selected="false">
                        <i class="fas fa-guitar fa-2x"></i> <span><br>Música y<br> eventos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-eduCul-tab" data-toggle="pill" href="#pills-eduCul" role="tab" aria-controls="pills-eduCul" aria-selected="false">
                        <i class="fas fa-paint-brush fa-2x"></i> <span><br>Educación <br>cultural</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-patri-tab" data-toggle="pill" href="#pills-patri" role="tab" aria-controls="pills-patri" aria-selected="false">
                        <i class="fas fa-palette fa-2x"></i> <span><br>Patrimonios<br> culturales</span> 
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex flex-column align-items-center" id="pills-eveFest-tab" data-toggle="pill" href="#pills-eveFest" role="tab" aria-controls="pills-eveFest" aria-selected="false">
                        <i class="fas fa-wine-glass fa-2x"></i> <span><br>Eventos y<br> festivales</span> 
                    </a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="pills-cafRes" role="tabpanel" aria-labelledby="pills-cafRes-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/cafe.jpg" alt="Imagen 1" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Explora el vibrante mundo de las cafeterías y restaurantes, donde cada bocado cuenta una historia
                            y cada taza de café despierta nuevos sabores y sensaciones. Sumérgete en la diversidad de aromas
                            y sabores mientras recorres los acogedores rincones de las cafeterías locales, donde el café se 
                            sirve con pasión y los platos están llenos de creatividad y tradición. Descubre la fusión de culturas
                            y estilos culinarios en los restaurantes de la zona, donde los chefs experimentan con ingredientes 
                            frescos y técnicas innovadoras para ofrecerte una experiencia gastronómica única. Deléitate con cada 
                            sabor y disfruta del ambiente acogedor y familiar que caracteriza a estos lugares, donde cada visita 
                            se convierte en un viaje culinario inolvidable.
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-artes" role="tabpanel" aria-labelledby="pills-artes-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/artes.jpg" alt="Imagen 2" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Adéntrate en el emocionante mundo de las artes escénicas, donde la creatividad y la expresión se encuentran
                            en cada actuación. Descubre la magia del teatro, donde las historias cobran vida en el escenario y las 
                            emociones se transmiten a través de cada gesto y palabra. Sumérgete en el fascinante universo de la danza,
                            donde el movimiento se convierte en poesía y la música en el latido del alma. Explora el maravilloso mundo
                            de la música en vivo, donde cada nota es una melodía que toca el corazón y cada concierto es una experiencia
                            inolvidable. Deléitate con la belleza y el poder de las artes escénicas, donde el arte se encuentra con el
                            espectador en un encuentro mágico que trasciende el tiempo y el espacio.
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-musEve" role="tabpanel" aria-labelledby="pills-musEve-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/musica.jpg" alt="Imagen 2" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Sumérgete en el emocionante mundo de la música y los eventos, donde cada melodía es una experiencia
                            y cada encuentro es un momento especial. Descubre la emoción de los conciertos en vivo, los festivales
                            llenos de energía y los eventos culturales que celebran la diversidad musical. Vive cada momento al
                            máximo y disfruta de la magia de la música y los eventos en su máximo esplendor.
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-eduCul" role="tabpanel" aria-labelledby="pills-eduCul-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/edu.jpg" alt="Imagen 6" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Explora el fascinante mundo de la educación cultural, donde el conocimiento se entrelaza con la
                            creatividad y la historia cobra vida. Sumérgete en el vasto océano del saber, donde cada descubrimiento
                            es una ventana a nuevas perspectivas y cada lección es una oportunidad para crecer. Descubre la riqueza y la
                            diversidad de las artes, la literatura, la historia y las tradiciones, que forman el tejido de nuestra
                            identidad cultural. Atrévete a explorar nuevos horizontes y a expandir tu mente con experiencias enriquecedoras
                            que te llevarán a través del tiempo y el espacio. Déjate inspirar por el arte, la música, el teatro y la literatura,
                            y encuentra tu propio camino hacia el conocimiento y la comprensión del mundo que te rodea.
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-patri" role="tabpanel" aria-labelledby="pills-patri-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/patri.jpg" alt="Imagen 6" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Sumérgete en un viaje por el pasado mientras exploras sitios históricos, monumentos emblemáticos, lugares arqueológicos,
                            museos históricos y bibliotecas. Descubre la riqueza y diversidad de nuestra herencia cultural, desde antiguas ruinas 
                            hasta monumentos que son símbolos de nuestra identidad.
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-eveFest" role="tabpanel" aria-labelledby="pills-eveFestt-tab"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/imgs/festi.jpg" alt="Imagen 6" class="img-fluid" style="max-width: 500px;">
                        </div>
                        <div class="col-md-6 align-self-center">
                            Sumérgete en el vibrante mundo de los festivales y eventos, donde la emoción y la diversión están siempre presentes.
                            Descubre la alegría de celebrar la vida con música en vivo, arte callejero, gastronomía deliciosa y experiencias únicas.
                            Vive momentos inolvidables rodeado de personas que comparten tus mismas pasiones y encuentra inspiración en cada espectáculo
                            y actividad. Prepárate para disfrutar de la energía contagiosa de la multitud y sumérgete en la atmósfera mágica que solo
                            los festivales y eventos pueden ofrecer.
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <!-- End OF Service Section -->
    <!-- Contact Section -->
    <section id="contact" class="section has-img-bg pb-0">
        <div class="col-md-6">
            
        </div>
        <div class="col-md-7">
                
        </div>
        <div class="container">
            <div class="row align-items-center">
                <h4 class="mb-4">¿Quieres encontrar actividades relacionadas a ti?</h4>
                <div class="col-md-5 my-3">
                    @auth
                        <a href="{{ route('lugar.index') }}" class="ml-4 nav-link btn btn-info btn-sm rounded mb-4" style="max-width: 100px;">Comienza</a>
                    @else
                        <a href="{{ route('register') }}" class="ml-4 nav-link btn btn-info btn-sm rounded mb-4" style="max-width: 100px;">Regístrate</a>
                    @endauth 
                    
                </div>
                <div class="col-md-7">
                    <form>
                        <h6 class="mb-4">Explora más lugares</h6>
                        <a class="mb-4" href="lugares.html">¡Algunos lugares</a>                       
                    </form>
                </div>
            </div> 
        </div>
    </section>
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="assets/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="assets/js/leadmark.js"></script>
    <script>
        // Ocultar todos los paneles de contenido al cargar la página
        document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
            tabPane.classList.add('d-none');
        });
    
        // Mostrar el panel de contenido correspondiente cuando se hace clic en un enlace de navegación
        document.querySelectorAll('.nav-link').forEach(function(navLink) {
            navLink.addEventListener('click', function() {
                // Ocultar todos los paneles de contenido
                document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
                    tabPane.classList.add('d-none');
                });
    
                // Obtener el ID del panel de contenido correspondiente al enlace de navegación
                var targetId = this.getAttribute('href').replace('#', '');
    
                // Mostrar el panel de contenido correspondiente
                document.getElementById(targetId).classList.remove('d-none');
            });
        });
    </script>

</body>
</html>
