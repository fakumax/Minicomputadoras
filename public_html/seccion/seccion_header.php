<!--seccion_header.php -->
<?php  //$activo="inicio";?>
<?php //Esto sirve para mostrar el menú dependiendo del perfil
switch ($_SESSION['perfil'])
{
  case 'Administrador':
    $abm_profesores = "block";
    $relacion_p_m   = "block";
    $abm_materias   = "block";
    $matriculacion  = "none";
    $mis_cursos     = "none";
    
  break;
  case 'Profesor':
    $abm_profesores = "none";
    $relacion_p_m   = "none";
    $abm_materias   = "none";
    $matriculacion  = "block";
    $mis_cursos     = "none";
  break;
    case 'Alumno':
    $abm_profesores = "none";
    $relacion_p_m   = "none";
    $abm_materias   = "none";
    $matriculacion  = "none";
    $mis_cursos     = "block";
  break;
  default:
    $abm_profesores = "none";
    $relacion_p_m   = "none";
    $abm_materias   = "none";
    $matriculacion  = "none";
    $mis_cursos     = "none";
  break;
}
?>
<header>
  <nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
          <span class="sr-only">Desplegar / Ocultar Menu</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="#" class="navbar-brand"><?php echo $_SESSION['perfil'];?></a>
      </div>
      <div class="collapse navbar-collapse" id="navegacion-fm">
        <ul class="nav navbar-nav">
          <li class="<?php if ($activo=="inicio") echo "active";?>"><a href="principal.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
          <li class="dropdown <?php if ($activo=="materias") echo "active";?>"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-book"></i> Materias<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li style="display:<?php echo $abm_materias;?>;"><a href="abm_materias.php"><span class="glyphicon glyphicon-book"></span> ABM Materias</a></li>
              <li style="display:<?php echo $matriculacion;?>;"><a href="matriculacion.php"><span class="glyphicon glyphicon-th-list"></span> Matriculación</a></li>
              <li style="display:<?php echo $mis_cursos;?>;"><a href="mis_cursos.php"><span class="glyphicon glyphicon-th"></span> Mis Cursos</a></li>
            </ul>
          </li>
          <li class="dropdown <?php if ($activo=="profesor") echo "active";?>" style="display:<?php echo $abm_profesores;?>;"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Profesor<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li style="display:<?php echo $abm_profesores;?>;"><a href="abm_profesores.php"><span class="glyphicon glyphicon-user"></span> ABM Profesores</a></li>
              <li style="display:<?php echo $relacion_p_m;?>;"><a href="relacion_profesor_materia.php"><span class="glyphicon glyphicon-transfer"></span> Relacion Prof-Materia</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-envelope"></i> Soporte<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" onclick="//javascript:window.open('doc/manual/Manual_de_Usuario_Sistema_Pizeria_Yosuko.pdf','_blank');"><i class='glyphicon glyphicon-book'></i> Manual de Usuario</a></li>
            </ul>
          </li>
          <li><a href="login2.php?accion=Desloguear"><i class='glyphicon glyphicon-off'></i> Salir</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>
