<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Ingresar":
		session_start();
		$persona = consulta("SELECT * FROM persona WHERE dni='$_REQUEST[usuario]' OR email='$_REQUEST[usuario]'");
		if ($reg = traer_registro($persona) and password_verify($_REQUEST['clave'], $reg['clave'])){
			// Si tiene el dni como clave provisoria le obliga a cambiar
			if (password_verify($reg['dni'], $reg['clave']) and $reg['dni']<>'33333333'){
				echo "cambiar_clave";
			}
			else{
				// Crea las variables de sesion
			    $_SESSION['id'] = session_id();
				$_SESSION['usuario'] = $_REQUEST['usuario'];
				$_SESSION['nombre_completo'] = $reg['nombre']." ".$reg['apellido'];
				$_SESSION['conectado'] = true;
				$_SESSION['comienzo'] = time();
				$_SESSION['expirar'] = $_SESSION['comienzo'] + (5 * 60);
				// Carga el perfil de acuerdo al tipo
				if ($reg['tipo']=='A') $_SESSION['perfil'] = 'Administrador';
				if ($reg['tipo']=='P') $_SESSION['perfil'] = 'Profesor';
				if ($reg['tipo']=='S') $_SESSION['perfil'] = 'Alumno';
				// Si es administrador, muestra el perfil como nombre y agrega 5hs a la sesion
				if ($_SESSION['perfil']=='Administrador'){
					$_SESSION['nombre_completo'] = $_SESSION['perfil'];
					$_SESSION['expirar'] += (5 * 3600);
				}
				echo "ok";
			}
		}
		else echo "error";
	break;


	case "Registrar":
		$existePersona = traer_registro(consulta("SELECT * FROM persona WHERE dni='$_REQUEST[dni]'"));
		if ( !$existePersona )
		{
			// Toma la fecha y hora de Argentina
			@$fecha = date("Y-m-d H:i:s",time()); // Debes colocar @ antes de la variable para "Ocultar" el error.
			$date = new DateTime($fecha, new DateTimeZone('America/Argentina/Buenos_Aires'));
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$zonahoraria = date_default_timezone_get();
			@$fecha=date("Y-m-d H:i:s",time()); //$fecha_hora = date("Y-m-d H:i:s");

			$dni = $_REQUEST['dni']; 
			$apellido = $_REQUEST['apellido']; 
			$nombre = $_REQUEST['nombre']; 
			$telefono = $_REQUEST['telefono']; 
			$email = $_REQUEST['email'];
			$fecha_ing = $fecha;
			$clave_hash = password_hash($_REQUEST['dni'], PASSWORD_BCRYPT);
			$tipo = 'S';

			$insertarRegistro = "INSERT INTO persona (dni, apellido, nombre, telefono, email, fecha_ing, clave, tipo) VALUES ($dni, '$apellido', '$nombre', '$telefono', '$email', '$fecha_ing', '$clave_hash', '$tipo')";
			if (consulta($insertarRegistro) === TRUE) echo "ok";
		}
		else echo "error";
	break;


	case "Desloguear":
		session_start();
		session_destroy();
		header("Location: login.php");
	break;


	case "Cambiar_Clave":
		$dni=$_REQUEST['cambiar_id'];
		$clave=$_REQUEST['cambiar_clave'];
		$clave_hash = password_hash($clave, PASSWORD_BCRYPT);
		$cambiarClave = "UPDATE persona SET clave = '$clave_hash' WHERE dni = '$dni'";
		if (consulta($cambiarClave) === TRUE) echo "ok";
		else echo "error";
	break;
}

desconectar();
?>