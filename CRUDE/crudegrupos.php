<?php
require_once "../conexion.php";

$sql = "SELECT idgrupo, descripcion_grupo FROM grupo WHERE estatus_grupo = 'ALTA' OR estatus_grupo IS NULL";
$resultado = $mysqli->query($sql);
$grupos = $resultado ? $resultado->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Grupos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php include_once "../navegacion.php"; ?>

<div class="container my-4">
    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <h1 class="text-center my-4">Catálogo de Grupos</h1>

            <table class="table align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descripción / Grupo</th>
                        <th scope="col" colspan="3" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($grupos)): ?>
                        <?php foreach ($grupos as $grup): ?>
                            <tr>
                                <th scope="row"><?php echo htmlspecialchars($grup['idgrupo']); ?></th>
                                <td><?php echo htmlspecialchars($grup['descripcion_grupo']); ?></td>

                                <td class="text-center">
                                    <a href="../REGISTRO/grupos.php" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Agregar">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../MODIFICACIONES/modif_grupo.php?idgrupo=<?php echo $grup['idgrupo']; ?>" class="btn btn-primary btn-sm d-inline-block" style="cursor: pointer;" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="../baja/baja_grupo.php?idgrupo=<?php echo $grup['idgrupo']; ?>" class="btn btn-dark btn-sm d-inline-block" style="cursor: pointer;" title="Eliminar">
                                        <i class="bi bi-backspace-reverse"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay grupos registrados.</td>
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