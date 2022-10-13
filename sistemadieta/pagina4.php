
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
<tr><td>Ingrese el ID Alimento</td><td><input type="text" name="ida"></td></tr>
<tr><td>Ingrese el Alimento</td><td><input type="text" name="alimento"  ></td></tr>
<tr><td>Ingrese la Porción</td><td><input type="text" name="porcion"  ></td></tr>
<tr><td></td><td><input type="hidden" name="idm" readonly value="<?php echo $_SESSION['sesionmenu'];?>"></td></tr>
</table>
<input value="Agregar" type="submit" name="ingreso"  />
<input value="Regresar" type="button" onclick="window.location.href= 'pagina3.php'" name="regreso"  />
</form>
<?php
if(isset($_POST['ingreso']))
{
    $ida = $_POST['ida']; 
    $alimento = $_POST['alimento']; 
    $porcion = $_POST['porcion']; 
    $idm = $_SESSION['sesionmenu'];
    

    $sql2 = "INSERT INTO alimentos (ida, alimento, porcion, idm) 
    VALUES ('$ida','$alimento','$porcion','$idm')";  
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