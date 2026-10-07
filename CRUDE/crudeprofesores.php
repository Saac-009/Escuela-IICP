<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion = $mysqli;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesores - Escuela IICP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
    </style>
</head>
<body class="bg-light">

<?php if (file_exists('../navegacion.php')) include '../navegacion.php'; ?>

<div class="container my-4">
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-header custom-header p-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 fw-bold">Plantilla Docente</h4>
                <small class="opacity-75">Gestión de profesores de la institución</small>
            </div>
            <div>
                <a href="../REGISTRO/profesores.php" class="btn btn-light btn-sm fw-bold me-2">+ Nuevo Profesor</a>
                <a href="../navegacion.php" class="btn btn-outline-light btn-sm">Menú</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light border-bottom">
                        <tr class="text-secondary small text-uppercase">
                            <th class="ps-4">ID</th>
                            <th>No. Control</th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Estatus</th>
                            <th class="text-end pe-4">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($conexion) {
                            $resultado = mysqli_query($conexion, "SELECT * FROM profesores");

                            if ($resultado && mysqli_num_rows($resultado) > 0) {
                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $id = $row['idprof'];
                                    $nocontrol = $row['nocontrol_prof'] ?: 'N/A';
                                    $nombre = $row['nombre_prof'];
                                    $apaterno = $row['apaterno_prof'];
                                    $amaterno = $row['amaterno_prof'];
                                    $estatus = $row['estatus_prof'];

                                    echo "<tr>";
                                    echo "<td class='ps-4'><span class='badge bg-primary-subtle text-primary fw-bold px-2 py-1'>" . htmlspecialchars($id) . "</span></td>";
                                    echo "<td>" . htmlspecialchars($nocontrol) . "</td>";
                                    echo "<td class='fw-semibold text-dark'>" . htmlspecialchars($nombre) . "</td>";
                                    echo "<td>" . htmlspecialchars($apaterno) . "</td>";
                                    echo "<td>" . htmlspecialchars($amaterno) . "</td>";
                                    echo "<td><span class='badge " . ($estatus == 'ALTA' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger') . "'>" . htmlspecialchars($estatus) . "</span></td>";
                                    echo "<td class='text-end pe-4'>";
                                    echo "<a href='../MODIFICACIONES/modif_prof.php?id=" . urlencode($id) . "' class='btn btn-outline-primary btn-sm me-1'>Editar</a>";
                                    echo "<a href='../BAJA/baja_prof.php?id=" . urlencode($id) . "' class='btn btn-outline-danger btn-sm'>Eliminar</a>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-4'>No hay profesores registrados.</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>