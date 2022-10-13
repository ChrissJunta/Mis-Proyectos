<?php

class representante{
private $id_representante;
private $nom_representante;
private $ape_representante;
private $cedula_representante;
private $tlf_representante;
private $dir_representante;
private $correo_representante;


private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
$sql="select * from representante";
$res=mysqli_query($this->conexion,$sql);
$html='<center>
            <table border="2">
                <tr>
                     <th colspan="5"><a href="representante.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="5"> Listado de Representantes </th>
                </tr>
                <tr>
                    <th> Codigo representante </th><td><image src="images/espacio.png" width="30" height="30">
                    <th>  Nombre representante </th><td><image src="images/espacio.png" width="30" height="30">
                    <th>  Cedula representante </th>
                </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_representante'].' </td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['nom_representante'].' '.$registro['ape_representante'].'</td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['cedula_representante'].'</td>
                <td><a href="representante.php?op=actualizar&idd='.$registro['id_representante'].'"><img src="images/actualizar" height="50" width="50"></a>
                <a href="representante.php?op=eliminar&ide='.$registro['id_representante'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                <a href="representante.php?op=detalle&idde='.$registro['id_representante'].'"><img src="images/detalle.png" height="50" width="50"></a>
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
        $this->id_representante=null;
        $this->nom_representante=null;
        $this->ape_representante=null;
        $this->cedula_representante=null;
        $this->tlf_representante=null;
        $this->dir_representante=null;
        $this->correo_representante=null;
    
        }
        else 
        {
            $consulta="Select * from representante where id_representante=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_representante=$lista['id_representante'];
            $this->nom_representante=$lista['nom_representante'];
            $this->ape_representante=$lista['ape_representante'];
            $this->cedula_representante=$lista['cedula_representante'];
            $this->tlf_representante=$lista['tlf_representante'];
            $this->dir_representante=$lista['dir_representante'];
            $this->correo_representante=$lista['correo_representante'];

        }
    
$html='<center>
<table border="2">
<form method="POST" >
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="id" value="'.$this->id_representante.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nom" value="'.$this->nom_representante.'"></td></tr>
<tr><td>APELLIDO</td><td><input type="text" name="ape" value="'.$this->ape_representante.'"></td></tr>
<tr><td>NUMERO DE CEDULA: </td><td><input type="text" name="cedula" value="'.$this->cedula_representante.'"></td></tr>
<tr><td>TELEFONO:</td><td><input type="text" name="tlf" value="'.$this->tlf_representante.'"></td></tr>
<tr><td>DIRECCION DOMICILIARIO</td><td><input type="text" name="direc" value="'.$this->dir_representante.'"></td></tr>
<tr><td>CORREO ELECTRONICO</td><td><input type="text" name="correo" value="'.$this->correo_representante.'"></td></tr>
<tr><td colspan=2 align="center"><input type="submit" name="Ingresar"></td></tr>

</form>
</table>
</center>';
return $html;
}
public function grabar()
{
    $this->id_representante=$_POST['id'];
    $this->nom_representante=$_POST['nom'];
    $this->ape_representante=$_POST['ape'];
    $this->cedula_representante=$_POST['cedula'];
    $this->tlf_representante=$_POST['tlf'];
    $this->dir_representante=$_POST['direc'];
    $this->correo_representante=$_POST['correo'];



    $sql=($this->id_representante==null)?"insert into representante values (null,'$this->cedula_representante','$this->nom_representante','$this->ape_representante','$this->tlf_representante','$this->dir_representante','$this->correo_representante')":
    "update representante set cedula_representante='$this->cedula_representante',nom_representante='$this->nom_representante',ape_representante='$this->ape_representante'
    ,tlf_representante='$this->tlf_representante',dir_representante='$this->dir_representante',correo_representante='$this->correo_representante' where id_representante=$this->id_representante";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from representante where id_representante=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function ver_detalle($s)
	    {
		    $sql="select * from representante where id_representante=$s";
		    $res=mysqli_query($this->conexion, $sql);
		    while ($registro=$res->fetch_assoc()) 
		    {
			    $html='<center><table border=1><br>
                <tr>
                    <th>
                    Id:
                    </th>
                
                    <td>
                        '.$registro['id_representante'].'
                    </td>
                </tr>
                
                <tr>
                    <th>
                    Nombre:           
                    </th>
                     <td>
                            '.$registro['nom_representante'].' '.$registro['ape_representante'].'
                       
                    </td>
                </tr>

                               
                <tr>
                    <th>
                            Cedula:
                                   </th>
                    
                    <td>
                            '.$registro['cedula_representante'].'
                                   </td>
                </tr>
                
                <tr>
                    <th>
                            Direccion:
                    </th>
                
                    <td>
                            '.$registro['dir_representante'].'
                    </td>
                </tr>

                <tr>
                    <th>
                            Telefono:
                                   </th>
                    
                    <td>
                            '.$registro['tlf_representante'].'
                                   </td>
                </tr>

                <tr>
                    <th>
                            Correo Electronico:
                                   </th>
                
                    <td>
                            '.$registro['correo_representante'].'
                        </font>
                    </td>
                </tr>

                <a href="representante.php">
                    <img src="images/regresar.png" width="50" height="50">
                </a>';
		    }
		    $html.='</table></center><br>';
		    return $html;
	    }


}

?>