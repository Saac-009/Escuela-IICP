<?php
require_once "../conexion.php";

$idprof = isset($_GET['idprof']) ? intval($_GET['idprof']) : 0;
$profesor = null;

if ($idprof > 0) {
    $stmt = $mysqli->prepare("SELECT * FROM profesores WHERE idprof = ?");
    $stmt->bind_param("i", $idprof);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $profesor = $resultado->fetch_assoc();
}

if (!$profesor) {
    header("Location: ../CRUDE/crudeprofesores.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt_baja = $mysqli->prepare("UPDATE profesores SET estatus_prof = 'BAJA' WHERE idprof = ?");
    $stmt_baja->bind_param("i", $idprof);
    
    if ($stmt_baja->execute()) {
        header("Location: ../CRUDE/crudeprofesores.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Confirmar Baja de Profesor</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted fw-bold">¿Estás seguro de que deseas dar de baja al siguiente profesor?</p>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>No. Control:</strong> <?php echo htmlspecialchars($profesor['nocontrol_prof']); ?></li>
                        <li class="list-group-item"><strong>Nombre Completo:</strong> <?php echo htmlspecialchars($profesor['nombre_prof'] . ' ' . $profesor['apaterno_prof'] . ' ' . $profesor['amaterno_prof']); ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($profesor['mail_prof']); ?></li>
                    </ul>

                    <form action="" method="POST" class="d-flex justify-content-between">
                        <a href="../CRUDE/crudeprofesores.php" class="btn btn-secondary">Cancelar</a>
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