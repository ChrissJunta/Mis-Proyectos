
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
<tr><td>Ingrese el ID Dieta</td><td><input type="text" name="idd" ></td></tr>
<tr><td>Ingrese el nombre de la dieta</td><td><input type="text" name="nombred"></td></tr>
</table>
<input value="Agregar" type="submit" name="ingreso"  />

</form>
<?php
if(isset($_POST['ingreso']))
{
    $idd = $_POST['idd'];
   
    $_SESSION['sesiondieta']=$idd;
 
    $nombred = $_POST['nombred']; 

    $sql2 = "INSERT INTO dieta (idd, nombred) 
    VALUES ('$idd','$nombred')";  
    $result= mysqli_query($con,$sql2); 
    if ($result){
        echo "Datos Insertados";
        $dir='pagina1.php';
        header('Location: '.$dir);
    } else{
        echo "error";
    }
        }        
?>

</center>
</body>

</html>
   
    
    
    
 