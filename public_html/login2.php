<?php
include("funciones.php");
conectar();

switch($_REQUEST['accion']) { 
	case "Ingresar":
		session_start();
		$persona = consulta("SELECT * FROM persona WHERE dni='$_REQUEST[usuario]' OR email='$_REQUEST[usuario]'");
		if ($reg = traer_registro($persona) and password_verify($_REQUEST['clave'], $reg['clave'])){
			// Crea las variables de sesion
		    $_SESSION['id'] = session_id();
			$_SESSION['usuario'] = $_REQUEST['usuario'];
			// Carga el perfil de acuerdo al tipo
			if ($reg['tipo']=='A') $_SESSION['perfil'] = 'Administrador';
			if ($reg['tipo']=='P') $_SESSION['perfil'] = 'Profesor';
			if ($reg['tipo']=='S') $_SESSION['perfil'] = 'Alumno';
			$_SESSION['conectado'] = true;
			$_SESSION['comienzo'] = time();
			$_SESSION['expirar'] = $_SESSION['comienzo'] + (5 * 60);
			// Agrega 5 hs al Administrador 
			if ($_SESSION['perfil']=='Administrador') $_SESSION['expirar'] += (5 * 3600);
			// Accede al menu principal
			header("Location: principal.php");
		}
		else
			//Mensaje error
			header("Location: login.php?msg=error");
	break;


	case "Registrar":
		$existePersona = traer_registro(consulta("SELECT * FROM persona WHERE dni='$_REQUEST[dni]' OR email='$_REQUEST[email]'"));
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

			if (consulta($insertarRegistro) === TRUE) header("Location: index.php?msg=exito");
		}
		else header("Location: login.php?msg=error");
	break;


	case "Registrar2":
		$hash = password_hash($_REQUEST['reg_clave'], PASSWORD_BCRYPT);
		$res1 = consulta("SELECT * FROM tbusuario WHERE pk_usuario='$_REQUEST[reg_usuario]' OR fk_persona='$_REQUEST[reg_id]'");
		$res2 = consulta("SELECT * FROM tbpersona WHERE pk_persona='$_REQUEST[reg_id]'");
		$noExisteUsuarioNiPersonaAsignada = ($reg1 = traer_registro($res1) == false) ? true : false;
		$existePersona = ($reg2 = traer_registro($res2) == true) ? true : false;
		if ($noExisteUsuarioNiPersonaAsignada and $existePersona)
		{
			$insertarRegistro = "INSERT INTO tbusuario (pk_usuario, clave, tipo_usuario, fk_persona) VALUES ('$_REQUEST[reg_usuario]', '$hash', 'No Definido', '$_REQUEST[reg_id]')";

			if (consulta($insertarRegistro) === TRUE) header("Location: index.php?msg=1");
			else header("Location: login.php?msg=3");
		}
		else  header("Location: login.php?msg=4");
	break;


	case "Desloguear":
		session_start();
		session_destroy();
		header("Location: login.php");
	break;
}

desconectar();
?>