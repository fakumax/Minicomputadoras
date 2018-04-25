<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">form_inline_horizontal</li>
  </ol>
</div>
<div class="container">
  <!-- Agregue el clearfix adicional para sólo la ventana de visualización requerida -->
  <div class="clearfix visible-xs-block"></div>
  <form class="form-inline" role="form">
    <div class="form-group">
      <label for="mail">mail:</label>
    <input type="email" class="form-control" id="mail">
  </div>
  <div class="form-group">
    <div class="checkbox">
      <label>
        <input type="checkbox"> Acepta términos
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-default">Entrar</button>
  </form>
  
  <form class="form-horizontal" role="form">
    <div class="form-group">
      <label for="usuario" class="col-sm-3 control-label">Nombre de usuario:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="usuario">
      </div>
    </div>
    <div class="form-group">
      <label for="clave" class="col-sm-3 control-label">Ingrese clave:</label>
      <div class="col-sm-9">
        <input type="password" class="form-control" id="clave">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" class="btn btn-default">Entrar</button>
      </div> 
    </div>
  </form>

  <form role="form">
    <fieldset disabled> 
      <div class="form-group">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" class="form-control" id="usuario">
      </div>
      <div class="form-group">
        <label for="clave">Ingrese clave:</label>
        <input type="password" class="form-control" id="clave">
      </div>
    </fieldset>
    <div class="checkbox">
       <label>
         <input type="checkbox" value="" disabled>
          Acepta términos y condiciones
         </label>
     </div>
     <div class="form-group">
       <button type="submit" class="btn btn-default">Entrar</button>
     </div>
     
  </form>
</div>