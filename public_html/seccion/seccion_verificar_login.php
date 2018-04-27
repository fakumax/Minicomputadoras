<?php
session_start();
if (!(isset($_SESSION['conectado']) && $_SESSION['conectado'] == true))
{
  //echo "Esta pagina solo es visible para usuarios registrados, <a href='index.php'>Iniciar Sesión</a>";
  header("Location: login.php");
  exit;
}

$ahora = time();
if($ahora > $_SESSION['expirar'])
{
  session_destroy();
  //echo "Su sesion a expirado!, <a href='index.php'>Iniciar Sesión</a>";
  header("Location: login.php");
  exit;
}
?>