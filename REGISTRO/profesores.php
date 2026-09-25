<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Profesores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-dark text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Registro de Profesores</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="../PROCESO/procesar_profesores.php" method="POST">
                            <div class="mb-3">
                                <label for="nombre_prof" class="form-label font-monospace">Nombre Profesor</label>
                                <input type="text" class="form-control" id="nombre_prof" name="nombre_prof" placeholder="Ingresa el nombre" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="apaterno_prof" class="form-label font-monospace">A. Paterno</label>
                                    <input type="text" class="form-control" id="apaterno_prof" name="apaterno_prof" placeholder="Ingresa Apaterno" required>
                                </div>
                                <div class="col">
                                    <label for="amaterno_prof" class="form-label font-monospace">A. Materno</label>
                                    <input type="text" class="form-control" id="amaterno_prof" name="amaterno_prof" placeholder="Ingresa Amaterno">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="mail_prof" class="form-label font-monospace">Email</label>
                                <input type="email" class="form-control" id="mail_prof" name="mail_prof" placeholder="Ingresa el Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="domicilio_prof" class="form-label font-monospace">Domicilio</label>
                                <input type="text" class="form-control" id="domicilio_prof" name="domicilio_prof" placeholder="Ingresa el Domicilio">
                            </div>
                            <div class="mb-4">
                                <label for="tel_prof" class="form-label font-monospace">Teléfono</label>
                                <input type="tel" class="form-control" id="tel_prof" name="tel_prof" placeholder="Ingresa el teléfono">
                            </div>
                            <button type="submit" class="btn btn-dark w-100 fw-bold">Guardar Profesor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>