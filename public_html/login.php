<!DOCTYPE html>
<html lang="es">
<head>
   <?php include("seccion/seccion_head.php");?>
   <link href="externo/css/login.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<?php include("modal/registrarse.php");?>
	<div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="img/img_avatar3.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" role="form" accept-charset="UTF-8" action="login2.php?accion=Ingresar" method="post" name="loginform" autocomplete="off">
            	<div id="mensaje"></div>
                <span id="reauth-email" class="reauth-email"></span>
                <input class="form-control" placeholder="Usuario (DNI o Email)" name="usuario" type="text" value="" autofocus="" required>
                <input class="form-control" placeholder="Contraseña" name="clave" type="password" value="" autocomplete="off" required>
                <div class="help-block text-right"><a href="#">¿Olvidó su contraseña?</a></div>
                <button type="submit" class="btn btn-lg btn-success btn-block btn-signin" name="login" id="submit">
                    <span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp; Iniciar Sesión</button>
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#registrarse">
                    <span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp; Registrarse como usuario</button>
            </form>
        </div><!-- /card-container -->
	</div><!-- /container -->
	<script src="funciones.js"></script>
    <script> alertify.success('Administrador-(admin/admin) Profesor-(profesor/profesor) Alumno-(33333333/33333333)'); </script>
<?php 
if ( isset($_REQUEST['msg']) ){
    if ( $_REQUEST['msg']=='exito' ) echo "<script> mensaje('mensaje', 'Los datos se grabaron'); </script>";
	else echo "<script> mensaje('mensaje', 'Verifique los datos', 'error'); </script>";
}
?>
</body>
</html>
