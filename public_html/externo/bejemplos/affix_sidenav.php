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
    .affix {top: 20px;}
  </style>

</head>
<body>

  <div class="container-fluid" style="background-color:#2196F3;color:#fff;height:200px;">
    <h1>Bootstrap Affix Example</h1>
    <h3>Fixed (sticky) vertical sidenav on scroll</h3>
    <p>Scroll this page to see how the left navigation menu behaves with data-spy="affix".</p>
    <p><strong>The left menu sticks to the page when you have scrolled a specified amount of pixels.</strong></p>
  </div>
  <br>

  <div class="container">
    <div class="row">
      <nav class="col-sm-3">
        <!-- El plug-in afijo alterna entre tres clases: .affix, .affix-top, y .affix-bottom -->
        <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
          <li class="active"><a href="#section1">Section 1</a></li>
          <li><a href="#section2">Section 2</a></li>
          <li><a href="#section3">Section 3</a></li>
        </ul>
      </nav>
      <div class="col-sm-9">   
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
        <h1>Some text to enable scrolling</h1>
      </div>
    </div>
  </div>
</body>
</html>