<?php

class paciente{
private $id_paciente;
private $nom_paciente;
private $ape_paciente;
private $fecha_nac_paciente;
private $tipo_parto_paciente;
private $talla_paciente;
private $peso_paciente;
private $id_representante;
private $id_condicion;
private $obs_clinica_paciente;


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
                     <th colspan="5"><a href="paciente.php?op=nueva"><img src="images/agregar.png" height="50" width="50"></a></th>
                  </tr>
                <tr>
                    <th colspan="5"> Listado de pacientes </th>
                </tr>
                <tr>
                    <th> Codigo paciente </th><td><image src="images/espacio.png" width="30" height="30"></td>
                    <th>  Nombre paciente </th><td><image src="images/espacio.png" width="30" height="30"></td>
                    <th>  Observacion paciente </th>
                </tr>';
while($registro=$res->fetch_assoc())
{
$html.='        <tr>
                <td>'.$registro['id_paciente'].' </td><td><image src="images/espacio.png" width="30" height="30"></td>
                <td>'.$registro['nom_paciente'].' '.$registro['ape_paciente'].'</td><td><image src="images/espacio.png" width="30" height="30"></td>
                <td>'.$registro['obs_clinica_paciente'].'</td>';
                $_SESSION['paciente']=$registro['id_paciente'];
                
 $html.='       <td><a href="paciente.php?op=actualizar&idd='.$registro['id_paciente'].'"><img src="images/actualizar" height="50" width="50"></a>
                <a href="paciente.php?op=eli&ide='.$registro['id_paciente'].'"><img src="images/eliminar.png" height="50" width="50"></a>
                <a href="paciente.php?op=detalle&idde='.$registro['id_paciente'].'"><img src="images/detalle.png" height="50" width="50"></a>
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
        $this->id_paciente=null;
        $this->nom_paciente=null;
        $this->ape_paciente=null;
        $this->fech_nac_paciente=null;
        $this->edad_paciente=null;
        $this->tipo_parto_paciente=null;
        $this->talla_paciente=null;
        $this->peso_paciente=null;
        $this->id_representante=null;
        $this->id_condicion=null;
        $this->obs_clinica_paciente=null;
    
        }
        else 
        {
            $consulta="Select * from paciente where id_paciente=$variable;";
            $resultado=$this->conexion->query($consulta);
            $lista=$resultado->fetch_assoc();
            $this->id_paciente=$lista['id_paciente'];
            $this->nom_paciente=$lista['nom_paciente'];
            $this->ape_paciente=$lista['ape_paciente'];
            $this->fech_nac_paciente=$lista['fech_nac_paciente'];
            $this->edad_paciente=$lista['edad_paciente'];
            $this->tipo_parto_paciente=$lista['tipo_parto_paciente'];
            $this->talla_paciente=$lista['talla_paciente'];
            $this->peso_paciente=$lista['peso_paciente'];
            $this->obs_clinica_paciente=$lista['obs_clinica_paciente'];
            $this->id_representante=$lista['id_representante'];
            $this->id_condicion=$lista['id_condicion'];
        }
    
$html='<center>
<table border="2">
<form method="POST">
<tr><th colspan=2>INGRESO</th></tr><br>
<tr><td>ID</td><td><input type="hidden" name="idp" value="'.$this->id_paciente.'"></td></tr>
<tr><td>NOMBRE</td><td><input type="text" name="nomp" value="'.$this->nom_paciente.'"></td></tr>
<tr><td>APELLIDO</td><td><input type="text" name="apep" value="'.$this->ape_paciente.'"></td></tr>
<tr><td>FECHA NACIMIENTO: </td><td><input type="date" name="fechap" value="'.$this->fecha_nac_paciente.'"></td></tr>
<tr><td>EDAD:</td><td><input type="text" name="edadp" value="'.$this->edad_paciente.'"></td></tr>
<tr><td>TIPO PARTO:</td><td><input type="text" name="partop" value="'.$this->tipo_parto_paciente.'"></td></tr>
<tr><td>TALLA</td><td><input type="text" name="tallap" value="'.$this->talla_paciente.'"></td></tr>
<tr><td>PESO</td><td><input type="text" name="pesop" value="'.$this->peso_paciente.'"></td></tr>
<tr><td>NOMBRE REPRESENTANTE:</td><td>'.$this->cargar("representante", "id_representante", "nom_representante","ape_representante", "representante").'</td></tr><tr>
<tr><td>CONDICION MEDICA</td><td>'.$this->cargarcampos("condicion_medica", "id_condicion", "nom_condicion","condicion").'</td></tr><tr>
<tr><td>OBSERVACION CLINICA</td><td><textarea name="observacionp" value="'.$this->obs_clinica_paciente.'"></textarea></td></tr>
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
    $this->id_paciente=$_POST['idp'];
    $this->nom_paciente=$_POST['nomp'];
    $this->ape_paciente=$_POST['apep'];
    $this->fech_nac_paciente=$_POST['fechap'];
    $this->edad_paciente=$_POST['edadp'];
    $this->tipo_parto_paciente=$_POST['partop'];
    $this->talla_paciente=$_POST['tallap'];
    $this->peso_paciente=$_POST['pesop'];
    $this->obs_clinica_paciente=$_POST['observacionp'];
    $this->id_representante=$_POST['representante'];
    $this->id_condicion=$_POST['condicion'];



