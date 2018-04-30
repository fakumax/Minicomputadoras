<?php include("seccion/seccion_verificar_login.php");?>
<?php  $activo="profesor";?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("seccion/seccion_head.php");?>
</head>
<body>
  <?php include("seccion/seccion_header.php");?>
  <br>
  <?php include("modal/agregar_profesor.php");?>
  <?php include("modal/editar_profesor.php");?>

  <div class="container">
    <div class="panel panel-info">
      <div class="panel-heading">
      <div class="pull-right">
        <button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoProfesor" onclick="limpiarAltaProfesor();"><span class="glyphicon glyphicon-plus" ></span> Nuevo Profesor</button>
        <a href="relacion_profesor_materia.php" class="btn btn-info"><span class="glyphicon glyphicon-th-list"></span> Relacion Prof-Materia</a>
      </div>
      <h4>ABM Profesores</h4>
      </div>
      <div class="panel-body">
        <div id="resultado">
          <!--Aqui carga con ajax el listado de personas-->
        </div>
      </div>
    </div>
  </div>

  <script src="funciones.js"></script>
  <script src="abm_profesores_2.js"></script>
</body>
</html>
