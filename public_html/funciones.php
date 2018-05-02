<?php 
# conectar() return $cn;
# consulta($consulta) return $resultado;
# numero_de_filas($resultado) return $cantidad;
# traer_registro($resultado) return $registro;
# liberar_resultados($resultado)
# desconectar()
# ultimo_id($id, $tabla) return $ultimo_id;
# traer_fila($tabla, $id, $igual, $campo = "") return $fila[$campo];

// cn_local.php o cn_web.php
require("cn/cn_local.php");

//Esto se usa para el envío de un email
ini_set('display_errors',1);
require("externo/PHPMailer/class.phpmailer.php");
require("externo/PHPMailer/class.smtp.php");
//https://www.google.com/settings/security/lesssecureapps
//https://www.google.com/accounts/DisplayUnlockCaptcha

function conectar()//return $cn;
{
	global $tipo_cn, $cn, $server, $user, $pass, $db;
	if ($tipo_cn=="mysqli") 
		$cn = mysqli_connect($server, $user, $pass, $db) or die("Problemas con la conexión");
	else 
	{
		$cn = mysql_connect($server, $user, $pass) or die("Problemas con la conexión");
		mysql_select_db($db,$cn) or die("Problemas con la seleccion de la base de datos");
	}
	return $cn;
}

function consulta($consulta)//return $resultado;
{ 
	global $tipo_cn, $cn;
	if ($tipo_cn=="mysqli")
		$resultado = mysqli_query($cn,$consulta) or die("Problemas en la consulta: ".$consulta.mysqli_error($cn));
	else
		$resultado = mysql_query($consulta,$cn) or die("Problemas en la consulta: ".$consulta.mysql_error($cn));
	return $resultado;
}

function desconectar()
{
	global $tipo_cn, $cn;
	if ($tipo_cn=="mysqli") mysqli_close($cn);
	else mysql_close($cn);
}

function numero_de_filas($resultado)//return $cantidad;
{ 
	global $tipo_cn;
	if ($tipo_cn=="mysqli") 
		return mysqli_num_rows($resultado);
	else 
		return mysql_num_rows($resultado);
}

function traer_registro($resultado)//return $registro;
{ 
	global $tipo_cn;
	if ($tipo_cn=="mysqli") {
		$registro = mysqli_fetch_array($resultado);
	}else {
		$registro = mysql_fetch_array($resultado);
	}
	return $registro;
}

function liberar_resultados($resultado)
{
	global $tipo_cn;
	if ($tipo_cn=="mysqli")
		mysqli_free_result($resultado);
	else 
		mysql_free_result($resultado);
}

function ultimo_id($id, $tabla)//return $ultimo_id;
{ 
	$resultado = consulta("SELECT $id FROM $tabla ORDER BY $id DESC LIMIT 0, 1");
	$registro = mysqli_fetch_array($resultado);
	return $registro[$id];
}

function traer_fila($tabla, $id, $igual, $campo = "")//return $fila[$campo];
{ 
	$resultado = consulta("SELECT * FROM $tabla WHERE $id='$igual'");
	$fila = traer_registro($resultado);
	//Si no se especifica el campo, devuelve una fila con todos los campos
	if ($campo == "") return $fila;
	//De lo contrario, devuelve solo un campo
	else return $fila[$campo];
}

function paginacion($pagina, $tpaginas, $adyacentes=4) {
	//$adyacentes es la brecha entre páginas tras número de adyacentes
	$prevlabel = "Anterior"; 
	$nextlabel = "Siguiente";
	$out = '<nav aria-label="Page navigation" class="pull-right"><ul class="pagination">';
	
	// previous label
	if($pagina==1) $out.= "<li class='disabled'><a>$prevlabel</a></li>";
	else $out.= "<li><a href='javascript:void(0);' onclick='load(".($pagina-1).")'>$prevlabel</a></li>";
	// first label
	if($pagina>($adyacentes+1)) $out.= "<li><a href='javascript:void(0);' onclick='load(1)'>1</a></li>";
	// interval
	if($pagina>($adyacentes+2)) $out.= "<li><a>...</a></li>";

	// paginas
	$pmin = ($pagina>$adyacentes) ? ($pagina-$adyacentes) : 1;
	$pmax = ($pagina<($tpaginas-$adyacentes)) ? ($pagina+$adyacentes) : $tpaginas;
	for($i=$pmin; $i<=$pmax; $i++){
		if($i==$pagina) $out.= "<li class='active'><a>$i</a></li>";
		else $out.= "<li><a href='javascript:void(0);' onclick='load(".$i.")'>$i</a></li>";
	}

	// interval
	if($pagina<($tpaginas-$adyacentes-1)) $out.= "<li><a>...</a></li>";
	// last
	if($pagina<($tpaginas-$adyacentes)) $out.= "<li><a href='javascript:void(0);' onclick='load($tpaginas)'>$tpaginas</a></li>";
	// next
	if($pagina<$tpaginas) $out.= "<li><a href='javascript:void(0);' onclick='load(".($pagina+1).")'>$nextlabel</a></li>";
	else $out.= "<li class='disabled'><a>$nextlabel</a></li>";
	
	$out.= "</ul></nav>";
	return $out;
}
function generar_facturas($inicio, $cantidad=1) {
  // si se desea obtener 10 numeros de facturas, agregar la cantidad como argumento: generar_facturas(11, 10) RESULTADO $n_factura[0]==0001-000000011 AL 0001-00000020
 $digitos = 8;
 $resultado = array();
 for ($n = $inicio; $n < $inicio + $cantidad; $n++) {
    $resultado[] = "0001-".str_pad($n, $digitos, "0", STR_PAD_LEFT);
 }
 return $resultado;
}

function enviarGmail($email,$asunto,$mensaje)
{
	$mail = new PHPMailer() ;
	$mail->IsSMTP(); 

	//Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP
	$mail->Host       = "smtp.gmail.com";	
	$mail->Port       = 587;
	$mail->SMTPSecure = 'tls'; 
	$mail->SMTPAuth   = true;
	$mail->SMTPDebug  = 1; // debugging: 1 = errors and messages, 2 = messages only

	$mail->From     = "sologuillesosa@gmail.com";
	$mail->FromName = "Yosuko Pizzas";
	$mail->AltBody  = "Leer"; 
	$mail->Priority = 1;
	//$mail->AddAttachment("img/img_avatar3.png"); //asigno un archivo adjunto al mensaje
	$mail->Subject  = $asunto;
	$mail->MsgHTML($mensaje);
	$mail->AddAddress($email,'');
	
	$mail->Username = "sologuillesosa@gmail.com";
	$mail->Password = "Guille.17"; 

	if( $mail->Send() ) { return $mensaje; }
	else { return false; die(); }
}

















?>