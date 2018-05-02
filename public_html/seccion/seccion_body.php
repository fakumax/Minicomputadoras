<?php //Esto sirve para mostrar el menú dependiendo del perfil
//$_SESSION['institucion']='Normal 10 "Anexo Comercial San Antonio"';
       
if($_SESSION['perfil'] == 'Administrador'){
      echo '
    	<div class="container">
    		 <div class="jumbotron">
    	        <h1 class="display-3">Bienvenido</h1>
	   			<p class="lead">Configure el primer inicio del Sistema añadiendo establecimiento, profesores y materias.</p>
	   		    <p><a class="btn btn-lg btn-success" href="#" role="button"><span class="glyphicon glyphicon-cog"></span>Configuración</a></p>
	 		 </div>
		</div>';
           }         
 ?>

<?php
if($_SESSION['perfil'] == 'Alumno'){
      echo '
        <div  class="container">
   			 <div class="jumbotron">
	  			 <h1 class="display-3">Bienvenido</h1>
	  		     <p class="lead">Configure su nueva contraseña.</p>
	             <p><a class="btn btn-lg btn-success" href="#" role="button"><span class="glyphicon glyphicon-cog"></span>Configuración</a></p>
             </div>
        </div>';
           }         
?>

<?php
if($_SESSION['perfil'] == 'Profesor'){
      echo '
         <div class="container">
   		     <div class="jumbotron">
	  			 <h1 class="display-3">Bienvenido</h1>
	  			 <p class="lead">Configure los materias.</p>
	  		     <p><a class="btn btn-lg btn-success" href="#" role="button"><span class="glyphicon glyphicon-cog"></span>Configuración</a></p>
  			  </div>
		</div>';
           }         
?>











