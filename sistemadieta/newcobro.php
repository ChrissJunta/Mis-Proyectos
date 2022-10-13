<div id="p" class="easyui-panel" title="Ingreso de Cobro" style="width:100%;height:100%; ">
<form id="frmequipo" method="post"     style="margin:0;padding:20px 50px">
           
<div  style="margin-bottom:5px">
            
            <select  name ="propi_id"labelPosition="top"required="true" class="easyui-combogrid" 
            style="width:50%;"  data-options="
                    url:'controlador/asignarpropietario.php?op=selectcombo1',
                    method:'get',
                    
                    idField:'propi_id',
                    textField:'propi_id',
                    panelHeight:'auto',
                   
                    label: 'ID Propiedad:',
                    columns: [[
                        {field:'propi_id',title:'Codigo',width:80},
                        {field:'propi_metros',title:'Metros',width:120},
                        {field:'propi_sector',title:'Sector',width:80,align:'right'},
              
                                          
                        
                    ]],
                    fitColumns:true,
                    labelWidth:'160px'
                    ">               
            </select>
        </div>     
            <div style="margin-bottom:5px">
                <input name="co_fecha" labelPosition="top" class="easyui-datebox" data-options="formatter:myformatter,parser:myparser"  required="true" label="Fecha:" style="width:50%" >
            </div> 
            <div style="margin-bottom:5px">
                <input name="co_valortotal" labelPosition="top" class="easyui-textbox" required="true" label="Valor Total :" style="width:50%" >
            </div>              
        
            <div style="margin-bottom:5px">
                <select id="cc"label="Estado :" labelPosition="top" style="width:50%" class="easyui-combobox" required="true" name="estado">
                <option  selected="selected" >- Seleccionar -</option>
                <option>Pagado</option>
                <option>Por Pagar</option>
                
            </select>
            </div> 

      </form>
   
        <div style="text-align:center;padding:5px 0">
        <a href="javascript:void(0)" id='btnSave' class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a  href="main.php?pag=listacobro" class="easyui-linkbutton" iconCls="icon-cancel" style="width:90px">Cancelar</a>
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

        $('#cc').combobox({
           
           
           panelHeight:'150',
           
           onSelect: function(rec)
           {
            
           }
       });
      
        function saveUser(){    
                  
           $('#frmequipo').form('submit',{
                url: 'controlador/cobro.php?op=insert',
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
                    window.location.href= 'main.php?pag=listacobro';
                }
            }); 
        }
        
    </script>    
    
 