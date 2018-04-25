<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">objeto_de_multimedia</li>
  </ol>
</div>
<div class="container">
  <h2>Objeto de multimedia básica</h2>
  <p>Use the "media-left" class to left-align a media object. Text that should appear next to the image, is placed inside a container with class="media-body".</p>
  <p>Tip: Use the "media-right" class to right-align the media object.</p><br>
  
  <!-- Left-aligned media object -->
  <div class="media">
    <div class="media-left">
      <img src="../img/img_avatar1.png" class="media-object" style="width:60px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Left-aligned</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <hr>
  
  <!-- Right-aligned media object -->
  <div class="media">
    <div class="media-body">
      <h4 class="media-heading">Right-aligned</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="media-right">
      <img src="../img/img_avatar1.png" class="media-object" style="width:60px">
    </div>
  </div>
</div>
<div class="container">
  <h2>Arriba, Medio o alineación inferior</h2>
  <p>The media object can also be top, middle or bottom-aligned with the "media-top", "media-middle" or "media-bottom" class:</p><br>
  <div class="media">
    <div class="media-left media-top">
      <img src="../img/img_avatar1.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Media Top</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <hr>
  <div class="media">
    <div class="media-left media-middle">
      <img src="../img/img_avatar1.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Media Middle</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <hr>
  <div class="media">
    <div class="media-left media-bottom">
      <img src="../img/img_avatar1.png" class="media-object" style="width:80px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">Media Bottom</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
</div>
<div class="container">
  <h2>Anidación objetos multimedia</h2>
  <p>Media objects can also be nested (a media object inside a media object):</p><br>
  <div class="media">
    <div class="media-left">
      <img src="../img/img_avatar1.png" class="media-object" style="width:45px">
    </div>
    <div class="media-body">
      <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      
      <!-- Nested media object -->
      <div class="media">
        <div class="media-left">
          <img src="../img/img_avatar2.png" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

          <!-- Nested media object -->
          <div class="media">
            <div class="media-left">
              <img src="../img/img_avatar3.png" class="media-object" style="width:45px">
            </div>
            <div class="media-body">
              <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          
        </div>
      </div>
      
    </div>
  </div>
</div>