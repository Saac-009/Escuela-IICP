<?php
require_once "../conexion.php";

$sql = "SELECT idprof, nocontrol_prof, nombre_prof, apaterno_prof, amaterno_prof, dom_prof, mail_prof, tel_prof 
        FROM profesores 
        WHERE estatus_prof = 'ALTA' OR estatus_prof IS NULL";
$resultado = $mysqli->query($sql);
$profesores = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-4">
    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <h1 class="text-center my-4">Catálogo de Profesores</h1>

            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">No. Control</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Email</th>
                        <th scope="col" colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($profesores)): ?>
                        <?php foreach ($profesores as $prof): ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($prof['idprof']); ?></th>
                                <td><?php echo htmlspecialchars($prof['nocontrol_prof']); ?></td>
                                <td><?php echo htmlspecialchars($prof['nombre_prof']); ?></td>
                                <td><?php echo htmlspecialchars($prof['apaterno_prof']); ?></td>
                                <td><?php echo htmlspecialchars($prof['amaterno_prof']); ?></td>
                                <td><?php echo htmlspecialchars($prof['mail_prof']); ?></td>

                                <td class="text-center">
                                    <a href="../REGISTRO/profesores.php" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Agregar">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../MODIFICACIONES/modif_prof.php?idprof=<?php echo $prof['idprof']; ?>" class="btn btn-primary btn-sm d-inline-block" style="cursor: pointer;" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../BAJA/baja_prof.php?idprof=<?php echo $prof['idprof']; ?>" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Eliminar">
                                        <i class="bi bi-backspace-reverse"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="9" class="text-center">No hay profesores registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="col-sm-1"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>