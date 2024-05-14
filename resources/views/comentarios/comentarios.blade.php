<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publicación con Comentarios</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template Main CSS File -->
    <link href="{{asset('assets/template/css/style.css')}}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<!-- Contenedor principal -->
<div class="container py-4">
    <div class="container">
        <!-- Publicación -->
        <div class="bg-white p-4 rounded shadow mb-4">
            <!-- Información de lugar -->
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Título de la publicación</h2>
            <img src="https://via.placeholder.com/800x400" alt="Imagen de la publicación" class="mb-4 img-fluid rounded center-image">
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris euismod, magna a fermentum tincidunt, tortor turpis convallis risus, a hendrerit nisi justo ut odio.</p>
        </div>
    </div>

    <!-- Sección de comentarios -->
    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Comentarios</h3>
        <div class="border-bottom border-gray-300 py-4 position-relative">
            <div class="d-flex justify-content-between">
                <div>
                    <button type="button" class="btn btn-link report-button" onclick="openReportForm()"><i class="fas fa-exclamation-circle text-danger"></i></button>
                    <p class="text-gray-700">Comentario de <strong>Usuario123</strong> - 7 de mayo de 2024</p>
                    <p class="text-gray-700">Blablablabla.</p>
                    <div class="mt-2 d-flex align-items-center position-relative">
                        <!-- Selección de calificación por estrellas -->
                        <div class="rating" id="user123Rating">
                            <input type="radio" id="user123star5" name="user123rating" value="5" disabled/><label for="user123star5"></label>
                            <input type="radio" id="user123star4" name="user123rating" value="4" checked disabled /><label for="user123star4"></label>
                            <input type="radio" id="user123star3" name="user123rating" value="3" disabled/><label for="user123star3"></label>
                            <input type="radio" id="user123star2" name="user123rating" value="2" disabled/><label for="user123star2"></label>
                            <input type="radio" id="user123star1" name="user123rating" value="1" disabled/><label for="user123star1"></label>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="text-gray-700">Descripción: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Botón para escribir comentario -->
        <button id="writeCommentBtn" class="btn btn-primary mt-3" onclick="showCommentForm()">Escribir comentario</button>
        <!-- Formulario para agregar comentario (inicialmente oculto) -->
        <form id="commentForm" class="mt-4" style="display: none;">
            <h4 class="text-lg font-semibold text-gray-800 mb-4">¡Deja tu comentario!</h4>
            <div class="mb-3">
                <label for="me-2 text-gray-600" class="form-label">Título:</label>
                <input type="text" class="form-control" id="commentTitle" placeholder="Resume tu experiencia en unas pocas palabras">
            </div>
            <div class="mt-2 d-flex align-items-center">
                <label class="me-2 text-gray-600">Calificación:</label>
                <!-- Selección de calificación por estrellas -->
                <div class="rating" id="newCommentRating">
                    <input type="radio" id="newCommentStar5" name="newCommentRating" value="5" onclick="rateComment(5)" /><label for="newCommentStar5"></label>
                    <input type="radio" id="newCommentStar4" name="newCommentRating" value="4" onclick="rateComment(4)" /><label for="newCommentStar4"></label>
                    <input type="radio" id="newCommentStar3" name="newCommentRating" value="3" onclick="rateComment(3)" /><label for="newCommentStar3"></label>
                    <input type="radio" id="newCommentStar2" name="newCommentRating" value="2" onclick="rateComment(2)" /><label for="newCommentStar2"></label>
                    <input type="radio" id="newCommentStar1" name="newCommentRating" value="1" onclick="rateComment(1)" /><label for="newCommentStar1"></label>
                </div>
            </div>
            <br>
            <div class="mb-3">
                <label for="image" class="form-label">Agrega una imagen:</label>
                <input type="file" class="form-control" id="image">
            </div>
            <form class="mt-4">
                <textarea class="form-control mb-2" rows="4" placeholder="Escribe tu comentario aquí"></textarea>
                <button type="submit" class="btn btn-primary mt-3">Publicar comentario</button>
            </form>
        </form>
        <!-- Formulario para reportar -->
        <form id="reportForm" class="mt-4" target="_blank">
            <h4 class="text-lg font-semibold text-gray-800 mb-2">Reportar comentario</h4>
            <div class="mb-2">
                <label for="reason" class="form-label">Motivo del reporte:</label>
                <select class="form-select" id="reason" name="reason">
                    <option value="Informacion falsa">Información falsa</option>
                    <option value="Agresión verbal">Agresión verbal</option>
                    <option value="Spam">Spam</option>
                </select>
            </div>
            <button type="submit" class="btn btn-danger">Enviar reporte</button>
            <button type="button" class="btn btn-secondary mt-2" onclick="closeReportForm()">Cancelar</button>
        </form>
    </div>

</div>
<script>
    function openReportForm() {
        document.getElementById("reportForm").style.display = "block";
    }

    function closeReportForm() {
        document.getElementById("reportForm").style.display = "none";
    }

    function showCommentForm() {
        document.getElementById("commentForm").style.display = "block";
        document.getElementById("writeCommentBtn").style.display = "none"; // Oculta el botón de escribir comentario
    }
</script>
</body>
</html>
