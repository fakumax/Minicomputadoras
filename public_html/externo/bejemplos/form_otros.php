<?php 
  include("index.html");
?>
<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.html">Inicio</a></li>
    <li><a href="index.html">Ejemplos</a></li>
    <li class="active">form_otros</li>
  </ol>
</div>
<div class="container">
  <h2>Horizontal form with static control</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <p class="form-control-static">someone@example.com</p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
<div class="container">
  <h3>Input Groups</h3>
  <p>The .input-group class is a container to enhance an input by adding an icon, text or a button in front or behind it as a "help text".</p>
  <p>The .input-group-addon class attaches an icon or help text next to the input field.</p>
  
  <form>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br>
    <div class="input-group">
      <span class="input-group-addon">Text</span>
      <input id="msg" type="text" class="form-control" name="msg" placeholder="Additional Info">
    </div>
  </form>
  <br>

  <p>It can also be used on the right side of the input:</p>
  <form>
    <div class="input-group">
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>   
    </div>
    <div class="input-group">
      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
    </div>
  </form>
</div>
<div class="container">
  <h2>Horizontal form: control states</h2>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-2 control-label">Focused</label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" value="Click to focus...">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-sm-2 control-label">Disabled</label>
      <div class="col-sm-10">
        <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled>
      </div>
    </div>
    <fieldset disabled>
      <div class="form-group">
        <label for="disabledTextInput" class="col-sm-2 control-label">Disabled input and select list (Fieldset disabled)</label>
        <div class="col-sm-10">
          <input type="text" id="disabledTextInput" class="form-control" placeholder="Disabled input">
        </div>
      </div>
      <div class="form-group">
        <label for="disabledSelect" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
          <select id="disabledSelect" class="form-control">
            <option>Disabled select</option>
          </select>
        </div>
      </div>
    </fieldset>
    <div class="form-group has-success has-feedback">
      <label class="col-sm-2 control-label" for="inputSuccess">Input with success and glyphicon</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSuccess">
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
      </div>
    </div>
    <div class="form-group has-warning has-feedback">
      <label class="col-sm-2 control-label" for="inputWarning">Input with warning and glyphicon</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputWarning">
        <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>
      </div>
    </div>
    <div class="form-group has-error has-feedback">
      <label class="col-sm-2 control-label" for="inputError">Input with error and glyphicon</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputError">
        <span class="glyphicon glyphicon-remove form-control-feedback"></span>
      </div>
    </div>
  </form>
</div>
<div class="container">
  <h2>Input Sizing</h2>
  <p>The form below shows input elements with different heights using .input-lg and .input-sm:</p>
  <form>
    <div class="form-group">
      <label for="inputdefault">Default input</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputlg">input-lg</label>
      <input class="form-control input-lg" id="inputlg" type="text">
    </div>
    <div class="form-group">
      <label for="inputsm">input-sm</label>
      <input class="form-control input-sm" id="inputsm" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">Default select list</label>
      <select class="form-control" id="sel1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
      </select>
    </div>
    <div class="form-group">
      <label for="sel2">input-lg</label>
      <select class="form-control input-lg" id="sel2">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
    <div class="form-group">
      <label for="sel3">input-sm</label>
      <select class="form-control input-sm" id="sel3">
        <option>1</option>
        <option>2</option>
        <option>3</option>
      </select>
    </div>
  </form>
</div>
<div class="container">
  <h2>Column Sizing</h2>
  <p>The form below shows input elements with different widths using different .col-xs-* classes:</p>
  <form>
    <div class="form-group row">
      <div class="col-xs-2">
        <label for="ex1">col-xs-2</label>
        <input class="form-control" id="ex1" type="text">
      </div>
      <div class="col-xs-3">
        <label for="ex2">col-xs-3</label>
        <input class="form-control" id="ex2" type="text">
      </div>
      <div class="col-xs-4">
        <label for="ex3">col-xs-4</label>
        <input class="form-control" id="ex3" type="text">
      </div>
    </div>
  </form>
</div>
<div class="container">
  <h2>Help text</h2>
  <p>Use the .help-block class to add a block level help text in forms:</p>
  <form>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      <span class="help-block">This is some help text that breaks onto a new line and may extend more than one line.</span>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>