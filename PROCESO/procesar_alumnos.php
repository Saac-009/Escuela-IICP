<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 text-center">
                    <div class="card-header bg-primary text-white py-3">
                        <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                    </div>
                    <div class="card-body p-4">
                        <?php
                        require_once "../conexion.php";

                        // Recibir los campos enviadas desde el formulario REGISTRO/alumnos.php
                        $matricula = $_POST['matricula'] ?? '';
                        $nombre    = $_POST['nombre'] ?? '';
                        $apaterno  = $_POST['apaterno'] ?? '';
                        $amaterno  = $_POST['amaterno'] ?? '';
                        $domicilio = $_POST['domicilio'] ?? '';
                        $mail      = $_POST['mail'] ?? '';
                        $tel       = $_POST['tel'] ?? '';

                        // Inserción en la tabla alumnos usando los nombres exactos de columnas de la BD
                        $sql = "INSERT INTO alumnos (matricula_al, nombre_al, apaterno_al, amaterno_al, dom_al, mail_al, tel_al) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";

                        if ($stmt = $mysqli->prepare($sql)) {
                            $stmt->bind_param("sssssss", $matricula, $nombre, $apaterno, $amaterno, $domicilio, $mail, $tel);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "<div class='alert alert-danger'>Error SQL: " . htmlspecialchars($mysqli->error) . "</div>";
                        }
                        ?>

                        <div class="alert alert-success" role="alert">
                            <h5 class="alert-heading fw-bold mb-2">¡Alumno registrado con éxito!</h5>
                            <p class="mb-0">
                                <strong>Nombre:</strong> <?php echo htmlspecialchars($nombre . ' ' . $apaterno . ' ' . $amaterno); ?><br>
                                <strong>Matrícula:</strong> <?php echo htmlspecialchars($matricula); ?><br>
                                <strong>Email:</strong> <?php echo htmlspecialchars($mail); ?>
                            </p>
                        </div>

                        <a href="../REGISTRO/alumnos.php" class="btn btn-outline-primary mt-3">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>