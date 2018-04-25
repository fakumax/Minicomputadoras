<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">tablas</li>
  </ol>
</div>
<div class="container">
  <h2>clases contextuales</h2>
  <p>Las clases contextuales se pueden utilizar para colorear filas de tabla o celdas de tabla. Las clases que se pueden utilizar son: .active, .success, .info, .warning, and .danger.</p>
  <div class="table-responsive">
    <table class="table table-hover table-condensed">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>   
        <tr> 
         <td class="danger">Default</td>
         <td class="warning">Defaultson</td> 
         <td class="success">def@somemail.com</td> 
        </tr>
        <tr class="info">
          <td>Success</td>
          <td>Doe</td>
          <td>john@example.com</td>
        </tr>
        <tr class="danger">
          <td>Danger</td>
          <td>Moe</td>
          <td>mary@example.com</td>
        </tr>
        <tr class="success">
          <td>Info</td>
          <td>Dooley</td>
          <td>july@example.com</td>
        </tr>
        <tr class="warning">
          <td>Warning</td>
          <td>Refs</td>
          <td>bo@example.com</td>
        </tr>
        <tr class="active">
          <td>Active</td>
          <td>Activeson</td>
          <td>act@example.com</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Default</td>
          <td>Defaultson</td>
          <td>def@somemail.com</td>
        </tr>      
        <tr>
          <td>Success</td>
          <td>Doe</td>
          <td>john@example.com</td>
        </tr>
        <tr>
          <td>Danger</td>
          <td>Moe</td>
          <td>mary@example.com</td>
        </tr>
        <tr>
          <td>Info</td>
          <td>Dooley</td>
          <td>july@example.com</td>
        </tr>
        <tr>
          <td>Warning</td>
          <td>Refs</td>
          <td>bo@example.com</td>
        </tr>
        <tr>
          <td>Active</td>
          <td>Activeson</td>
          <td>act@example.com</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>