<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Listado":
		$materia = consulta("SELECT id, nombre, descripcion, anio, clave FROM materia");
		?>
		<div class="table-responsive">
		  <table class="table table-hover table-condensed text-center data-table">
		    <thead>
		      <tr>
		        <th class="text-center">Id</th>
		        <th class="text-center">Nombre</th>
		        <th class="text-center">Descripción</th>
		        <th class="text-center">Año</th>
		        <th class="text-center">Clave</th>
		        <th class="text-center no-ordenar">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php while ($regg = traer_registro($materia)){
		        $id = $regg['id'];
		        $nombre =$regg['nombre'];
		        $descripcion =$regg['descripcion'];
		        $clave =$regg['clave'];
                    if ($regg['anio']==1) {$anio="Primero";}
                elseif ($regg['anio']==2) {$anio="Segundo";}
                elseif ($regg['anio']==3) {$anio="Tercero";}
		        ?>
		        <tr>
		          <td><?php echo $id;?></td>
		          <td id="nombre_materia<?php echo $id;?>"><?php echo $nombre;?></a></td>
		          <td id="descripcion_materia<?php echo $id;?>"><?php echo $descripcion;?></a></td>
		          <td id="anio_materia<?php echo $id;?>"><?php echo $anio;?></a></td>
		          <td id="clave_materia<?php echo $id;?>"><?php echo $clave;?></a></td>
		          <td>
		          <span>
		          <!--Botón Editar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Editar materia" onclick="editar_materia('<?php echo $id;?>');" data-toggle="modal" data-target="#editarMateria"><i class="glyphicon glyphicon-edit"></i></a>
		          <!--Botón Borrar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Borrar materia" onclick="eliminar_materia('<?php echo $id;?>')"><i class="glyphicon glyphicon-trash"></i></a>
		          </span>
		          </td>
		        </tr>
		      <?php } ?>
		    </tbody>
		  </table>
		</div>
		<?php
	break;


	case "Alta":
		$id = ultimo_id('id', 'materia') + 1;
		$nombre = $_REQUEST['nombre'];
		$descripcion = $_REQUEST['descripcion'];
		$anio = $_REQUEST['anio'];
		$clave = $_REQUEST['clave'];
		$consulta = "INSERT INTO materia (id, nombre, descripcion, anio, clave) VALUES ($id, '$nombre', '$descripcion', $anio, '$clave')";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;


	case "Modificar":
		$id = $_REQUEST['mod_id'];
		$nombre = $_REQUEST['mod_nombre'];
		$descripcion = $_REQUEST['mod_descripcion'];
		$anio = $_REQUEST['mod_anio'];
		$clave = $_REQUEST['mod_clave'];
		$consulta = "UPDATE materia SET nombre = '$nombre', descripcion = '$descripcion', anio = $anio, clave = '$clave' WHERE id = '$id'";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;


	case "Baja":
		$id = $_REQUEST['id'];
		$consulta = "DELETE FROM materia WHERE id = $id";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;
}

desconectar();
?>