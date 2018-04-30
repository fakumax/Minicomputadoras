<?php include("seccion/seccion_verificar_login.php");?>
<?php  $activo="materias";?>
<!DOCTYPE html>
<html lang="es">
<head>
  <?php include("seccion/seccion_head.php");?>
</head>
<body>
  <?php include("seccion/seccion_header.php");?>
  <br>
  <?php include("modal/agregar_materia.php");?>
  <?php include("modal/editar_materia.php");?>

  <div class="container">
    <div class="panel panel-info">
      <div class="panel-heading">
      <div class="pull-right">
        <button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevaMateria" onclick="limpiarAltaMateria();"><span class="glyphicon glyphicon-plus" ></span> Nueva Materia</button>
      </div>
      <h4>ABM Materias</h4>
      </div>
      <div class="panel-body">
        <div id="resultado">
          <!--Aqui carga con ajax el listado de personas-->
        </div>
      </div>
    </div>
  </div>

  <script src="funciones.js"></script>
  <script src="abm_materias_2.js"></script>
</body>
</html>
