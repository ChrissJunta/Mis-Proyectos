<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT paciente.nombresp, dieta.nombred, resultado FROM paciente,dieta,die_paci where dieta.idd=die_paci.idd and paciente.idp=die_paci.idp and die_paci.idp='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Resultado" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="idp" labelPosition="top" readonly=»readonly» value="<?php echo $row ['nombresp']?>" class="easyui-textbox" required="true" label="Nombre del Pacienta " style="width:50%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="idd" labelPosition="top" readonly=»readonly» value="<?php echo $row ['nombred']?>" class="easyui-textbox" required="true" label="Dieta " style="width:50%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="resultado" labelPosition="top" readonly=»readonly» value="<?php echo $row ['resultado']?>" class="easyui-textbox" required="true" label="Resultado " style="width:50%"/>
            </div>     
        </form>  
        <div style="text-align:center;padding:5px 0">
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-back" style="width:90px">Regresar</a>
    </div>   
    </div>
    
    <script type="text/javascript">
      $('#cc').combobox().prop('selectedIndex', -1)
       $('#cc').combobox({
           
           
            panelHeight:'150',
            
            onSelect: function(rec)
            {
             
            }
        });

      
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/propiedad.php?op=update',
                onSubmit: function(){
                    var esvalido =  $(this).form('validate');
                    if( esvalido){
                        $.messager.progress({
                       title:'Por favor espere',
                      msg:'Cargando datos...'
                      });
                    }
                    return esvalido;
                },
                success: function(result){                   
                    $.messager.progress('close');
                   // var result = eval('('+result+')');
                   // console.log(result);                  
                   $.messager.show({
                            title: 'exito',
                            msg: result
                        });
                    window.location.href= 'main.php?pag=listapropiedad';
                }
            }); 
        }
        
    </script>    
    
 





