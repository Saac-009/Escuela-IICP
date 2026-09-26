<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Grupo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header bg-success text-white py-3">
                        <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        require_once "../conexion.php";

                        // Recibir el campo enviado desde REGISTRO/grupos.php
                        $descripcion = $_POST['descripcion'] ?? '';

                        // Inserción en la tabla grupo usando la columna exacta: descripcion_grupo
                        $sql = "INSERT INTO grupo (descripcion_grupo) VALUES (?)";

                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->bind_param("s", $descripcion);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger'>Error SQL: " . htmlspecialchars($mysqli->error) . "</div>";
                        }
                        ?>

                        <div class="alert alert-success" role="alert">
                            <h5 class="alert-heading fw-bold mb-2">¡Grupo registrado con éxito!</h5>
                            <p class="mb-0">
                                <strong>Descripción:</strong> <?php echo htmlspecialchars($descripcion); ?>
                            </p>
                        </div>

                        <a href="../REGISTRO/grupos.php" class="btn btn-outline-success mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>