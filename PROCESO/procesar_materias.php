<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Materia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header bg-warning text-dark py-3">
                        <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        require_once "../conexion.php";

                        // Recibir el campo enviado desde REGISTRO/materias.php
                        $descripcion = $_POST['descripcion'] ?? '';

                        // Inserción en la tabla materias con el nombre exacto de columna: descripcion_mat
                        $sql = "INSERT INTO materias (descripcion_mat) VALUES (?)";

                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->bind_param("s", $descripcion);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger'>Error SQL: " . htmlspecialchars($mysqli->error) . "</div>";
                        }
                        ?>

                        <div class="alert alert-warning" role="alert">
                            <h5 class="alert-heading fw-bold mb-2">¡Materia registrada con éxito!</h5>
                            <p class="mb-0">
                                <strong>Descripción:</strong> <?php echo htmlspecialchars($descripcion); ?>
                            </p>
                        </div>

                        <a href="../REGISTRO/materias.php" class="btn btn-outline-warning text-dark mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>