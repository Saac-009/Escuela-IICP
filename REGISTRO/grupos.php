<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Grupos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-success text-white text-center py-3">
                        <h4 class="mb-0 fw-bold">Registro de Grupos</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="../PROCESO/procesar_grupos.php" method="POST">
                            <div class="mb-4">
                                <label for="descripcion" class="form-label font-monospace">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingresa la Descripción" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100 fw-bold">Guardar Grupo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>