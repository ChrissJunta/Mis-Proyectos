<?php

class recurso{
private $id_recurso;
private $nom_recurso;
private $tipo_recurso;
private $ref_recurso;

private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
$sql="select * from recursos";
$res=mysqli_query($this->conexion,$sql);
$html='<center>
            <table border="2">
                <tr>
                     <th colspan="4"><a href="recurso.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="4"> Listado de recurso </th>
                </tr>
                <tr>
                    <th> Codigo de recurso </th>
                    <th> Nombre de recurso </th>
                    <th> Tipo de recurso </th>
                    <th> Link de recurso </th>
                          </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_recurso'].' </td>
                <td>'.$registro['nom_recurso'].'</td>
                <td>'.$registro['tipo_recurso'].'</td>
                <td>'.$registro['ref_recurso'].'</td>
                <td><a href="recurso.php?op=actualizar&idd='.$registro['id_recurso'].'"><img src="images/actualizar.png" height="50" width="50"></a>
                <a href="recurso.php?op=eliminar&ide='.$registro['id_recurso'].'"><img src="images/eliminar.png" height="50" width="50"></a>
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
        $this->id_recurso=null;
        $this->nom_recurso=null;
        $this->tipo_recurso=null;
        $this->ref_recurso=null;
    
        }
        else 
        {
            $consulta="Select * from recursos where id_recurso=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_recurso=$lista['id_recurso'];
            $this->nom_recurso=$lista['nom_recurso'];
            $this->tipo_recurso=$lista['tipo_recurso'];
            $this->tipo_recurso=$lista['ref_recurso'];

        }
    
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="id" value="'.$this->id_recurso.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nom" value="'.$this->nom_recurso.'"></td></tr>
<tr><td>TIPO</td><td><input type="text" name="tipo" value="'.$this->tipo_recurso.'"></td></tr>
<tr><td>REFERENCIA</td><td><input type="text" name="refe" value="'.$this->ref_recurso.'"></td></tr>
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
    $this->id_recurso=$_POST['id'];
    $this->nom_recurso=$_POST['nom'];
    $this->tipo_recurso=$_POST['tipo'];
    $this->ref_recurso=$_POST['refe'];



    $sql=($this->id_recurso==null)?"insert into recursos values (null,'$this->nom_recurso','$this->tipo_recurso','$this->ref_recurso')":
    "update recursos set nom_recurso='$this->nom_recurso',tipo_recurso='$this->tipo_recurso' where id_recurso=$this->id_recurso";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from recursos where id_recurso=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}



}

?>