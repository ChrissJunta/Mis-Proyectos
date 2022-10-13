 
   
  <table id="dg" title="Lista Usuario" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/administrador.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
        <tr>    
                  
                <th field="cod_log" width="25%">CODIGO</th>
                <th field="nombre" width="25%">NOMBRES</th>
                <th field="apellido" width="25%">APELLIDOS</th>
                <th field="usuario" width="25%">USUARIO</th>
                <th field="contraseña" width="25%">CONTRASEÑA</th>
             
                
            </tr>

            
        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar " style="width:250px">
        <a  href="main.php?pag=newusuario" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editusuario&id='+row.cod_log;
            }
        }


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

            if (row){
                $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                                 
                    if (r){
                        $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

                        $.post('controlador/administrador.php?op=delete',{cod_log:row.cod_log},function(result){
                            $.messager.progress('close');     
                            
                            if (result.success){
                                $('#dg').datagrid('reload');    
                            } else {
                                 
                                $('#dg').datagrid('reload');
                            }
                        },'json');
                    }
                });
            }
        }


        function refrescar(){
            $('#dg').datagrid('reload');   
        }
        function buscar(value){
            $('#dg').datagrid('reload',{filtro:value});   
        }
    </script>    

    
 