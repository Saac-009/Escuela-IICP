<?php
require_once "../conexion.php";

$idgrupo = isset($_GET['idgrupo']) ? intval($_GET['idgrupo']) : 0;
$grupo = null;

if ($idgrupo > 0) {
    $stmt = $mysqli->prepare("SELECT * FROM grupo WHERE idgrupo = ?");
    $stmt->bind_param("i", $idgrupo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $grupo = $resultado->fetch_assoc();
}

if (!$grupo) {
    header("Location: ../CRUDE/crudegrupos.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt_baja = $mysqli->prepare("UPDATE grupo SET estatus_grupo = 'BAJA' WHERE idgrupo = ?");
    $stmt_baja->bind_param("i", $idgrupo);
    
    if ($stmt_baja->execute()) {
        header("Location: ../CRUDE/crudegrupos.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Baja de Grupo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm">
                <div class="card-header bg-danger text-white text-center">
                    <h4 class="mb-0">Confirmar Baja de Grupo</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted fw-bold">¿Estás seguro de que deseas dar de baja el siguiente grupo?</p>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>ID Grupo:</strong> <?php echo htmlspecialchars($grupo['idgrupo']); ?></li>
                        <li class="list-group-item"><strong>Descripción / Grupo:</strong> <?php echo htmlspecialchars($grupo['descripcion_grupo']); ?></li>
                    </ul>

                    <form action="" method="POST" class="d-flex justify-content-between">
                        <a href="../CRUDE/crudegrupos.php" class="btn btn-secondary">Cancelar</a>
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