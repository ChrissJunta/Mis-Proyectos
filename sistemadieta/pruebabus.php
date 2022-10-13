
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
<tr><td>Ingrese la edad</td><td><input type="text" required  name="edadp" value="<?php echo ($resedad) ?>"></td></tr>
<tr><td>Ingrese el peso</td><td><input type="text" required  name="pesop" id="pesop" value="<?php echo ($respeso) ?>"></td></tr>
<tr><td>Ingrese el estatura</td><td><input type="text" required  name="estaturap"  id="estaturap" value="<?php echo ($resesta) ?>"></td></tr>
<tr><td>Ingrese Indice Masa Corporal</td><td><input type="text" required  name="imcp"  id="imcp" readonly value="<?php echo round($res,2) ?>"></td><td><input type="submit" name="button" id="button" value="Calcular" /></td> </tr>
<tr><td>Ingrese el genero</td><td><select name="generop" value="<?php echo ($resgene) ?>">
<option value="" ></option>
<option value="Masculino" >Masculino</option>
<option value="Femenino">Femenino</option></select></td></tr>
<tr><td>Ingrese Enfermedades</td><td><input type="text" required  name="enfermedadesp" value="<?php echo ($resenfer) ?>" ></td></tr>
<tr><td>Ingrese Alergias</td><td><input type="text" required  name="alergiasp" value="<?php echo ($resaler) ?>"></td></tr>

</table>
<button value="Buscar" type="submit" name="busqueda">Buscar</button>
<input value="Limpiar" type="reset" />
<input value="Salir" type="button" onclick="window.location.href= 'main.php'"  />
</form>
<?php
if(isset($_POST['ingreso']))
{
    $idp = $_POST['idp']; 
    $nombresp = $_POST['nombresp']; 
    $edadp = $_POST['edadp'];   
    $generop = $_POST['generop']; 
    $estaturap = $_POST['estaturap'];  
    $pesop = $_POST['pesop']; 
    $imcp = $_POST['imcp'];   
    $enfermedadesp = $_POST['enfermedadesp']; 
    $alergiasp = $_POST['alergiasp']; 
    
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
<?php

if(isset($_POST['busqueda']))
{
   
    $edadp = $_POST['edadp'];   
    $generop = $_POST['generop']; 
    $estaturap = $_POST['estaturap'];  
    $pesop = $_POST['pesop']; 
    $imcp = $_POST['imcp'];   
    $enfermedadesp = $_POST['enfermedadesp']; 
    $alergiasp = $_POST['alergiasp']; 

    $_SESSION['ingresoedad']=$edadp;
    $_SESSION['ingresogenero']=$generop;
    $_SESSION['ingresoestatura']=$estaturap;
    $_SESSION['ingresopeso']=$pesop;
    $_SESSION['ingresouimcp']=$imcp;
    $_SESSION['ingresoenfermedades']=$enfermedadesp;
    $_SESSION['ingresoalergias']=$alergiasp;
 
    $sql = "SELECT dieta.nombred, menu.comida, alimentos.alimento, alimentos.porcion, die_paci.resultado FROM paciente,die_paci,menu,alimentos,dieta WHERE edadp=$edadp AND generop='$generop' AND estaturap=$estaturap AND pesop= $pesop AND imcp=$imcp
     AND enfermedadesp='$enfermedadesp' AND alergiasp='$alergiasp' and die_paci.idp=paciente.idp 
     and die_paci.idd=dieta.idd and menu.idd=dieta.idd and menu.idm=alimentos.idm group by dieta.nombred"; 
    $result= mysqli_query($con,$sql); 
    $totalFilas    =    mysqli_num_rows($result);
    if($totalFilas == 0){
        ?>
        <script language="javascript">alert("La dieta no existe");
        window.location='paginain.php';
        </script>
        
        <?php
        

    }else{
        
    
    while($impresion=mysqli_fetch_assoc($result))
    {
        ?>
    <table border="2">



<tr><th>Dieta</th><th>Resultado</th></tr>
<tr><td><?php echo $impresion['nombred'] ?></td><td><?php echo $impresion['resultado'] ?></td></tr>

</table>




        <?php
    }

    $sql1 = "SELECT menu.comida, alimentos.alimento, alimentos.porcion,dieta.nombred, die_paci.resultado FROM paciente,die_paci,menu,alimentos,dieta WHERE edadp=$edadp AND generop='$generop' AND estaturap=$estaturap AND pesop= $pesop AND imcp=$imcp
    AND enfermedadesp='$enfermedadesp' AND alergiasp='$alergiasp' and die_paci.idp=paciente.idp 
    and die_paci.idd=dieta.idd and menu.idd=dieta.idd and menu.idm=alimentos.idm group by alimentos.alimento order by menu.comida DESC"; 
     $res1=mysqli_query($con,$sql1);
     
     ?>
        <table border="4">
 
 
 
 <tr><th>Comida</th><th>Alimento</th><th>Porcion</th></tr>
     <?php
     while($registro2=mysqli_fetch_assoc($res1))   
     {
         ?>
  
 <tr><td><?php echo $registro2['comida'] ?></td><td><?php echo $registro2['alimento'] ?></td><td><?php echo $registro2['porcion'] ?></td></tr>
 <?php }}?>
 </table>
 
         <?php
   

}

?>
</center>
</body>

</html>
   
    
    
    
 