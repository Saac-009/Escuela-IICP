<?php
$prefix = file_exists('conexion.php') ? '' : '../';
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary bg-gradient shadow-sm mb-4" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%) !important;">
  <div class="container">
    <a class="navbar-brand fw-bold text-uppercase tracking-wider" href="<?php echo $prefix; ?>navegacion.php">
      🎓 Escuela IICP
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        <!-- Menú Registros -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdownRegistro" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ✏️ Registros
          </a>
          <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownRegistro">
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REGISTRO/alumnos.php">Registrar Alumno</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REGISTRO/profesores.php">Registrar Profesor</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REGISTRO/materias.php">Registrar Materia</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REGISTRO/grupos.php">Registrar Grupo</a></li>
          </ul>
        </li>

        <!-- Menú CRUDs -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdownCRUD" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            📋 Catálogos
          </a>
          <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownCRUD">
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>CRUDE/crudealumnos.php">Gestión de Alumnos</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>CRUDE/crudeprofesores.php">Gestión de Profesores</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>CRUDE/crudematerias.php">Gestión de Materias</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>CRUDE/crudegrupos.php">Gestión de Grupos</a></li>
          </ul>
        </li>

        <!-- Menú Reportes -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdownReportes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            📊 Reportes
          </a>
          <ul class="dropdown-menu shadow" aria-labelledby="navbarDropdownReportes">
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REPORTES/alumnos.php">Reporte Alumnos</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REPORTES/profesores.php">Reporte Profesores</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REPORTES/materias.php">Reporte Materias</a></li>
            <li><a class="dropdown-item" href="<?php echo $prefix; ?>REPORTES/grupos.php">Reporte Grupos</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>