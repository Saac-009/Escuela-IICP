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
    <title>Reporte de Profesores - Escuela IICP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
        @media print {
            .no-print { display: none !important; }
            .card { border: none !important; shadow: none !important; }
        }
    </style>
</head>
<body class="bg-light">

<div class="no-print">
    <?php if (file_exists('../navegacion.php')) include '../navegacion.php'; ?>
</div>

<div class="container my-4">
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <div class="card-header custom-header p-4 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="mb-0 fw-bold">📊 Reporte General de Profesores</h4>
                <small class="opacity-75">Registro del personal docente registrado</small>
            </div>
            <div class="no-print">
                <button onclick="window.print()" class="btn btn-light btn-sm fw-bold me-2">🖨️ Imprimir Reporte</button>
                <a href="../navegacion.php" class="btn btn-outline-light btn-sm">Menú</a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light border-bottom">
                        <tr class="text-secondary small text-uppercase">
                            <th class="ps-4">ID</th>
                            <th>No. Control</th>
                            <th>Nombre Completo</th>
                            <th>Domicilio</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                            <th class="text-center pe-4">Estatus</th>
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
                                    $nombre = trim($row['nombre_prof'] . ' ' . $row['apaterno_prof'] . ' ' . $row['amaterno_prof']);
                                    $dom = $row['dom_prof'] ?: 'Sin registrar';
                                    $mail = $row['mail_prof'] ?: 'Sin registrar';
                                    $tel = $row['tel_prof'] ?: 'Sin registrar';
                                    $estatus = $row['estatus_prof'] ?: 'ALTA';

                                    echo "<tr>";
                                    echo "<td class='ps-4'><span class='badge bg-primary-subtle text-primary fw-bold px-2 py-1'>" . htmlspecialchars($id) . "</span></td>";
                                    echo "<td class='fw-semibold'>" . htmlspecialchars($nocontrol) . "</td>";
                                    echo "<td class='text-dark fw-bold'>" . htmlspecialchars($nombre) . "</td>";
                                    echo "<td>" . htmlspecialchars($dom) . "</td>";
                                    echo "<td>" . htmlspecialchars($mail) . "</td>";
                                    echo "<td>" . htmlspecialchars($tel) . "</td>";
                                    echo "<td class='text-center pe-4'><span class='badge " . ($estatus == 'ALTA' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger') . "'>" . htmlspecialchars($estatus) . "</span></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-4'>No hay profesores registrados para generar el reporte.</td></tr>";
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