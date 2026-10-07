<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion = $mysqli;
}

$descripcion_mat = trim($_POST['descripcion_mat'] ?? $_POST['nom_mat'] ?? $_POST['materia'] ?? '');

$mensaje = "";
$exito = false;

if ($conexion && !empty($descripcion_mat)) {
    $desc_e = mysqli_real_escape_string($conexion, $descripcion_mat);

    $sql = "INSERT INTO materias (descripcion_mat, estatus_mat) VALUES ('$desc_e', 'ALTA')";

    if (mysqli_query($conexion, $sql)) {
        $exito = true;
        $mensaje = "¡Materia registrada con éxito!";
    } else {
        $mensaje = "Error al registrar la materia: " . mysqli_error($conexion);
    }
} else {
    $mensaje = "Por favor ingrese el nombre o descripción de la materia.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro - Escuela IICP</title>
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
                <div class="card-header custom-header p-4 text-center">
                    <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                </div>
                <div class="card-body p-4 text-center">
                    <?php if ($exito): ?>
                        <div class="alert alert-success border-0 shadow-sm p-4 mb-4" role="alert">
                            <h5 class="fw-bold mb-3"><?php echo $mensaje; ?></h5>
                            <hr>
                            <div class="text-start">
                                <p class="mb-0"><strong>Descripción:</strong> <?php echo htmlspecialchars($descripcion_mat); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger border-0 shadow-sm p-4 mb-4" role="alert">
                            <h5 class="fw-bold mb-0"><?php echo $mensaje; ?></h5>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="../REGISTRO/materias.php" class="btn btn-outline-secondary px-4">Registrar Otra</a>
                        <a href="../CRUDE/crudematerias.php" class="btn btn-primary fw-bold px-4" style="background: #1e3c72; border: none;">Ver Materias</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>