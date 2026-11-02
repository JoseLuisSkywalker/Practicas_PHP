<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>


    <title>Agregar registro</title>
   
</head>
<body>

  <?php require_once('menu_principal.php'); ?>

  <div class="container"
    style="display: <?php echo (isset($_SESSION['insercion_correcta']) && $_SESSION['insercion_correcta'] === true) ? 'block' : 'none' ?>;"
  >

    <div class="alert alert-success" role="alert">
      Alumno AGREGADO con EXITO!!!
      <button type="button" class="btn-close" data-bs-dismiss="alert"
      aria-label="Close"></button> 
    </div>
  </div>

  <?php if (isset($_SESSION['insercion_correcta']) && $_SESSION['insercion_correcta'] === false): ?>
  <div class="container">
    <div class="alert alert-danger" role="alert">
      No se pudo agregar el alumno.
      <?php echo isset($_SESSION['error_bd']) ? '<br><small>' . htmlspecialchars($_SESSION['error_bd']) . '</small>' : '' ?>
    </div>
  </div>
  <?php endif; ?>


    <div class="container">
        <form action="../backend/scripts/procesar_altas.php" method="POST">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="caja_num_control">Numero de control:</label>
      <input type="text" class="form-control" name = "caja_num_control" id="caja_num_control" placeholder="Numero de Control"
      
        value="<?php echo isset($_SESSION['nc']) ? htmlspecialchars($_SESSION['nc']) : '' ?>" />
    </div>

    <div style="color: <?php echo isset ($_SESSION['nc']) ? 'red' : 'black' ?>">
      <?php echo isset($_SESSION['nc'])? '*Debes ingresar solo numeros':'' ?>
    </div> 
  </div>
  <div class="form-group">
    <label for="caja_nombre">Nombre:</label>
    <input type="text" class="form-control" name="caja_nombre" id="caja_nombre" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="caja_primer_ap">Primer Apellido</label>
    <input type="text" class="form-control" name="caja_primer_ap" id="caja_primer_ap" placeholder="Primer Apellido">
  </div>
  <div class="form-group">
    <label for="caja_segundo_ap">Segundo Apellido</label>
    <input type="text" class="form-control" name="caja_segundo_ap" id="caja_segundo_ap" placeholder="Segundo Apellido">
  </div>
  
  <div class="form-group">
    <label for="caja_fecha_nac">Fecha naciento</label>
    <input type="date" class="form-control" name="caja_fecha_nac" id="caja_fecha_nac">
  </div>
  
  <div class="form-group">
    <label for="caja_semestre">Semestre</label>
    <input type="text" class="form-control" name="caja_semestre" id="caja_semestre" placeholder="7">
  </div>

  <div class="form-group">
    <label for="caja_carrera">Carrera</label>
    <input type="text" class="form-control" name="caja_carrera" id="caja_carrera" placeholder="ISC">
  </div>

  <button type="submit" class="btn btn-primary">AGREGAR</button>
</form>
    </div>
    
</body>
</html>


<?php

  unset($_SESSION['insercion_correcta']);
  unset($_SESSION['nc']);
  unset($_SESSION['error_nc']);
  unset($_SESSION['error_bd']);

?>