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
<div id="p" class="easyui-panel" title="Asignacion de Propiedad" style="width:100%;height:100%; ">
<form id="frmpro" method="post"     style="margin:0;padding:20px 50px">
           


<div style="margin-bottom:5px">
                <input name="propi_id" labelPosition="top" readonly=»readonly» value="<?php echo $row ['propi_id']?>" class="easyui-textbox" required="true" label="Codigo Propiedad " style="width:50%"/>
            </div>
           
            <div  style="margin-bottom:5px">
            
            <select  name ="prop_id"labelPosition="top"required="true" class="easyui-combogrid" 
            style="width:50%;"  data-options="
                    url:'controlador/asignarpropietario.php?op=selectcombo',
                    method:'get',
                    
                    idField:'prop_id',
                    textField:'prop_nombre',
                    panelHeight:'auto',
                   
                    label: 'Nombre Propietario:',
                    columns: [[
                        {field:'prop_id',title:'Codigo',width:80},
                        {field:'prop_nombre',title:'Nombre',width:120},
                        {field:'prop_apellido',title:'Apellido',width:80,align:'right'},
                        {field:'prop_cedula',title:'Cedula',width:80,align:'right'},
                        {field:'prop_correo',title:'Correo',width:200},
                                          
                        
                    ]],
                    fitColumns:true,
                    labelWidth:'160px'
                    ">               
            </select>
        </div>                   
        <div style="margin-bottom:5px">
                <select id="cc"label="Tipo de Usuario :" labelPosition="top" style="width:50%" class="easyui-combobox"required="true" name="tipodeasignacion">
                <option  disabled="disabled"selected="selected" ></option>
                <option >Usuario Actual</option>
                <option>Usuario Anterior</option>
                
                
            </select>
            </div> 
            
            <div style="margin-bottom:20px">
            <input name="fechadeasignacion" class="easyui-datebox" label="Fecha de asignacion:" labelPosition="top" required="true" data-options="formatter:myformatter,parser:myparser" style="width:50%;">
        </div>
            
            
           
      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listapropiedad" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
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
       $('#cc').combobox({
           
           
           panelHeight:'80',
           
           onSelect: function(rec)
           {
            
           }
       });
        function saveUser(){              
           $('#frmpro').form('submit',{
                url: 'controlador/asignarpropietario.php?op=insert',
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
    
 