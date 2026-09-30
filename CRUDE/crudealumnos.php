<?php
require_once "../conexion.php";

$sql = "SELECT idalumn, matricula_al, nombre_al, apaterno_al, amaterno_al, dom_al, mail_al 
        FROM alumnos 
        WHERE estatus_al = 'ALTA' OR estatus_al IS NULL";
$resultado = $mysqli->query($sql);
$alumnos = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-4">
    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <h1 class="text-center my-4">Catálogo de Alumnos</h1>

            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Domicilio</th>
                        <th scope="col">Email</th>
                        <th scope="col" colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($alumnos)): ?>
                        <?php foreach ($alumnos as $alumno): ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($alumno['idalumn']); ?></th>
                                <td><?php echo htmlspecialchars($alumno['matricula_al']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['nombre_al']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['apaterno_al']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['amaterno_al']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['dom_al']); ?></td>
                                <td><?php echo htmlspecialchars($alumno['mail_al']); ?></td>

                                <td class="text-center">
                                    <a href="../REGISTRO/alumnos.php" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Agregar">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../MODIFICACIONES/modif_alum.php?idalumn=<?php echo $alumno['idalumn']; ?>" class="btn btn-primary btn-sm d-inline-block" style="cursor: pointer;" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../BAJA/baja_alum.php?idalumn=<?php echo $alumno['idalumn']; ?>" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Eliminar">
                                        <i class="bi bi-backspace-reverse"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">No hay alumnos registrados.</td>
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