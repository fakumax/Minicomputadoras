<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">anidamiento_de_columnas</li>
  </ol>
</div>
<div class="container">
  <div class="row">
    <div class="col-lg-6"  style="background-color:#aaa">
      <h1>Columna 1</h1> 
      <p>Esto es una prueba de bootstrap.</p>
    </div>
    <div class="col-lg-6"  style="background-color:#bbb">
      <h1>Columna 2</h1> 
      <p>Esto es una prueba de bootstrap.</p>

      <div class="row">  
        <div class="col-lg-6" style="background-color:#ccc">
          <h2>Columna 2a</h2>
          <p>Esto es una prueba de bootstrap.</p>
        </div>  
        <div class="col-lg-6" style="background-color:#ddd">
          <h2>Columna 2b</h2>
          <p>Esto es una prueba de bootstrap.</p>
        </div>  
      </div>

    </div>
  </div>
</div>