<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion = $mysqli;
}

$id = $_GET['id'] ?? $_POST['id'] ?? '';
$confirmado = isset($_POST['confirmar']);
$materia = null;
$mensaje = "";

if ($conexion && !empty($id)) {
    $id_e = mysqli_real_escape_string($conexion, $id);

    // Procesar eliminación al confirmar
    if ($confirmado) {
        $sql_del = "DELETE FROM materias WHERE idmateria = '$id_e'";
        if (mysqli_query($conexion, $sql_del)) {
            header("Location: ../CRUDE/crudematerias.php");
            exit;
        } else {
            $mensaje = "Error al eliminar la materia: " . mysqli_error($conexion);
        }
    }

    // Obtener información de la materia
    $res_sel = mysqli_query($conexion, "SELECT * FROM materias WHERE idmateria = '$id_e'");
    if ($res_sel && mysqli_num_rows($res_sel) > 0) {
        $materia = mysqli_fetch_assoc($res_sel);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Materia - Escuela IICP</title>
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
                    <h4 class="mb-0 fw-bold">Confirmar Eliminar Materia</h4>
                    <small class="opacity-75">Verifique la información antes de procesar la baja</small>
                </div>
                <div class="card-body p-4 text-center">
                    <?php if ($mensaje): ?>
                        <div class="alert alert-danger"><?php echo $mensaje; ?></div>
                    <?php endif; ?>

                    <?php if ($materia): ?>
                        <div class="alert alert-warning border-0 shadow-sm p-4 text-start mb-4">
                            <h5 class="fw-bold text-dark mb-3 text-center">¿Desea eliminar permanentemente esta materia?</h5>
                            <hr>
                            <p class="mb-1"><strong>ID Materia:</strong> <?php echo htmlspecialchars($materia['idmateria']); ?></p>
                            <p class="mb-1"><strong>Nombre / Descripción:</strong> <?php echo htmlspecialchars($materia['descripcion_mat'] ?: 'Sin nombre'); ?></p>
                            <p class="mb-0"><strong>Estatus Actual:</strong> <?php echo htmlspecialchars($materia['estatus_mat'] ?: 'ALTA'); ?></p>
                        </div>

                        <form method="POST" action="baja_mat.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="../CRUDE/crudematerias.php" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" name="confirmar" class="btn btn-danger fw-bold px-4">Confirmar Baja</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger">No se encontró el registro de la materia especificada.</div>
                        <a href="../CRUDE/crudematerias.php" class="btn btn-secondary">Regresar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>