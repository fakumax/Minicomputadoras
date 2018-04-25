<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">form_checkbox_radio_select</li>
  </ol>
</div>
<div class="container">
    <form role="form">
      <div class="checkbox"> 
        <label>
          <input type="checkbox">Opción 1
        </label> 
      </div>
      <div class="checkbox"> 
        <label>
          <input type="checkbox">Opción 2
        </label> 
      </div>
      <div class="checkbox"> 
        <label>
          <input type="checkbox">Opción 3
        </label> 
      </div>

      <div class="radio"> 
        <label>
          <input type="radio" name="radioa">Opción 1
        </label> 
      </div>
      <div class="radio"> 
        <label>
          <input type="radio" name="radioa">Opción 2
        </label> 
      </div>
      <div class="radio"> 
        <label>
          <input type="radio" name="radioa">Opción 3
        </label> 
      </div>

      <label class="checkbox-inline"> 
        <input type="checkbox">Opción 1
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox">Opción 2
      </label> 
      <label class="checkbox-inline"> 
        <input type="checkbox">Opción 3
      </label> 

      <label class="radio-inline"> 
        <input type="radio" name="radiob">Opción 1
      </label> 
      <label class="radio-inline"> 
        <input type="radio" name="radiob">Opción 2
      </label> 
      <label class="radio-inline"> 
        <input type="radio" name="radiob">Opción 3
      </label> 
      <br>
      <button type="submit" class="btn btn-default">Enviar</button> 
    </form>
    <hr>
    <form role="form">
       <label for="control1">
        Seleccione un elemento</label> 
         <select class="form-control" id="control1"> 
            <option>1</option> 
            <option>2</option>
            <option>3</option> 
            <option>4</option> 
            <option>5</option> 
          </select> 
       <label for="control2">
       Seleccione varios elementos</label> 
         <select multiple class="form-control" id="control2"> 
            <option>1</option> 
            <option>2</option>
            <option>3</option> 
            <option>4</option> 
            <option>5</option>       
         </select>      
        <button type="submit" class="btn btn-default">Enviar</button> 
    </form>
</div>