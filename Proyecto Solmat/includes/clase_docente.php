<?php

class docente{
private $id_docente;
private $nom_docente;
private $ape_docente;
private $cedula_docente;
private $direc_docente;
private $tlf_docente;
private $correo_docente;


private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
$sql="select * from docente";
$res=mysqli_query($this->conexion,$sql);
$html='<center>
            <table border="2">
                <tr>
                     <th colspan="5"><a href="docente.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="5"> Listado de docentes </th>
                </tr>
                <tr>
                    <th> Codigo docente </th><td><image src="images/espacio.png" width="30" height="30">
                    <th>  Nombre docente </th><td><image src="images/espacio.png" width="30" height="30">
                    <th>  Telefono docente </th>
                </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_docente'].' </td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['nom_docente'].' '.$registro['ape_docente'].'</td><td><image src="images/espacio.png" width="30" height="30">
                <td>'.$registro['tlf_docente'].'</td>
                <td><a href="docente.php?op=actualizar&idd='.$registro['id_docente'].'"><img src="images/actualizar.png" height="50" width="50"></a>
                <a href="docente.php?op=eliminar&ide='.$registro['id_docente'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                <a href="docente.php?op=detalle&idde='.$registro['id_docente'].'"><img src="images/detalle.png" height="50" width="50"></a>
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
        $this->id_docente=null;
        $this->nom_docente=null;
        $this->ape_docente=null;
        $this->cedula_docente=null;
        $this->direc_docente=null;
        $this->tlf_parto_docente=null;
        $this->correo_docente=null;
 
    
        }
        else 
        {
            $consulta="Select * from docente where id_docente=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_docente=$lista['id_docente'];
            $this->nom_docente=$lista['nom_docente'];
            $this->ape_docente=$lista['ape_docente'];
            $this->cedula_docente=$lista['cedula_docente'];
            $this->direc_docente=$lista['direc_docente'];
            $this->tlf_docente=$lista['tlf_docente'];
            $this->correo_docente=$lista['correo_docente'];

        }
    
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="id" value="'.$this->id_docente.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nom" value="'.$this->nom_docente.'"></td></tr>
<tr><td>APELLIDO</td><td><input type="text" name="ape" value="'.$this->ape_docente.'"></td></tr>
<tr><td>NUMERO DE CEDULA: </td><td><input type="text" name="cedula" value="'.$this->cedula_docente.'"></td></tr>
<tr><td>DIRECCION:</td><td><input type="text" name="direccion" value="'.$this->direc_docente.'"></td></tr>
<tr><td>TELEFONO:</td><td><input type="text" name="telefono" value="'.$this->tlf_docente.'"></td></tr>
<tr><td>CORREO ELECTRONICO</td><td><input type="text" name="correo" value="'.$this->correo_docente.'"></td></tr>

<tr><td colspan=2 align="center"><input type="submit" name="Ingresar"></td></tr>

</form>
</table>
</center>
<br>
<br>';
return $html;
}
public function grabar()
{
    $this->id_docente=$_POST['id'];
    $this->nom_docente=$_POST['nom'];
    $this->ape_docente=$_POST['ape'];
    $this->cedula_docente=$_POST['cedula'];
    $this->direc_docente=$_POST['direccion'];
    $this->tlf_docente=$_POST['telefono'];
    $this->correo_docente=$_POST['correo'];
 



    $sql=($this->id_docente==null)?"insert into docente values (null,'$this->nom_docente','$this->ape_docente','$this->cedula_docente','$this->direc_docente','$this->tlf_docente'
    ,'$this->correo_docente')":
    "update docente set nom_docente='$this->nom_docente',ape_docente='$this->ape_docente',cedula_docente='$this->cedula_docente',direc_docente='$this->direc_docente',tlf_docente='$this->tlf_docente'
    ,correo_docente='$this->correo_docente'";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from docente where id_docente=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}
    public function ver_detalle($s)
	    {
		    $sql="select * from docente where id_docente=$s";
		    $res=mysqli_query($this->conexion, $sql);
		    while ($registro=$res->fetch_assoc()) 
		    {
			    $html='<center><table border=1><br>
                <tr>
                    <th>
                    Id:
                    </th>
                
                    <td>
                        '.$registro['id_docente'].'
                    </td>
                </tr>
                
                <tr>
                    <th>
                    Nombre:           
                    </th>
                     <td>
                            '.$registro['nom_docente'].' '.$registro['ape_docente'].'
                       
                    </td>
                </tr>

                               
                <tr>
                    <th>
                            Cedula:
                                   </th>
                    
                    <td>
                            '.$registro['cedula_docente'].'
                                   </td>
                </tr>
                <tr>
                <th>
                        Direccion Domiciliaria:
                               </th>
                
                <td>
                        '.$registro['direc_docente'].'
                               </td>
            </tr>
                <tr>
                    <th>
                        Telefono:
                    </th>
                
                    <td>
                            '.$registro['tlf_docente'].'
                    </td>
                </tr>

                <tr>
                    <th>
                        Correo Electronico:
                                   </th>
                    
                    <td>
                            '.$registro['correo_docente'].'
                                   </td>
                </tr>

                

                <a href="docente.php">
                    <img src="images/regresar.png" width="50" height="50">
                </a>';
		    }
		    $html.='</table></center><br>';
		    return $html;
	    }


}

?>
