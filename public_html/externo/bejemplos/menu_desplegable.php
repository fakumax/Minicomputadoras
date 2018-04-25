<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">menu_desplegable</li>
  </ol>
</div>
<div class="container">
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" 
        id="menu1" data-toggle="dropdown">Tutoriales
    <span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="#">HTML Ya</a>
      </li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="#">CSS Ya</a>
      </li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="#">JavaScript</a>
      </li>
      <li role="presentation" class="divider">
      </li>
      <li role="presentation">
        <a role="menuitem" tabindex="-1" href="#">Fin</a>
      </li>
    </ul>
  </div>
</div>