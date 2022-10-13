<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM propiedad where propi_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<!DOCTYPE html>
<html>
<head>



<form  >
<div class="card-title">Google Maps</div>
     <div class="row">       
        <div class="col-sm-4">  
           <div class="form-group">
              <input type='text' id='busqueda'name='busqueda' value="<?php echo $row ['propi_latitud'].",".  $row ['propi_longitud']?>" class="form-control" placeholder='Pon la latitud y longitud  aquí ejemplo: -1.708915, -79.040429' />
             
           </div>
           
        </div>
        <div class="form-group">
           <input onclick="init()" value='Localizar' class="btn btn-success" />
           <a  href="main.php?pag=listapropiedad" class="btn btn-secondary" >Regresar</a>
        </div>
     </div>
 </form> 
 
      



 <script src="http://maps.google.com/maps/api/js?sensor=true"> </script>
 
 
 </script>
 <script>



function init(){
 
   var texto=document.getElementById("busqueda").value;
  
   
   var fields = texto.split(',');

var lats = fields[0];
var lngs = fields[1];
   
   var mapOption = {
      
     center: new google.maps.LatLng(lats, lngs), 
     zoom: 15,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };
   
   var map = new google.maps.Map(document.getElementById("map"),mapOption);

   // Define tu marcador (pon la url de tu imagen en la propiedad **icon**)
   var marker =new google.maps.InfoWindow({

map: map,

position: new google.maps.LatLng(lats,lngs),

content: 'Esta es la ubicación',
    
   });
   // Agregar tu marcador al mapa
   marker.setMap(map);
}

  google.maps.event.addDomListener(window, 'load', init);

 </script>


  </head>
  <body>

  <div id="map" style="width:1000px; height: 600px; border: ridge; border-color: #054ead  "></div>


</body>
</html>