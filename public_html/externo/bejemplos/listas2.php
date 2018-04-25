<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">listas2</li>
  </ol>
</div>
<div class="container">
  <h2>Basic List Group</h2>
  <ul class="list-group">
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>
</div>
<div class="container">
  <h2>List Group With Badges</h2>
  <ul class="list-group">
    <li class="list-group-item">New <span class="badge">12</span></li>
    <li class="list-group-item">Deleted <span class="badge">5</span></li>
    <li class="list-group-item">Warnings <span class="badge">3</span></li>
  </ul>
</div>
<div class="container">
  <h2>List Group With Linked Items</h2>
  <div class="list-group">
    <a href="#" class="list-group-item">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>
  </div>
</div>
<div class="container">
   <div class="list-group">
    <a href="#" class="list-group-item active">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>
  </div> 
</div> 
<div class="container">
  <h2>List Group With a Disabled Item</h2>
  <div class="list-group">
    <a href="#" class="list-group-item disabled">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>
  </div>
</div>
<div class="container">
  <h2>List Group With Contextual Classes</h2>
  <ul class="list-group">
    <li class="list-group-item list-group-item-success">First item</li>
    <li class="list-group-item list-group-item-info">Second item</li>
    <li class="list-group-item list-group-item-warning">Third item</li>
    <li class="list-group-item list-group-item-danger">Fourth item</li>
  </ul>
  
  <h2>Linked Items With Contextual Classes</h2>
  <p>Move the mouse over the linked items to see the hover effect:</p>
  <div class="list-group">
    <a href="#" class="list-group-item list-group-item-success">First item</a>
    <a href="#" class="list-group-item list-group-item-info">Second item</a>
    <a href="#" class="list-group-item list-group-item-warning">Third item</a>
    <a href="#" class="list-group-item list-group-item-danger">Fourth item</a>
  </div>
</div>
<div class="container">
  <h2>List Group With Custom Content</h2>
  <div class="list-group">
    <a href="#" class="list-group-item active">
      <h4 class="list-group-item-heading">First List Group Item Heading</h4>
      <p class="list-group-item-text">List Group Item Text</p>
    </a>
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">Second List Group Item Heading</h4>
      <p class="list-group-item-text">List Group Item Text</p>
    </a>
    <a href="#" class="list-group-item">
      <h4 class="list-group-item-heading">Third List Group Item Heading</h4>
      <p class="list-group-item-text">List Group Item Text</p>
    </a>
  </div>
</div>