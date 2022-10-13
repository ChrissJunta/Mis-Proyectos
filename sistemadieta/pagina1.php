
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
<center> 
<form name="formularioDatos" method="post" action="">
<table>
<tr><td></td><td><input type="hidden" name="idp" readonly value="<?php echo $_SESSION['ingresousuario'];?>" ></td></tr>
<tr><td></td><td><input type="hidden" name="idd" readonly value="<?php echo $_SESSION['sesiondieta'];?>" ></td></tr>
<tr><td>Ingrese el resultado</td><td><input type="text" name="resultado"></td></tr>
</table>
<input value="Agregar" type="submit" name="ingreso"  />
</form>
<?php
if(isset($_POST['ingreso']))
{
    $idp = $_SESSION['ingresousuario']; 
    $idd = $_SESSION['sesiondieta'];
    $resultado = $_POST['resultado']; 

    $sql2 = "INSERT INTO die_paci (idp, idd, resultado) 
    VALUES ('$idp','$idd','$resultado')";  
    $result= mysqli_query($con,$sql2); 
    if ($result){
        echo "Datos Insertados";
        $dir='pagina3.php';
        header('Location: '.$dir);
    } else{
        echo "error";
    }
        }        
?>

</center>
</body>

</html>
   
    
    