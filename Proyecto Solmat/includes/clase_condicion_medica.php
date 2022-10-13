<?php

class condicion{
private $id_condicion;
private $nom_condicion;
private $descri_condicion;

private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
$sql="select * from condicion_medica";
$res=mysqli_query($this->conexion,$sql);
$html='<center>
            <table border="2">
                <tr>
                     <th colspan="5"><a href="condicion_medica.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="5"> Listado de Condiciones </th>
                </tr>
                <tr>
                    <th> Codigo de la condicion </th>
                    <td><image src="images/espacio.png" width="30" height="30">
                    <th> Nombre de la condicion </th>
                    <td><image src="images/espacio.png" width="30" height="30">
                    <th> Descripcion de la condicion </th>
                   
                          </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_condicion'].' </td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['nom_condicion'].'</td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['descri_condicion'].'</td>
                <td><a href="condicion_medica.php?op=actualizar&idd='.$registro['id_condicion'].'"><img src="images/actualizar.png" height="50" width="50"></a>
                <a href="condicion_medica.php?op=eliminar&ide='.$registro['id_condicion'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                </td>
                </tr> '; 
}
                
$html.='     </table>

       </center>';
return $html;
}

public function insertar($variable)
{ 
    if($variable==null){
        $this->id_condicion=null;
        $this->nom_condicion=null;
        $this->descri_condicion=null;
    
        }
        else 
        {
            $consulta="Select * from condicion_medica where id_condicion=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_condicion=$lista['id_condicion'];
            $this->nom_condicion=$lista['nom_condicion'];
            $this->descri_condicion=$lista['descri_condicion'];

        }
    
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="id" value="'.$this->id_condicion.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nom" value="'.$this->nom_condicion.'"></td></tr>
<tr><td>DESCRIPCION</td><td><input type="text" name="descri" value="'.$this->descri_condicion.'"></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Ingresar"></td></tr>

</form>
</table>
</center>';
return $html;
}
public function grabar()
{
    $this->id_condicion=$_POST['id'];
    $this->nom_condicion=$_POST['nom'];
    $this->descri_condicion=$_POST['descri'];



    $sql=($this->id_condicion==null)?"insert into condicion_medica values (null,'$this->nom_condicion','$this->descri_condicion')":
    "update condicion_medica set nom_condicion='$this->nom_condicion',descri_condicion='$this->descri_condicion' where id_condicion=$this->id_condicion";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from condicion_medica where id_condicion=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}



}

?>