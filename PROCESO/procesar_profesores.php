<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../conexion.php'; 

if (!isset($conexion) && isset($mysqli)) {
    $conexion = $mysqli;
}

$nocontrol_prof = trim($_POST['nocontrol_prof'] ?? $_POST['cve_prof'] ?? '');
$nombre_prof    = trim($_POST['nombre_prof'] ?? $_POST['nom_prof'] ?? '');
$apaterno_prof  = trim($_POST['apaterno_prof'] ?? $_POST['appat_prof'] ?? '');
$amaterno_prof  = trim($_POST['amaterno_prof'] ?? $_POST['apmat_prof'] ?? '');
$dom_prof       = trim($_POST['dom_prof'] ?? '');
$mail_prof      = trim($_POST['mail_prof'] ?? '');
$tel_prof       = trim($_POST['tel_prof'] ?? '');

$mensaje = "";
$exito = false;

if ($conexion && !empty($nombre_prof)) {
    $nocontrol_e = mysqli_real_escape_string($conexion, $nocontrol_prof);
    $nombre_e    = mysqli_real_escape_string($conexion, $nombre_prof);
    $apat_e      = mysqli_real_escape_string($conexion, $apaterno_prof);
    $amat_e      = mysqli_real_escape_string($conexion, $amaterno_prof);
    $dom_e       = mysqli_real_escape_string($conexion, $dom_prof);
    $mail_e      = mysqli_real_escape_string($conexion, $mail_prof);
    $tel_e       = mysqli_real_escape_string($conexion, $tel_prof);

    $sql = "INSERT INTO profesores (nocontrol_prof, nombre_prof, apaterno_prof, amaterno_prof, dom_prof, mail_prof, tel_prof, estatus_prof) 
            VALUES ('$nocontrol_e', '$nombre_e', '$apat_e', '$amat_e', '$dom_e', '$mail_e', '$tel_e', 'ALTA')";

    if (mysqli_query($conexion, $sql)) {
        $exito = true;
        $mensaje = "¡Profesor registrado con éxito!";
    } else {
        $mensaje = "Error al insertar profesor: " . mysqli_error($conexion);
    }
} else {
    $mensaje = "Por favor ingrese al menos el nombre del profesor.";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Registro - Escuela IICP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-header { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); color: white; }
    </style>
</head>
<body class="bg-light">

<?php if (file_exists('../navegacion.php')) include '../navegacion.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <div class="card-header custom-header p-4 text-center">
                    <h4 class="mb-0 fw-bold">Resultado del Proceso</h4>
                </div>
                <div class="card-body p-4 text-center">
                    <?php if ($exito): ?>
                        <div class="alert alert-success border-0 shadow-sm p-4 mb-4" role="alert">
                            <h5 class="fw-bold mb-3"><?php echo $mensaje; ?></h5>
                            <hr>
                            <div class="text-start">
                                <p class="mb-1"><strong>No. Control:</strong> <?php echo htmlspecialchars($nocontrol_prof ?: 'N/A'); ?></p>
                                <p class="mb-1"><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre_prof . ' ' . $apaterno_prof . ' ' . $amaterno_prof); ?></p>
                                <p class="mb-1"><strong>Domicilio:</strong> <?php echo htmlspecialchars($dom_prof ?: 'N/A'); ?></p>
                                <p class="mb-1"><strong>Correo:</strong> <?php echo htmlspecialchars($mail_prof ?: 'N/A'); ?></p>
                                <p class="mb-0"><strong>Teléfono:</strong> <?php echo htmlspecialchars($tel_prof ?: 'N/A'); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="alert alert-danger border-0 shadow-sm p-4 mb-4" role="alert">
                            <h5 class="fw-bold mb-0"><?php echo $mensaje; ?></h5>
                        </div>
                    <?php endif; ?>

                    <div class="d-flex justify-content-center gap-2">
                        <a href="../REGISTRO/profesores.php" class="btn btn-outline-secondary px-4">Registrar Otro</a>
                        <a href="../CRUDE/crudeprofesores.php" class="btn btn-primary fw-bold px-4" style="background: #1e3c72; border: none;">Ver Profesores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>