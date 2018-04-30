<?php
include("funciones.php");
conectar();
?>
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
  <?php //include("modal/buscar_insumos.php"); ?>

  <div class="container">
    <div class="panel panel-info">
      <div class="panel-heading">
        <div class="pull-right">
          <form class="form-inline" role="form" id="fecha">
            <div class="form-group">
              <label for="profesor">Profesores </label>
              <select class="form-control select2" name="profesor" id="profesor">
              <?php
                $prof = (isset($_REQUEST['prof']) && !empty($_REQUEST['prof']))?$_REQUEST['prof']:0;
                $profesores = consulta("SELECT id, apellido, nombre FROM persona WHERE tipo = 'P'");
                ?><option value="0">0 - Mostrar Todo</option><?php
                while ($row=traer_registro($profesores)){
                  $id=$row['id'];
                  $nombre=$row['apellido'].", ".$row['nombre'];
                  if ($id == $prof) {
                    ?><option value="<?php echo $id;?>" selected><?php echo $id." - ".$nombre;?></option><?php
                  } else {
                    ?><option value="<?php echo $id;?>"><?php echo $id." - ".$nombre;?></option><?php
                  }
                }
              ?>
              </select>
            </div>
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Agregar Materias</a>
<!--             <a href="abm_productos.php" class="btn btn-info"><span class="glyphicon glyphicon-barcode"></span> Productos</a> -->
          </form>
        </div>
        <h4>Materias por profesor</h4>
      </div>
      <div class="panel-body">
        <div id="resultados" class="col-md-12" style="margin-top:5px">
          <!--Aqui carga con ajax el listado de productos agregados a la factura-->
        </div>
      </div>
    </div>
  </div>

  <script src="funciones.js"></script>
  <script src="relacion_profesor_materia_2.js"></script>
</body>
</html>
<?php
desconectar();
?>