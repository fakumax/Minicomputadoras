<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Listado":
		$profesor = consulta("SELECT id, dni, apellido, nombre, telefono, email, DATE(fecha_ing) as fecha_ing, clave, tipo FROM persona WHERE tipo = 'P'");
		?>
		<div class="table-responsive">
		  <table class="table table-hover table-condensed text-center data-table">
		    <thead>
		      <tr>
		        <th class="text-center">Id</th>
		        <th class="text-center">DNI</th>
		        <th class="text-center">Apellido y Nombre</th>
		        <th class="text-center">Telefono</th>
		        <th class="text-center">Email</th>
		        <th class="text-center">Fecha Ingreso</th>
		        <th class="text-center no-ordenar">Acciones</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php while ($regg = traer_registro($profesor)){
		        $id = $regg['id'];
		        $dni =$regg['dni'];
		        $apellido =$regg['apellido'];
		        $nombre =$regg['nombre'];
		        $nombre_completo =$regg['apellido'].", ".$regg['nombre'];
		        $telefono =$regg['telefono'];
		        $email =$regg['email'];
		        $fecha_ing =$regg['fecha_ing'];
                    if ($regg['tipo']=='A') {$tipo="Administrador";}
                elseif ($regg['tipo']=='P') {$tipo="Profesor";}
                elseif ($regg['tipo']=='S') {$tipo="Alumno";}
		        ?>
		        <tr>
		          <td id="id<?php echo $id;?>" data-apellido="<?php echo $apellido;?>" data-nombre="<?php echo $nombre;?>"><?php echo $id;?></td>
		          <td id="dni_profesor<?php echo $id;?>"><?php echo $dni;?></a></td>
		          <td id="nombre_profesor<?php echo $id;?>"><a href="relacion_profesor_materia.php?prof=<?php echo $id;?>"><?php echo $nombre_completo;?></a></td>
		          <td id="telefono_profesor<?php echo $id;?>"><?php echo $telefono;?></a></td>
		          <td id="email_profesor<?php echo $id;?>"><?php echo $email;?></a></td>
		          <td id="fecha_ing_profesor<?php echo $id;?>"><?php echo $fecha_ing;?></a></td>
		          <td>
		          <span>
		          <!--Botón Editar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Editar profesor" onclick="editar_profesor('<?php echo $id;?>');" data-toggle="modal" data-target="#editarProfesor"><i class="glyphicon glyphicon-edit"></i></a>
		          <!--Botón Borrar persona-->
		          <a href="#" class="btn btn-default btn-sm" title="Borrar profesor" onclick="eliminar_profesor('<?php echo $id;?>')"><i class="glyphicon glyphicon-trash"></i></a>
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
		// Toma la fecha y hora de Argentina
		@$fecha = date("Y-m-d H:i:s",time()); // Debes colocar @ antes de la variable para "Ocultar" el error.
		$date = new DateTime($fecha, new DateTimeZone('America/Argentina/Buenos_Aires'));
		date_default_timezone_set('America/Argentina/Buenos_Aires');
		$zonahoraria = date_default_timezone_get();
		@$fecha=date("Y-m-d H:i:s",time()); //$fecha_hora = date("Y-m-d H:i:s");
		//Prepara los datos
		$id = ultimo_id('id', 'persona') + 1;
		$dni = $_REQUEST['dni'];
		$apellido = $_REQUEST['apellido'];
		$nombre = $_REQUEST['nombre'];
		$telefono = $_REQUEST['telefono'];
		$email = $_REQUEST['email'];
		$fecha_ing = $fecha;
		$clave_hash = password_hash($_REQUEST['dni'], PASSWORD_BCRYPT);
		$tipo = 'P';
		$consulta = "INSERT INTO persona (dni, apellido, nombre, telefono, email, fecha_ing, clave, tipo) VALUES ($dni, '$apellido', '$nombre', '$telefono', '$email', '$fecha_ing', '$clave_hash', '$tipo')";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;


	case "Modificar":
		$id = $_REQUEST['mod_id'];
		$dni = $_REQUEST['mod_dni'];
		$apellido = $_REQUEST['mod_apellido'];
		$nombre = $_REQUEST['mod_nombre'];
		$telefono = $_REQUEST['mod_telefono'];
		$email = $_REQUEST['mod_email'];
		$consulta = "UPDATE persona SET dni = $dni, apellido = '$apellido', nombre = '$nombre', telefono = '$telefono', email = '$email' WHERE id = '$id'";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;


	case "Baja":
		$id = $_REQUEST['id'];
		$consulta = "DELETE FROM persona WHERE id = $id";
		if (consulta($consulta) === TRUE) echo "ok";
		else echo "error";
	break;
}

desconectar();
?>