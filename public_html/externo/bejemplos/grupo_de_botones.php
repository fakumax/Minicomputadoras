<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">grupo_de_botones</li>
  </ol>
</div>
<div class="container">
  <hr>
  <div class="btn-toolbar" role="toolbar">
    <div class="btn-group">
      <button type="button" class="btn btn-default">uno</button>
      <button type="button" class="btn btn-default">dos</button>
      <button type="button" class="btn btn-default">tres</button>
      <button type="button" class="btn btn-default">cuatro</button>
    </div> 
    <div class="btn-group">
      <button type="button" class="btn btn-default">one</button>
      <button type="button" class="btn btn-default">two</button>
      <button type="button" class="btn btn-default">three</button>
      <button type="button" class="btn btn-default">four</button>
    </div>
    <div class="btn-group">
      <button type="button" class="btn btn-default">1</button>
      <button type="button" class="btn btn-default">2</button>
      <button type="button" class="btn btn-default">3</button>
    </div>
   </div>
   <hr>
  <form role="form">
    <div class="form-group">
      <button type="submit" class="btn btn-default">
      btn-default : Botón estándar o por defecto.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-primary">
      btn-primary : Es un botón que se destaca entre un conjunto de botones.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-success">
      btn-success : Se utiliza para indicar una acción exitosa.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-info">
      btn-info : Es un botón para información.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-warning">
      btn-warning : Es un botón que nos informa que debemos tener 
      cuidado con la acción que tiene asociado el botón.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-danger">
      btn-danger : Indica que la acción que tiene asociado el botón 
      es peligrosa.</button>       
    </div> 
    <div class="form-group">
      <button type="submit" class="btn btn-link">
      btn-link : Convierte al botón como un hipervínculo, haciendo 
      que disminuya su importancia.</button>       
    </div> 
  </form>
  <hr>
  <form role="form">
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-xs">
       btn-xs : tamaño extra pequeño</button>       
    </div> 
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-sm">
       btn-sm : tamaño pequeño</button>       
    </div> 
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-lg">
       btn-lg : tamaño grande</button>       
    </div> 
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-block">
       btn-block : Botón que se expande en ancho según su contenedor</button>       
    </div> 
  </form>
  <hr>
  <form role="form">
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-lg">
       Botón activo</button>       
    </div> 
    <div class="form-group">
     <button type="submit" class="btn btn-primary btn-lg" disabled="disabled">
       Botón 1 desactivo</button>       
    </div> 
  </form>
</div>