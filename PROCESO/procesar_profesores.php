<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Profesor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header bg-dark text-white py-3">
                        <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        require_once "../conexion.php";

                        $nombre_prof    = $_POST['nombre_prof'] ?? '';
                        $apaterno_prof  = $_POST['apaterno_prof'] ?? '';
                        $amaterno_prof  = $_POST['amaterno_prof'] ?? '';
                        $mail_prof      = $_POST['mail_prof'] ?? '';
                        $domicilio_prof = $_POST['domicilio_prof'] ?? '';
                        $tel_prof       = $_POST['tel_prof'] ?? '';

                        // Inserción en la base de datos saeIICP
                        $sql = "INSERT INTO profesores (nombre_prof, apaterno_prof, amaterno_prof) VALUES (?, ?, ?)";
                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->bind_param("sss", $nombre_prof, $apaterno_prof, $amaterno_prof);
                            $stmt->execute();
                            $stmt->close();
                        }
                        ?>

                        <div class="alert alert-dark" role="alert">
                            <h5 class="alert-heading fw-bold mb-2">¡Profesor registrado con éxito!</h5>
                            <p class="mb-0">
                                <strong>Nombre:</strong> <?php echo htmlspecialchars($nombre_prof); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($mail_prof); ?>
                            </p>
                        </div>

                        <a href="../REGISTRO/profesores.php" class="btn btn-outline-dark mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>