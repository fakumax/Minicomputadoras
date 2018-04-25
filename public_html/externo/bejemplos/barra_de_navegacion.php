<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">barra_nav</li>
  </ol>
</div>
<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Nombre del sitio1</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Opción 1</a></li>
          <li><a href="#">Opción 2</a></li> 
          <li><a href="#">Opción 3</a></li> 
          <li><a href="#">Opción 4</a></li> 
          <li><a href="#">Opción 5</a></li> 
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Nombre del sitio2</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Opción 1</a></li>
          <li><a href="#">Opción 2</a></li> 
          <li><a href="#">Opción 3</a></li> 
          <li><a href="#">Opción 4</a></li> 
          <li><a href="#">Opción 5</a></li> 
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">
  <!-- .navbar-default, .navbar-inverse, .navbar-fixed-top, navbar-fixed-bottom-->
  <nav class="navbar navbar-inverse navbar-fixed-bottom">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Nombre del sitio3</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Opción 1</a></li>
          <li><a href="#">Opción 2</a></li> 
          <li><a href="#">Opción 3</a></li> 
          <li><a href="#">Opción 4</a></li> 
          <li><a href="#">Opción 5</a></li> 
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Nombre del sitio4</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
</div>

<div class="container">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Nombre del sitio5</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search">
          <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
              <i class="glyphicon glyphicon-search"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </nav>
</div>

<div class="container">
  <nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
      <li><a href="#">Link 6</a></li>
      <li><a href="#">Link</a></li>
    </ul>
    <p class="navbar-text">Some text</p>
  </nav>
</div>