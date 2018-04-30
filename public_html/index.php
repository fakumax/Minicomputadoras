<?php
session_start();
if (!(isset($_SESSION['conectado']) && $_SESSION['conectado'] == true)) header("Location: login.php");
else header("location: principal.php");
?>