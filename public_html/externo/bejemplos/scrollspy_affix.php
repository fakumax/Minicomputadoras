<!DOCTYPE html>
<html lang="es">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">

  <title>Bootstrap</title>

  <!--//Bootstrap web-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <!--//Bootstrap local-->
  <!--<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="estilos.css">
  <link rel="icon" href="bootstrap.ico">

  <style>
    body {position: relative;}
    #section1 {padding-top:50px;height:500px;color: #fff; background-color: #1E88E5;}
    #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
    #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
    #section41 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
    #section42 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
    .affix {top:0;width:100%;z-index:9999 !important;}
    .navbar {margin-bottom: 0px;}
    .affix ~ .container-fluid {position:relative;top: 50px;}
  </style>

</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

  <div class="container-fluid" style="background-color:#F44336;color:#fff;height:200px;">
    <h1>Scrollspy & Affix Example</h1>
    <h3>Fixed navbar on scroll</h3>
    <p>Scroll this page to see how the navbar behaves with data-spy="affix" and data-spy="scrollspy".</p>
    <p>The navbar is attached to the top of the page after you have scrolled a specified amount of pixels, and the links in the navbar are automatically updated based on scroll position.</p>
  </div>

  <nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#">WebSiteName</a>
      </div>
      <div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="#section1">Section 1</a></li>
            <li><a href="#section2">Section 2</a></li>
            <li><a href="#section3">Section 3</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Section 4 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#section41">Section 4-1</a></li>
                <li><a href="#section42">Section 4-2</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>    

  <div id="section1" class="container-fluid">
    <h1>Section 1</h1>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  </div>
  <div id="section2" class="container-fluid">
    <h1>Section 2</h1>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  </div>
  <div id="section3" class="container-fluid">
    <h1>Section 3</h1>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  </div>
  <div id="section41" class="container-fluid">
    <h1>Section 4 Submenu 1</h1>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  </div>
  <div id="section42" class="container-fluid">
    <h1>Section 4 Submenu 2</h1>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
    <p>Try to scroll this section and look at the navigation bar while scrolling! Try to scroll this section and look at the navigation bar while scrolling!</p>
  </div>
</body>
</html>