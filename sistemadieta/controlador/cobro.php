<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccion.php'); 
$op=  $_GET['op'] ;
if( !isset($op) )
{
  echo  json_encode( "No se definió  la variable op");
  exit;
} 
 
switch ($op) { 
    case 'select':
        $condicion=' ';
        if (isset($_POST['filtro'] )){
        $filtro=$_POST['filtro'] ;

        $condicion=$condicion."where prop_nombre like '%".$filtro."%' OR propi_ciudad like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * FROM cobro".$condicion );
            if (!$resultqry) {
            echo json_encode("Ocurrió un error en la consulta");
            exit;
            }
            $result = array();
            $items = array();  
         
            while($row = mysqli_fetch_object($resultqry)) {
               array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
            break;
 case 'insert':
    $archivoguardado=0;
    $mensaje = "";
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            try{
                $propi_id = $_POST['propi_id'];   
                $co_fecha = $_POST['co_fecha']; 
                $co_valortotal= $_POST['co_valortotal'];   
                $estado = $_POST['estado']; 
            
                
                $sql = "INSERT INTO cobro (propi_id,co_fecha,co_valortotal,estado) 
                VALUES ('$propi_id','$co_fecha','$co_valortotal','$estado')"; 
               
               

                echo $sql;
                $insert = mysqli_query($con,$sql); 
             
            if($insert){ 
                $response['status'] = 1; 
                $response['msg'] = '¡El cobro se han agregado con éxito!'; 
            } 
}


catch (Exception $e){ //usar logs
    $response = array( 
        'status' => 0, 
        'msg' =>  'La cobro ya existe'  
    );           
}
            
            echo json_encode($response); 
 break; 


 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if(!empty($_POST['co_fecha'])&&!empty($_POST['co_valortotal'])&&!empty($_POST['estado'])){ 
                $co_id = $_POST['co_id'];
                $propi_id = $_POST['propi_id'];   
                $co_fecha = $_POST['co_fecha']; 
                $co_valortotal= $_POST['co_valortotal'];   
                $estado = $_POST['estado']; 
         
           
        
                $sql = "UPDATE cobro SET  propi_id='$propi_id',co_fecha='$co_fecha',co_valortotal='$co_valortotal',estado='$estado' WHERE co_id ='$co_id'";
               $update = mysqli_query($con,$sql);

     

                if($update){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del cobro se han actualizado con éxito!'; 
                } 
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            } 
             
            echo json_encode($response); 

 break;

  
 case 'delete':
        $response = array( 
                'status' => 0, 
                'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
            );          
            if(!empty($_POST['co_id'])  ){ 
                $co_id = $_POST['co_id']; 
                $sql = " delete from cobro where co_id ='$co_id'  "; 
                $delete = mysqli_query($con,$sql); 
                 
                if($delete){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del cobro se han eliminado con éxito!'; 
                } 
            }else{ 
                $response['msg'] = 'Por favor complete todos los campos obligatorios.'; 
            }             
            echo json_encode($response); 
 break; 
 
    default:
            echo json_encode( "Error no existe la opcion ".$op);


            }
?>