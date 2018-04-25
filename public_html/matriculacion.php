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

  <div class="container">
    <div class="panel panel-info">
      <div class="panel-heading">
      <h3 class="panel-title"><i class="glyphicon glyphicon-cog"></i> Mis Cursos</h3>
      <div class="pull-right">
      <!--<button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevaPersona" onclick="//listadosAltaPersona();"><span class="glyphicon glyphicon-plus" ></span> Agregar Materia</button>-->
      </div>
      <!-- <h4>Mis Cursos</h4> -->
      </div>
      <div class="panel-body">
        <br><br><br><br><br>
        <br><br><br><br><br>

        <form class="form-horizontal" id="frm_subir_archivos" name="frm_subir_archivos" action="uploader.php" method="post" enctype="multipart/form-data">
          <!-- div_subir_archivos -->
          <div class="form-group" id="div_subir_archivos">
          <div class="col-md-4">
          <input  name="archivo cargado" type="file" class="filestyle" data-buttonText="Buscar archivos">
          </div>
          <div class="col-md-2">
          <input class="btn btn-primary" type="button" name="enviar" id="enviar" value="Subir archivos">
          </div>
          <div class="col-md-6"></div>
          </div>
        </form> 
        
        <div id="resultado">
          <!--Aqui carga con ajax el listado de personas-->
        </div>
        <br><br><br><br><br>
        <br><br><br><br><br>
      </div>
      <div class="panel-footer text-center">
        <button type="button" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-refresh"></i> Actualizar datos</button>
      </div>
    </div>
  </div>

  <script src="funciones.js"></script>
</body>
</html>