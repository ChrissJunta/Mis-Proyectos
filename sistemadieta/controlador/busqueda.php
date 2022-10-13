<?PHP
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 178000');
header('Content-Length: 0');
header('Content-Type: application/json');
require ('coneccion.php'); 
            if (isset($_POST['submit'] )){         
         
           
               
                $edadp = $_POST['edadp'];   
                $generop = $_POST['generop']; 
                $estaturap = $_POST['estaturap'];  
                $pesop = $_POST['pesop']; 
                $imcp = $_POST['imcp'];   
                $enfermedadesp = $_POST['enfermedadesp']; 
                $alergiasp = $_POST['alergiasp']; 
             
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
?>


