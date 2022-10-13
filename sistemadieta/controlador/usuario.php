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

        $condicion=$condicion." where idp || nombresp like '%".$filtro."%' ";
        
        }
            $resultqry = mysqli_query($con,"SELECT * FROM paciente".$condicion );
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
            if (isset($_POST['filtro'] )){         
            try{
                $idp = $_POST['idp'];   
                $nombresp = $_POST['nombresp']; 
                $edadp = $_POST['edadp'];   
                $generop = $_POST['generop']; 
                $estaturap = $_POST['estaturap'];  
                $pesop = $_POST['pesop']; 
                $imcp = $_POST['imcp'];   
                $enfermedadesp = $_POST['enfermedadesp']; 
                $alergiasp = $_POST['alergiasp']; 
                $cinturap = $_POST['cinturap']; 
                $munecap = $_POST['munecap']; 
                $sql = "SELECT * FROM paciente,die_paci,menu,alimetos,dieta WHERE edadp=$edadp AND generop='$generop' AND estaturap='$estaturap' AND pesop= '$pesop'AND imcp='$imcp'
                 AND enfermedadesp='$enfermedadesp' AND alergiasp='$alergiasp' and die_paci.idp=paciente.idp 
                 and die_paci.idd=dieta.idd and menu.idd=dieta.idd and menu.idm=alimentos.idm"; 
               
                
                $insert = mysqli_query($con,$sql); 

              if (!$insert) {
            echo json_encode("no existe esa dieta");
            exit;
            }
            $result = array();
            $items = array();  
         
            while($row = mysqli_fetch_object($insert)) {
               array_push($items, $row);
            }
            $result["rows"] = $items;
            echo json_encode($result);
        

           
}
catch (Exception $e){ //usar logs
    $response = array( 
        'status' => 0, 
        'msg' =>  'La propiedad ya existe'  
    );  
}         
}



 break; 

 case 'update':
    $response = array( 
        'status' => 0, 
        'msg' =>  '  Se produjeron algunos problemas. Inténtalo de nuevo.' 
    );          
    if(!empty($_POST['nombresp'])&& !empty($_POST['edadp'])&&!empty($_POST['generop'])&& !empty($_POST['estaturap'])&& !empty($_POST['pesop'])&& !empty($_POST['imcp'])&&!empty($_POST['enfermedadesp'])){   
        $idp = $_POST['idp'];   
        $nombresp = $_POST['nombresp']; 
        $edadp = $_POST['edadp'];   
        $generop = $_POST['generop']; 
        $estaturap = $_POST['estaturap'];  
        $pesop = $_POST['pesop']; 
        $imcp = $_POST['imcp'];   
        $enfermedadesp = $_POST['enfermedadesp']; 
        $alergiasp = $_POST['alergiasp']; 
                $sql = "UPDATE paciente SET  nombresp='$nombresp',edadp='$edadp',generop='$generop',estaturap='$estaturap',pesop='$pesop',imcp='$imcp',enfermedadesp='$enfermedadesp', alergiasp='$alergiasp' WHERE idp ='$idp'";
               $update = mysqli_query($con,$sql);
                 
                if($update){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del paciente se han actualizado con éxito!'; 
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
            if(!empty($_POST['idp'])   ){ 
                $idp = $_POST['idp']; 
              
                $sql = " delete from paciente where idp ='$idp' "; 
                $delete = mysqli_query($con,$sql); 
                 
                if($delete){ 
                    $response['status'] = 1; 
                    $response['msg'] = '¡Los datos del paciente se han eliminado con éxito!'; 
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