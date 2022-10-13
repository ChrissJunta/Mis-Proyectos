
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

<title>Ejemplo aprenderaprogramar.com</title>

<meta charset="utf-8">

</head>

<body >
<center> 
<form name="formularioDatos" method="post" action="">
<table>
<tr><td>Ingrese el ID Menu</td><td><input type="text" name="idm"></td></tr>
<tr><td>Ingrese el Nombre de la Comida</td><td><select name="comida">
<option value="Desayuno" >Desayuno</option>
<option value="Almuerzo">Almuerzo</option>
<option value="Cena">Cena</option></select></td></tr>
<tr><td></td><td><input type="hidden" name="idd" readonly value="<?php echo $_SESSION['sesiondieta'];?>"></td></tr>
</table>
<input value="Agregar" type="submit" name="ingreso"  />
<input value="Salir" type="button" onclick="window.location.href= 'pruebabus.php'"  />
</form>
<?php
if(isset($_POST['ingreso']))
{
    $idm = $_POST['idm']; 
    $_SESSION['sesionmenu']=$idm;
    $comida = $_POST['comida']; 
    $idd = $_SESSION['sesiondieta'];
    

    $sql2 = "INSERT INTO menu (idm, comida, idd) 
    VALUES ('$idm','$comida','$idd')";  
    $result= mysqli_query($con,$sql2); 
    if ($result){
        echo "Datos Insertados";
        $dir='pagina4.php';
        header('Location: '.$dir);
        
    } else{
        echo "error";
    }
        }        
?>

</center>
</body>

</html>
   