<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">form_input_text_password_lectores_de_pantalla</li>
  </ol>
</div>
<div class="container">
    <form role="form">
      <div class="form-group"> 
        <label for="nombre">Ingrese su nombre:</label>
        <input type="text" class="form-control" id="nombre">
      </div> 
      <div class="form-group"> 
        <label for="clave">Ingrese su clave:</label>
        <input type="password" class="form-control" id="clave">
      </div> 
      <button type="submit" class="btn btn-default">Enviar</button> 
    </form>
    <hr>
    <form role="form">
      <div class="form-group"> 
        <label for="comentario">Deje aquí sus comentarios</label>
        <textarea class="form-control" rows="5" id="comentarios"></textarea>
      </div> 
      <button type="submit" class="btn btn-default">Enviar</button>       
    </form>
</div>
<div class="container">
  <h2>Inline form with .sr-only class</h2>
  <p>Make the viewport larger than 768px wide to see that all of the form elements are inline, left aligned, and the labels are alongside.</p>
  <form class="form-inline" action="/action_page.php">
    <div class="form-group">
      <label class="sr-only" for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email"  name="email">
    </div>
    <div class="form-group">
      <label class="sr-only" for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>