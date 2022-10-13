<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM terrenosvista where propro_codigo='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}
?>
<div id="p" class="easyui-panel" title="Edicion de datos de Terreno" style="width:100%;height:100%; ">
<form id="frmUSuario" method="post"     style="margin:0;padding:20px 50px">
           

            <div style="margin-bottom:5px">
                <input name="propro_codigo" readonly=»readonly»  value="<?php echo $row['propro_codigo'] ?>" labelPosition="top" class="easyui-textbox" required="true" label="Codigo:" style="width:50%">
            </div>
            <div style="margin-bottom:5px">
                <input name="prop_nombre"  readonly=»readonly» value="<?php echo $row['prop_nombre'] ?>" labelPosition="top" value="<?php echo $row['nombre'] ?>" class="easyui-textbox" required="true" label="Nombres Completos:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="prop_apellido" readonly=»readonly» value="<?php echo $row['prop_apellido'] ?>"  labelPosition="top" class="easyui-textbox" required="true" label="Apellidos Completos:" style="width:50%" >
            </div> 
            <div  style="margin-bottom:5px">
            <select id="cc" name="tipodeasignacion" labelPosition="top" class="easyui-combobox" name="dept"   value="true" label="Tipo de Usuario :"  style="width:50%">
            
            
        <option   value="<?php echo $row ['tipodeasignacion']?>" > <?php echo $row ['tipodeasignacion']?></option>

        <option >Usuario Actual</option>
        <option>Usuario Anterior</option>
   
         </select>
         
        </div>

         
        </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Save</a>
       <a  href="main.php?pag=listaterrenos" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancel</a>
    </div>   
    </div>
 
    <script type="text/javascript">

$('#cc').combobox({
           
           
           panelHeight:'110',
           
           onSelect: function(rec)
           {
            
           }
       });
        function saveUser(){              
           $('#frmUSuario').form('submit',{
                url: 'controlador/terrenos.php?op=update',
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
                            title: 'Error',
                            msg: result
                        });
                        window.location.href ='main.php?pag=listaterrenos';
                }
            }); 
        }
        
    </script>