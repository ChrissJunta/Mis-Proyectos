
<!DOCTYPE html>

<html>
<?php

$serverName = "localhost:3306";
$username = "root";
$password = "";
$db="inteligencia";
$con = new mysqli($serverName,$username,$password,$db);  


if ($con == false ) {
   echo "Conexión fallida con  la base de datos";
   exit;
 }
 session_start();
?>


<head>

<title>Dietas</title>

<meta charset="utf-8">

</head>

<body >
<script language="JavaScript">
     function premibottone() {
       alert('La Dieta no Exite');
  }
  </script>
<center> 
<?php
 
if (!empty($_POST['pesop']) && !empty ($_POST['estaturap'])) {
    $res = $_POST['pesop']/($_POST['estaturap']*$_POST['estaturap']);
} else {
    $res = '';
}
if (!empty($_POST['nombresp'])){
    $resnom = ($_POST['nombresp']);
} else {
    $resnom = '';
}
if (!empty($_POST['edadp'])){
    $resedad = ($_POST['edadp']);
} else {
    $resedad = '';
}
if (!empty($_POST['generop'])){
    $resgene = ($_POST['generop']);
} else {
    $resgene = '';
}
if (!empty($_POST['pesop'])){
    $respeso = ($_POST['pesop']);
} else {
    $respeso = '';
}
if (!empty($_POST['estaturap'])){
    $resesta = ($_POST['estaturap']);
} else {
    $resesta = '';
}
if (!empty($_POST['enfermedadesp'])){
    $resenfer = ($_POST['enfermedadesp']);
} else {
    $resenfer = '';
}
if (!empty($_POST['alergiasp'])){
    $resaler = ($_POST['alergiasp']);
} else {
    $resaler = '';
}
if (!empty($_POST['idp'])){
    $resid = ($_POST['idp']);  
} else {
    $resid = '';
}
?>
<form name="formularioDatos" method="post" action="">
<table>
<tr><td>Ingrese el ID</td><td><input type="text" name="idp"   ></td></tr>
<tr><td>Ingrese el nombre</td><td><input type="text"  name="nombresp"   ></td></tr>
<tr><td>Ingrese la edad</td><td><input type="text"  name="edadp" value="<?php echo $_SESSION['ingresoedad'];?>"></td></tr>
<tr><td>Ingrese el peso</td><td><input type="text"  name="pesop" id="pesop" value="<?php echo $_SESSION['ingresopeso'];?>"></td></tr>
<tr><td>Ingrese el estatura</td><td><input type="text"  name="estaturap"  id="estaturap" value="<?php echo $_SESSION['ingresoestatura'];?>"></td></tr>
<tr><td>Ingrese Indice Masa Corporal</td><td><input type="text"  name="imcp"  id="imcp" readonly value="<?php echo $_SESSION['ingresouimcp'];?>"></td></tr>
<tr><td>Ingrese el genero</td><td><input type="text"  name="generop"  id="generop"  value="<?php echo $_SESSION['ingresogenero'];?>"></td></tr>
<tr><td>Ingrese Enfermedades</td><td><input type="text"  name="enfermedadesp" value="<?php echo $_SESSION['ingresoenfermedades'];?>" ></td></tr>
<tr><td>Ingrese Alergias</td><td><input type="text"  name="alergiasp" value="<?php echo $_SESSION['ingresoalergias'];?>"></td></tr>

</table>
<input value="Agregar" type="submit" name="ingreso"  />
<input value="Salir" type="button" onclick="window.location.href= 'main.php'"  />
</form>
<?php
if(isset($_POST['ingreso']))
{
    $idp = $_POST['idp']; 
    $nombresp = $_POST['nombresp']; 
    $edadp =  $_SESSION['ingresoedad'];  
    $generop = $_SESSION['ingresogenero'];
    $estaturap = $_SESSION['ingresoestatura'];
    $pesop = $_SESSION['ingresopeso'];
    $imcp = $_SESSION['ingresouimcp'];
    $enfermedadesp = $_SESSION['ingresoenfermedades']; 
    $alergiasp = $_SESSION['ingresoalergias'];
    
    $_SESSION['ingresousuario']=$idp;
 
    $sql2 = "INSERT INTO paciente (idp, nombresp, edadp, generop, estaturap, pesop, imcp, enfermedadesp, alergiasp) 
    VALUES ('$idp','$nombresp','$edadp','$generop','$estaturap','$pesop','$imcp','$enfermedadesp','$alergiasp')";  
    $result= mysqli_query($con,$sql2); 
    if ($result){
        echo "Datos Insertados";
        $dir='newusuario.php';
        header('Location: '.$dir);
    } else{
        echo "error";
    }
        }        ?>

</center>
</body>

</html>
   
    
    
    
 