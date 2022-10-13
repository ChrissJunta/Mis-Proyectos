<?php
require ('controlador/coneccion.php'); 
if( isset($_GET["id"]))
{ 
    $id=$_GET["id"];
    $sql = "SELECT * FROM riego where riego_id='$id'";
    $result = mysqli_query($con,$sql);
     
    $row = mysqli_fetch_assoc($result) ;
}

?>

<div id="$id" class="easyui-panel" title="Editar Riego" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           
            <div style="margin-bottom:5px">
                <input name="riego_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['riego_id']?>" class="easyui-textbox" required="true" label="Codigo Propiedad " style="width:30%"/>
            </div>
            <div style="margin-bottom:5px">
                <input name="propi_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['propi_id']?>" class="easyui-textbox" required="true" label="Codigo Propiedad " style="width:30%"/>
            </div>
            <div style="margin-bottom:5px">
                <select id="cc"label="Dias :" labelPosition="top" style="width:30%" class="easyui-combobox"required="true" name="riego_dias">
                
                 <option value="<?php echo $row ['riego_dias']?>"><?php echo $row ['riego_dias']?></option>
                 
                <option >Lunes</option>
                <option>Martes</option>
                <option>Miércoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                <option>Sábado</option>
                <option>Domingo</option>
                
                
                
            </select>
            </div> 
            <div style="margin-bottom:5px">
                <input name="riego_horas" labelPosition="top" class="easyui-textbox" value="<?php echo $row ['riego_horas']?>"  required="true" label="Horas " style="width:30%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="riego_fecha" labelPosition="top"class="easyui-datebox" value="<?php echo $row ['riego_fecha']?>"data-options="formatter:myformatter,parser:myparser"   label="Fecha de Asignacion:"  required="true"  style="width:30%" >
            </div>              
            
            <div style="margin-bottom:5px">
                <input name="riego_observaciones" labelPosition="top" width="48" value="<?php echo $row ['riego_observaciones']?>" class="easyui-textbox"   required="true" label="Observaciones" style="width:50%" >
            </div> 
            
            
            
             
        </form>  
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listariego" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   
    </div>
    

    <script type="text/javascript">
      function myformatter(date){
            var y = date.getFullYear();
            var m = date.getMonth()+1;
            var d = date.getDate();
            return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
        }
        function myparser(s){
            if (!s) return new Date();
            var ss = (s.split('-'));
            var y = parseInt(ss[0],10);
            var m = parseInt(ss[1],10);
            var d = parseInt(ss[2],10);
            if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
                return new Date(y,m-1,d);
            } else {
                return new Date();
            }
        }
       
      $('#cc').combobox().prop('selectedIndex', -1)
       $('#cc').combobox({
           
           
            panelHeight:'260',
            
            onSelect: function(rec)
            {
             
            }
        });

      
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/riego.php?op=update',
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
                    window.location.href= 'main.php?pag=listariego';
                }
            }); 
        }
        
    </script>    
    
 






