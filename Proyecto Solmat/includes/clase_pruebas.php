<?php

class pruebas{
private $id_pruebas;
private $nom_pruebas;
private $descri_pruebas;

private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
$sql="select * from pruebas";
$res=mysqli_query($this->conexion,$sql);
$html='<center>
            <table border="2">
                <tr>
                     <th colspan="5"><a href="pruebas.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="5"> Listado de pruebas </th>
                </tr>
                <tr>
                    <th> Codigo de la pruebas </th><td><image src="images/espacio.png" width="30" height="30">
                    <th> Nombre de la pruebas </th><td><image src="images/espacio.png" width="30" height="30">
                    <th> Descripcion de la pruebas </th>
                          </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_prueba'].' </td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['nom_prueba'].'</td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['descri_prueba'].'</td>
                <td><a href="pruebas.php?op=actualizar&idd='.$registro['id_prueba'].'"><img src="images/actualizar.png" height="50" width="50"></a>
                <a href="pruebas.php?op=eliminar&ide='.$registro['id_prueba'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                </td>
                </tr> '; 
}
                
$html.='     </table>

       </center>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>';
return $html;
}

public function insertar($variable)
{ 
    if($variable==null){
        $this->id_pruebas=null;
        $this->nom_pruebas=null;
        $this->descri_pruebas=null;
    
        }
        else 
        {
            $consulta="Select * from pruebas where id_prueba=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_pruebas=$lista['id_prueba'];
            $this->nom_pruebas=$lista['nom_prueba'];
            $this->descri_pruebas=$lista['descri_prueba'];

        }
    
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="id" value="'.$this->id_pruebas.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nom" value="'.$this->nom_pruebas.'"></td></tr>
<tr><td>DESCRIPCION</td><td><input type="text" name="descri" value="'.$this->descri_pruebas.'"></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Ingresar" id="Ejecutar"></td></tr>

</form>
</table>
</center>
<br>
<br>
';
return $html;
}
public function grabar()
{
    $this->id_pruebas=$_POST['id'];
    $this->nom_pruebas=$_POST['nom'];
    $this->descri_pruebas=$_POST['descri'];



    $sql=($this->id_pruebas==null)?"insert into pruebas values (null,'$this->nom_pruebas','$this->descri_pruebas')":
    "update pruebas set nom_pruebas='$this->nom_pruebas',descri_pruebas='$this->descri_pruebas' where id_pruebas=$this->id_pruebas";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from pruebas where id_prueba=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}



}

?>