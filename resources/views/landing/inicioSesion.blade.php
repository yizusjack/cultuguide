{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultuGuide</title>
    <link rel="icon" href="assets/imgs/icon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap + LeadMark main styles -->
	<link rel="stylesheet" href="assets/css/leadmark.css">
    <!-- JavaScript de Bootstrap (requiere jQuery) -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- main css -->
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/leadmark.css">


    <!-- modernizr -->
    <script src="js/modernizr.js"></script>
</head>
<body>--}}
<x-layout
    name="Login"
>
    <section  id="service" class="section pt-0">
        <div class="container"></div>
        <br><br>
    </section>
    <section id="service" class="section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 d-none d-md-block">
                    <img src="assets/imgs/inicioS.jpg" class="card-img" alt="Imagen" style="max-width: 500px;">
                </div>
                <div class="col-md-6">
                    <div class="card mb-5 col-md-10">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-4 tituloo">Iniciar Sesión</h5>
                            <br><br>
                            <x-validation-errors class="mb-4" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label titulo-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="usuario@ejemplo.com" value= "{{ old('email ')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label titulo-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" value= "{{ old('password ')}}">
                                    <br>
                                    <a href="{{ route('register')}} " style="font-size: 13px;">¿No tienes cuenta? Crea una.</a>
                                </div>
                                <div class="d-grid gap-2 justify-content-center align-items-center">
                                    <br><br>
                                    <button type="submit" class="btn btn-primary" style="max-width: 150px;">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{--<!-- Bootstrap Bundle with Popper -->
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
    <script src="js/custom.js"></script>--}}
</x-layout>
{{--</body>
</html>--}}
