<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-primary mb-0">Lista de Alumnos</h2>
            <a href="../REGISTRO/alumnos.php" class="btn btn-primary fw-bold">+ Nuevo Alumno</a>
        </div>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th>Matrícula</th>
                                <th>Nombre Completo</th>
                                <th>Domicilio</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se iterarán los datos de la base de datos con PHP -->
                            <tr>
                                <td>643627s</td>
                                <td>saac perez cortes</td>
                                <td>psd(LC</td>
                                <td>saac@gmail231</td>
                                <td>553828993</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>