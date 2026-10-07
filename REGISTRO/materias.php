<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion = $mysqli;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Materias - Escuela IICP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
    </style>
</head>
<body class="bg-light">

<?php if (file_exists('../navegacion.php')) include '../navegacion.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header custom-header p-4">
                    <h4 class="mb-0 fw-bold">Registro de Materia</h4>
                    <small class="opacity-75">Ingrese el nombre o descripción de la materia</small>
                </div>
                <div class="card-body p-4">
                    <form action="../PROCESO/procesar_materias.php" method="POST">
                        <div class="mb-4">
                            <label for="descripcion_mat" class="form-label fw-semibold">Nombre / Descripción de la Materia</label>
                            <input type="text" class="form-control" id="descripcion_mat" name="descripcion_mat" placeholder="Ej. Matemáticas II, Inglés" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="../CRUDE/crudematerias.php" class="btn btn-outline-secondary">Ver Materias</a>
                            <button type="submit" class="btn btn-primary fw-bold px-4" style="background: #1e3c72; border: none;">Guardar Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>