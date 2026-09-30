<?php
require_once "../conexion.php";

$idmateria = isset($_GET['idmateria']) ? intval($_GET['idmateria']) : 0;
$materia = null;

if ($idmateria > 0) {
    $stmt = $mysqli->prepare("SELECT * FROM materias WHERE idmateria = ?");
    $stmt->bind_param("i", $idmateria);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $materia = $resultado->fetch_assoc();
}

if (!$materia) {
    header("Location: ../CRUDE/crudematerias.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt_baja = $mysqli->prepare("UPDATE materias SET estatus_mat = 'BAJA' WHERE idmateria = ?");
    $stmt_baja->bind_param("i", $idmateria);
    
    if ($stmt_baja->execute()) {
        header("Location: ../CRUDE/crudematerias.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Confirmar Baja de Materia</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted fw-bold">¿Estás seguro de que deseas dar de baja la siguiente materia?</p>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>ID Materia:</strong> <?php echo htmlspecialchars($materia['idmateria']); ?></li>
                        <li class="list-group-item"><strong>Descripción / Materia:</strong> <?php echo htmlspecialchars($materia['descripcion_mat']); ?></li>
                    </ul>

                    <form action="" method="POST" class="d-flex justify-content-between">
                        <a href="../CRUDE/crudematerias.php" class="btn btn-secondary">Cancelar</a>
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