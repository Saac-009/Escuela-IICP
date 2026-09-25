<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Registro de Alumnos</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="../PROCESO/procesar_alumnos.php" method="POST">
                            <div class="mb-3">
                                <label for="matricula" class="form-label font-monospace">Matrícula</label>
                                <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Ingresa tu matrícula" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label font-monospace">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="apaterno" class="form-label font-monospace">A. Paterno</label>
                                    <input type="text" class="form-control" id="apaterno" name="apaterno" placeholder="Ingresa tu Apaterno" required>
                                </div>
                                <div class="col">
                                    <label for="amaterno" class="form-label font-monospace">A. Materno</label>
                                    <input type="text" class="form-control" id="amaterno" name="amaterno" placeholder="Ingresa tu Amaterno">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="domicilio" class="form-label font-monospace">Domicilio</label>
                                <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="Ingresa tu Domicilio">
                            </div>
                            <div class="mb-3">
                                <label for="mail" class="form-label font-monospace">Email Address</label>
                                <input type="email" class="form-control" id="mail" name="mail" placeholder="Ingresa tu Email" required>
                            </div>
                            <div class="mb-4">
                                <label for="tel" class="form-label font-monospace">Teléfono</label>
                                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Ingresa tu Teléfono">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold">Guardar Alumno</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>