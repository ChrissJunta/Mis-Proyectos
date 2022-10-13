
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

if (!empty($_POST['edadfin'])){
    $resnom = ($_POST['edadfin']);
} else {
    $resnom = '';
}
if (!empty($_POST['edadinic'])){
    $resid = ($_POST['edadinic']);  
} else {
    $resid = '';
}
?>
<form name="formularioDatos" method="post" action="">
<table>
<tr><td>Ingrese la edad Inicial</td><td><input type="text" name="edadinic"  value="<?php echo ($resid) ?>"  ></td></tr>
<tr><td>Ingrese la edad Final</td><td><input type="text"  name="edadfin" value="<?php echo ($resnom) ?>"  ></td></tr>
</table>
<input value="Buscar" type="submit" name="busqueda"/>
<input value="Limpiar" type="reset" meta http-equiv="refresh" content="2" />

</form>

<?php

if(isset($_POST['busqueda']))
{
    $edadinic = $_POST['edadinic']; 
    $edadfin = $_POST['edadfin']; 
    
    if($edadinic>$edadfin){
        ?>

        <script language="javascript">alert("Error: La edad inicial no puede ser mayor que la edad final");</script>
    
        <?php
    }else{

    $sql1 = "SELECT dieta.nombred, menu.comida, alimentos.alimento, alimentos.porcion FROM paciente,die_paci,menu,alimentos,dieta WHERE edadp BETWEEN $resid and $resnom
    and die_paci.idp=paciente.idp and die_paci.idd=dieta.idd and menu.idd=dieta.idd and menu.idm=alimentos.idm"; 
     $res1=mysqli_query($con,$sql1);
     
     ?>
        <table border="4">
 
 
 
 <tr><th>Nombre de la Dieta</th><th>Comida</th><th>Alimento</th><th>Porcion</th></tr>
     <?php
     while($registro2=mysqli_fetch_assoc($res1))   
     {
         ?>
  
 <tr><td><?php echo $registro2['nombred'] ?></td><td><?php echo $registro2['comida'] ?></td><td><?php echo $registro2['alimento'] ?></td><td><?php echo $registro2['porcion'] ?></td></tr>
 <?php }}?>
 </table>
 

         <?php
   

}

?>
</center>
</body>

</html>
   
    