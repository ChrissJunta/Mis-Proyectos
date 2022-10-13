<?php

class valoracion{
private $id_valoracion;
private $id_prueba;
private $id_paciente;
private $id_docente;
private $fecha_valoracion;
private $obs_valoracion;
private $avance_cualitativo;
private $avance_cuantitativo;
private $nom_paciente;
private $ape_paciente;



private $conexion;
public function __construct($conex)
{
    $this->conexion=$conex;

}
public function listado()
{
    $sql="select * from paciente";
    $res=mysqli_query($this->conexion,$sql);
    $html='<center>
                <table border="2">
               
                        
                    <tr>
                        <th colspan="6"> Listado de pacientes </th>
                    </tr>
                    <tr>
                        <th> Codigo paciente </th> <th></th>
                        <th>  Nombre paciente </th><th></th>
                        <th>  Observacion paciente </th><th></th>
                    </tr>';
    while($registro=$res->fetch_assoc())
    {
    $html.='        <tr>
                    <td>'.$registro['id_paciente'].' </td><td><image src="images/espacio.png" width="30" height="30"></td>
                    <td>'.$registro['nom_paciente'].' '.$registro['ape_paciente'].'</td><td><image src="images/espacio.png" width="30" height="30"></td>
                    <td>'.$registro['obs_clinica_paciente'].'</td>';
                                      
                    
   $html.='                <td><a href="valoracion.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></td>                
                       
                            <td><a href="valoracion.php?op=detalle&idde='.$registro['id_paciente'].'"><img src="images/detalle.png" height="50" width="50"></a></td>
                    
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
        $this->id_valoracion=null;
        $this->id_prueba=null;
        $this->id_paciente=$_SESSION['paciente'];
        $this->id_docente=null;
        $this->fecha_valoracion=null;
        $this->obs_valoracion=null;
        $this->avance_cualitativo=null;
        $this->avance_cuantitativo=null;
        $this->nom_paciente=null;
        $this->ape_paciente=null;
    }
    else
    {

            $consulta="Select valoracion.*,nom_paciente,ape_paciente from valoracion,paciente where 
            paciente.id_paciente=valoracion.id_paciente and paciente.id_paciente=$variable";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_valoracion=$lista['id_valoracion'];
            $this->id_prueba=$lista['id_prueba'];
            $this->id_paciente=$lista['id_paciente'];
            $this->id_docente=$lista['id_docente'];
            $this->fecha_valoracion=$lista['fecha_valoracion'];
            $this->obs_valoracion=$lista['obs_valoracion'];
            $this->avance_cualitativo=$lista['avance_cualitativo'];
            $this->avance_cuantitativo=$lista['avance_cuantitativo'];
            $this->nom_paciente=$lista['nom_paciente'];
            $this->ape_paciente=$lista['ape_paciente'];

    }
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID VALORACION</td><td><input type="hidden" name="val" value="'.$this->id_valoracion.'"></td></tr>
<tr><td>ID DE PRUEBA</td><td>'.$this->cargarcampos("pruebas","id_prueba","nom_prueba","prueba").'</td></tr>
<tr><td>NOMBRE PACIENTE</td><td><input type="text" name="nomp" value="'.$this->id_paciente.'"></td></tr>
<tr><td>DOCENTE:</td><td>'.$this->cargar("docente", "id_docente", "nom_docente","ape_docente","docente").'</td></tr>
<tr><td>FECHA: </td><td><input type="date" name="fechap" value="'.$this->fecha_valoracion.'"></td></tr>
<tr><td>OBSERVACION:</td><td><input type="text" name="observacionp" value="'.$this->obs_valoracion.'"></td></tr>
<tr><td>AVANCE CUALITATIVO</td><td><input type="text" name="acu" value="'.$this->avance_cualitativo.'"></td></tr>
<tr><td>AVANCE CUANTITATIVO</td><td><input type="text" name="acun" value="'.$this->avance_cuantitativo.'"></td></tr>
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
    $this->id_valoracion=$_POST['val'];
    $this->id_prueba=$_POST['prueba'];
    $this->id_paciente=$_POST['nomp'];
    $this->id_docente=$_POST['docente'];
    $this->fecha_valoracion=$_POST['fechap'];
    $this->obs_valoracion=$_POST['observacionp'];
    $this->avance_cualitativo=$_POST['acu'];
    $this->avance_cuantitativo=$_POST['acun'];

    $sql=($this->id_valoracion==null)?"insert into valoracion values (null,$this->id_prueba,$this->id_paciente,$this->id_docente,'$this->fecha_valoracion','$this->obs_valoracion'
    ,'$this->avance_cualitativo',$this->avance_cuantitativo)":"update valoracion set id_prueba=$this->id_prueba,id_paciente=$this->id_paciente,id_docente=$this->id_docente,fecha_valoracion='$this->fecha_valoracion',
    obs_valoracion='$this->obs_valoracion',avance_cualitativo='$this->avance_cualitativo',avance_cuantitativo=$this->avance_cuantitativo
    where id_valoracion=$this->id_valoracion";

    
    if($this->conexion->query($sql))
    {
    echo "datos ingresados";
    session_destroy();
    }
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from valoracion where id_prueba=$variable;");

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}
    public function cargar($t,$c,$n,$c2,$nom)
	{
		$sql="SELECT $c, $n , $c2 FROM $t";
		$res=$this->conexion->query($sql);
		$miselect='<select name="'.$nom.'">';
		while($registro=$res->fetch_assoc())
		{
            $miselect.='
            <option value=""></option>
            <option value="'.$registro[$c].'">'.$registro[$n].' '.$registro[$c2].'</option>';
		}
		$miselect.='</select>';
		return $miselect;
	}
    public function cargarcampos($t,$c,$n,$nom)
	{
		$sql="SELECT $c , $n  FROM $t";
		$res=$this->conexion->query($sql);
		$miselect='<select name="'.$nom.'">';
		while($registro=$res->fetch_assoc())
		{
            $miselect.='
            <option value=""></option>
            <option value="'.$registro[$c].'">'.$registro[$n].'</option>';
		}
		$miselect.='</select>';
		return $miselect;
	}
    public function ver_detalle($s)
	{
     
    $sql1="select * from valoracion,paciente where paciente.id_paciente=valoracion.id_paciente and valoracion.id_paciente=$s";
    $res1=mysqli_query($this->conexion,$sql1);
    while($registro1=$res1->fetch_assoc())
    {
    $html='<center>

 
                    <br>
     
                    <table border="2">
                    <tr> <th colspan="8"> <a href="valoracion.php">
                    <img src="images/regresar.png" width="50" height="50">
                    </a> </th>
                    </tr>
                    <tr>
                        <th colspan="8"> Valoraciones </th>
                    </tr>
                    <tr><th colspan="8">'.$registro1['nom_paciente'].' '.$registro1['ape_paciente'].'</th></tr>
                    <tr><td><image src="images/espacio.png" width="30" height="30"></td></tr>
                    <tr>   <br>            ';
                }
            

    $html.='            <th> Fecha </th><td><image src="images/espacio.png" width="30" height="30">
                        <th> Observaciones </th><td><image src="images/espacio.png" width="30" height="30">
                        <th> Avance cualitativo </th><td><image src="images/espacio.png" width="30" height="30">
                        <th> Avance cuantitativo </th><td><image src="images/espacio.png" width="30" height="30">
                    </tr>';
                    $sql="select * from valoracion,paciente where paciente.id_paciente=valoracion.id_paciente and valoracion.id_paciente=$s";
                    $res=mysqli_query($this->conexion,$sql);
            while($registro=$res->fetch_assoc())
                 {
                     $html.='<tr>
                    <td>'.$registro['fecha_valoracion'].' </td><td><image src="images/espacio.png" width="30" height="30">
                    <td>'.$registro['obs_valoracion'].' </td><td><image src="images/espacio.png" width="30" height="30">
                    <td>'.$registro['avance_cualitativo'].'</td><td><image src="images/espacio.png" width="30" height="30">
                    <td>'.$registro['avance_cuantitativo'].'</td><td><image src="images/espacio.png" width="30" height="30">
                   
                    <td><a href="valoracion.php?op=actualizar&idd='.$registro['id_paciente'].'"><img src="images/actualizar" height="50" width="50"></a>
                    <a href="valoracion.php?op=eliminar&ide='.$registro['id_paciente'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                    <a href="valoracion.php?op=detalle&idde='.$registro['id_paciente'].'"><img src="images/detalle.png" height="50" width="50"></a>
                    </td>
                    </tr> '; 
                }

         $html.=' </table> </center> <br>';
             return $html;
                }

               
            
}

?>
