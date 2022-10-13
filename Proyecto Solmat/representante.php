<!DOCTYPE html>
<html lang="en">
<head>
<title>Administracion | Representante</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<?php

    session_start();
 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: login.php");
        exit;
    }
?>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}</style>
<![endif]-->
</head>
<body id="page2">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
          <li><a href="paciente.php">PACIENTE</a></li>
          <li><a href="valoracion.php">VALORACION PACIENTE</a></li>
            <li><a href="condicion_medica.php">CONDICIONES MEDICAS</a></li>
            <li><a href="representante.php">REPRESENTANTES</a></li>
            <li><a href="pruebas.php">PRUEBAS</a></li>
            <li><a href="docente.php">DOCENTE</a></li>

          </ul>
        </nav>
        <ul id="icons">
          <li><a href="#"><img src="images/icons1.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/icons2.jpg" alt=""></a></li>
        </ul>
      </div>
      <div class="wrapper">
        <h1><a href="index.html" id="logo">CENTRO ESPECIALIZADO PARA MEJORAR PROBLEMAS EN NIÑOS</a></h1>
      </div>
      <div id="slogan"> CENTRO ESPECIALIZADO<span>NUESTRA PRIORIDAD ES AYUDAR</span> </div>
    </header>
    <!-- / header -->
  </div>
</div>
<div class="body2">
  <div class="main">
    <!-- content -->
    <section id="content">
    <?php
include('includes/conexion.php');
include('includes/clase_representante.php');

?>
<table>
  <tr>
<td><h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro sitio.</h1></td>
<td><a href="reset-password.php">CAMBIAR CONTRASEÑA</a></td>
<td><image src="images/espacio.png" width="30" height="30"></td>
<td><a href="logout.php">CERRAR SESION</a></td>
  </tr>
  </table>
<?php
$objdep=new representante($cn);

if(isset ($_GET['op']) && $_GET['op']=="detalle")
echo $objdep->ver_detalle($_GET['idde']);
else
{
if(isset($_POST['Ingresar']))
        $objdep->grabar();
        else
        {
                if(isset($_GET['op']) && $_GET['op']=='nueva')
                echo $objdep->insertar(null);
                if(isset($_GET['op']) && $_GET['op']=='actualizar')
                echo $objdep->insertar($_GET['idd']);
                if(isset($_GET['op']) && $_GET['op']=='eliminar')    
                echo $objdep->eliminar($_GET['ide']);
        }
       
           

echo $objdep->listado();
      }
?>
   <button type="button" onclick="javascript:window.print()">Imprimir</button>
    </section>
    <!-- content -->
    <!-- footer -->
    <footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
              <article class="col_1">
                <h3>Ubicanos:</h3>
                <p class="col_address"><strong>Pais:<br>
                  Ciudad:<br>
                  Direccion:<br>
                  Email:</strong></p>
                <p>Ecuador<br>
                  Ambato<br>
                  Av.Jacome Clavijo y Francisco Montalvo<br>
                  <a href="#">samanthaacosta@gmail.com</a></p>
              </article>
              
            </div>
            <div class="wrapper">
               <article class="col_4 pad_left2">Copyright &copy; <a href="#">Domain Name</a> Todos los derechos Reservados<br>
                Diseñado por <a target="_blank" href="http://www.templatemonster.com/"></a></article>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- / footer -->
  </div>
</div>
<script type="text/javascript">Cufon.now();</script>
</body>
</html>