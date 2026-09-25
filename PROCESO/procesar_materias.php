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
                        $descripcion = $_POST['descripcion'] ?? '';
                        ?>
                        <div class="alert alert-warning" role="alert">
                            <h5 class="alert-heading fw-bold mb-2">¡Materia registrada con éxito!</h5>
                            <p class="mb-0">
                                <strong>Descripción:</strong> <?php echo htmlspecialchars($descripcion); ?>
                            </p>
                        </div>
                        <a href="../REGISTRO/materias.php" class="btn btn-outline-warning text-dark mt-3 fw-bold">← Volver al formulario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>