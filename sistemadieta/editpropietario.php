<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM paciente where idp='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Datos Propietario" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           
<div style="margin-bottom:5px">
                <input name="idp" labelPosition="top" class="easyui-textbox" readonly=»readonly» value="<?php echo $row ['idp']?>" required="true" label="ID Paciente :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="nombresp" value="<?php echo $row ['nombresp']?>" labelPosition="top" class="easyui-textbox" required="true" label="Nombres :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="edadp" value="<?php echo $row ['edadp']?>" labelPosition="top" class="easyui-textbox" required="true" label="Edad :" style="width:50%" >
            </div>              
            
        <div style="margin-bottom:5px">
                <select id="cc"label="Género :" value="<?php echo $row ['generop']?>" labelPosition="top" style="width:50%" class="easyui-combobox"required="true" name="generop">
                <option  disabled="disabled"selected="selected" ></option>
                <option >Masculino</option>
                <option>Femenino</option>
            </select>
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="estaturap" id="estaturap" value="<?php echo $row ['estaturap']?>" labelPosition="top" class="easyui-textbox" required="true" label="Estatura :" style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="pesop" id="pesop" value="<?php echo $row ['pesop']?>" labelPosition="top" class="easyui-textbox" required="true" label="Peso :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="imcp" id="imcp" value="<?php echo $row ['imcp']?>" labelPosition="top" onblur="calculo()"  class="easyui-textbox" required="true" label="IMC :" style="width:50%">
            </div> 
            <div style="margin-bottom:5px">
                <input name="enfermedadesp" value="<?php echo $row ['enfermedadesp']?>" labelPosition="top" class="easyui-textbox"  label="Enfermedades :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="alergiasp" value="<?php echo $row ['alergiasp']?>"  labelPosition="top" class="easyui-textbox"  label="Alergias :" style="width:50%" >
            </div> 
            

            

        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    
 
    <script type="text/javascript">
       
       $('#cc').combobox({
           
           
           panelHeight:'150',
           
           onSelect: function(rec)
           {
            
           }
       });
      
        function saveUser(){              
           $('#frmequipo').form('submit',{
                url: 'controlador/usuario.php?op=update',
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
                    window.location.href= 'main.php?pag=listapropietario';
                }
            }); 
        }
        
    </script>    
    
 