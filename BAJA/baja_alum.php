<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion =$mysqli;
}

$id =$_GET['id'] ?? $_POST['id'] ?? '';$confirmado = isset($_POST['confirmar']);$alumno = null;
$mensaje = "";

if ($conexion && !empty($id)) {     // 1. Identificar la tabla$tabla = "alumno";
    $res_t = @mysqli_query($conexion, "SHOW TABLES LIKE 'alumno'");
    if (!$res_t || mysqli_num_rows($res_t) == 0) {$tabla = "alumnos"; }

    // 2. Identificar la columna ID
    $col_id = "mat_alum";
    $res_c = mysqli_query($conexion, "SHOW COLUMNS FROM `$tabla`");
    if ($res_c) {$first = true;
        while ($c = mysqli_fetch_assoc($res_c)) {
            if ($first) {$col_id = $c['Field'];$first = false; }
            if (in_array(strtolower($c['Field']), ['mat_alum', 'matricula', 'id_alumno'])) { $col_id =$c['Field']; }
        }
    }

    // Processar eliminación si fue confirmada
    if ($confirmado) {$sql_del = "DELETE FROM `$tabla` WHERE `$col_id` = '$id'";
        if (mysqli_query($conexion,$sql_del)) {
            header("Location: ../CRUDE/crudealumnos.php");
            exit;
        } else {
            $mensaje = "Error al eliminar: " . mysqli_error($conexion);
        }
    }

    // Obtener los datos del alumno para mostrar la confirmación
    $sql_sel = "SELECT * FROM `$tabla` WHERE `$col_id` = '$id'";
    $res_sel = mysqli_query($conexion,$sql_sel);
    if ($res_sel && mysqli_num_rows($res_sel) > 0) {
        $alumno = mysqli_fetch_assoc($res_sel);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Alumno - Escuela IICP</title>
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
                    <h4 class="mb-0 fw-bold">Confirmar Eliminar Alumno</h4>
                    <small class="opacity-75">Verifique la información antes de dar de baja</small>
                </div>
                <div class="card-body p-4 text-center">
                    <?php if ($mensaje): ?>
                        <div class="alert alert-danger"><?php echo $mensaje; ?></div>
                    <?php endif; ?>

                    <?php if ($alumno): ?>
                        <div class="alert alert-warning border-0 shadow-sm p-4 text-start mb-4">
                            <h5 class="fw-bold text-dark mb-3 text-center">¿Desea eliminar permanentemente a este alumno?</h5>
                            <hr>
                            <?php $vals = array_values($alumno); ?>
                            <p class="mb-1"><strong>Matrícula / ID:</strong> <?php echo htmlspecialchars($vals[0]); ?></p>
                            <p class="mb-1"><strong>Nombre:</strong> <?php echo htmlspecialchars(($vals[1] ?? '') . ' ' . ($vals[2] ?? '') . ' ' . ($vals[3] ?? '')); ?></p>
                            <p class="mb-0"><strong>Grupo:</strong> <?php echo htmlspecialchars($vals[4] ?? 'N/A'); ?></p>
                        </div>

                        <form method="POST" action="baja_alum.php">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="../CRUDE/crudealumnos.php" class="btn btn-outline-secondary px-4">Cancelar</a>
                                <button type="submit" name="confirmar" class="btn btn-danger fw-bold px-4">Confirmar Baja</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <div class="alert alert-danger">No se encontró el registro del alumno especificado.</div>
                        <a href="../CRUDE/crudealumnos.php" class="btn btn-secondary">Regresar</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>