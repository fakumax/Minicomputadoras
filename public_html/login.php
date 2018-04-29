<!DOCTYPE html>
<html lang="es">
<head>
   <?php include("seccion/seccion_head.php");?>
   <link href="externo/css/login.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<?php include("modal/registrarse.php");?>
    <?php include("modal/cambiar_clave.php");?>
	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/img_avatar3.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" role="form" accept-charset="UTF-8" action="login3.php?accion=Ingresar" method="post" name="loginform" id="loginform" autocomplete="off">
            	<div id="mensaje_login"></div>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario (DNI o Email)" name="usuario" id="usuario" type="text" value="" autofocus="" required>
                <input class="form-control" placeholder="Contraseña" name="clave" id="clave" type="password" value="" autocomplete="off" required>
                <div class="help-block text-right"><a href="#">¿Olvidó su contraseña?</a></div>
                <button type="button" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="login">
                    <span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp; Iniciar Sesión</button>
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#registrarse" onclick="limpiarRegistro();">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; Registrarse como usuario</button>
            </form>
        </div><!-- /card-container -->
	</div><!-- /container -->
	<script src="funciones.js"></script>
    <script src="login_2.js"></script>
</body>
</html>