    $sql=($this->id_paciente==null)?"insert into paciente values (null,'$this->nom_paciente','$this->ape_paciente','$this->fech_nac_paciente','$this->edad_paciente','$this->tipo_parto_paciente'
    ,'$this->talla_paciente','$this->peso_paciente','$this->obs_clinica_paciente','$this->id_representante','$this->id_condicion')":
    "update paciente set nom_paciente='$this->nom_paciente',ape_paciente='$this->ape_paciente',fech_nac_paciente='$this->fech_nac_paciente',edad_paciente='$this->edad_paciente',tipo_parto_paciente='$this->tipo_parto_paciente'
    ,talla_paciente='$this->talla_paciente',peso_paciente='$this->peso_paciente',obs_clinica_paciente='$this->obs_clinica_paciente',id_representante='$this->id_representante',id_condicion='$this->id_condicion' where id_paciente=$this->id_paciente";

    
    if($this->conexion->query($sql))
    echo "datos ingresados";
    else 
    echo "no se ingreso";
}

public function eliminar($variable)
{
   

    $sql=("delete from paciente where id_paciente=$variable;");

    
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
		$sql="SELECT $c, $n  FROM $t";
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
		    $sql=("CALL ver_detalle($s)");
		    $res=mysqli_query($this->conexion, $sql);
		    while ($registro=$res->fetch_assoc()) 
		    {
			    $html='<center><table border=1><br>
                <tr>
                    <th> Id:</th><td>'.$registro['id_paciente'].'</td>
                </tr>
                <tr>
                    <th>Nombre:</th><td>'.$registro['nom_paciente'].' '.$registro['ape_paciente'].'</td>
                </tr>                             
                <tr>
                    <th>Fecha de Nacimiento:</th><td>'.$registro['fech_nac_paciente'].'</td>
                </tr>
                <tr>
                <th>Edad:</th><td>'.$registro['edad_paciente'].'</td>
                 </tr>
                <tr>
                    <th>Tipo de Parto:</th><td>'.$registro['tipo_parto_paciente'].'</td>
                </tr>
                <tr>
                    <th>Talla:</th><td>'.$registro['talla_paciente'].'</td>
                </tr>
                <tr>
                    <th>Peso:</th><td>'.$registro['peso_paciente'].'</td>
                </tr>
                <tr>
                  <th>Nombre Representante:</th><td>'.$registro['nom_representante'].' '.$registro['ape_representante'].'</td>
                </tr>
                <tr>
                  <th>Condicion:</th><td>'.$registro['nom_condicion'].'</td>
             </tr>

                <a href="paciente.php">
                    <img src="images/regresar.png" width="50" height="50">
                </a>';
		    }
		    $html.='</table></center><br>';
		    return $html;
	    }


}

?>
