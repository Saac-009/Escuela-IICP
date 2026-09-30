<?php
require_once "../conexion.php";

$idalumn = isset($_GET['idalumn']) ? intval($_GET['idalumn']) : 0;
$alumno = null;

if ($idalumn > 0) {
    $stmt = $mysqli->prepare("SELECT * FROM alumnos WHERE idalumn = ?");
    $stmt->bind_param("i", $idalumn);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $alumno = $resultado->fetch_assoc();
}

if (!$alumno) {
    header("Location: ../CRUDE/crudealumnos.php");
    exit();
}

// Procesar la baja solo al dar clic en el botón de confirmación
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt_baja = $mysqli->prepare("UPDATE alumnos SET estatus_al = 'BAJA' WHERE idalumn = ?");
    $stmt_baja->bind_param("i", $idalumn);
    
    if ($stmt_baja->execute()) {
        header("Location: ../CRUDE/crudealumnos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Confirmar Baja de Alumno</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted fw-bold">¿Estás seguro de que deseas dar de baja al siguiente alumno?</p>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>Matrícula:</strong> <?php echo htmlspecialchars($alumno['matricula_al']); ?></li>
                        <li class="list-group-item"><strong>Nombre Completo:</strong> <?php echo htmlspecialchars($alumno['nombre_al'] . ' ' . $alumno['apaterno_al'] . ' ' . $alumno['amaterno_al']); ?></li>
                        <li class="list-group-item"><strong>Domicilio:</strong> <?php echo htmlspecialchars($alumno['dom_al']); ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($alumno['mail_al']); ?></li>
                    </ul>

                    <form action="" method="POST" class="d-flex justify-content-between">
                        <a href="../CRUDE/crudealumnos.php" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-danger">Confirmar Baja</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>