<div id="p" class="easyui-panel" title="Dietas" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"  action="controlador/busqueda.php"   style="margin:0;padding:20px 50px">
           

<div style="margin-bottom:5px">
                <input name="idp" labelPosition="top" class="easyui-textbox" required="true" label="ID Paciente :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="nombresp" labelPosition="top" class="easyui-textbox" required="true" label="Nombres :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="edadp" labelPosition="top" class="easyui-textbox" required="true" label="Edad :" style="width:50%" >
            </div>              
            
        <div style="margin-bottom:5px">
                <select id="cc"label="Género :" labelPosition="top" style="width:50%" class="easyui-combobox"required="true" name="generop">
                <option  disabled="disabled"selected="selected" ></option>
                <option >Masculino</option>
                <option>Femenino</option>
            </select>
            </div> 
                      
            <div style="margin-bottom:5px">
                <input name="estaturap" id="estaturap" labelPosition="top" class="easyui-textbox" required="true" label="Estatura :" style="width:50%" >
            </div>
            <div style="margin-bottom:5px">
                <input name="pesop" id="pesop" labelPosition="top" class="easyui-textbox" required="true" label="Peso :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="imcp" id="imcp" labelPosition="top" onblur="calculo()"  class="easyui-textbox" required="true" label="IMC :" style="width:50%">
            </div> 
            <div style="margin-bottom:5px">
                <input name="enfermedadesp" labelPosition="top" class="easyui-textbox" required="true" label="Enfermedades :" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="alergiasp"  labelPosition="top" class="easyui-textbox" required="true" label="Alergias :" style="width:50%" >
            </div> 
            
            <div style="text-align:center;padding:5px 0">
            <input type="submit" />
        <a  href="main.php?pag=newpropietario" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
    </div>   

            <table id="dg" title="Tipo de Dieta" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/busqueda.php"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="nombred" width="50%">Dieta</th>
                <th field="resultado" width="50%">Resultado</th>
    
            </tr>

        </thead>
    </table> 

       <table id="dg" title="Lista de Alimentos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/busqueda.php"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="comida" width="30%">Comida</th>
                
                <th field="alimento" width="35%">Alimento</th>
                <th field="porcion" width="35%">Porcion</th>
                
                
                
               
            </tr>

        </thead>
    </table>      

      </form>
   
        
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
                url: 'controlador/usuario.php?op=insert',
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
                    window.location.href= 'main.php?pag=newpropietario';
                }
            }); 
        }
        
    </script>    
    
 
    
    
    
   
    
    
    
 