<table id="dg" title="Lista de Alimentos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/propiedad.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="comida" width="25%">Comida</th>
                
                <th field="alimento" width="25%">Alimento</th>
                <th field="porcion" width="25%">Porcion</th>
                
                
                
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newpropiedad" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
        <a  href="main.php?pag=listapropietario" class="easyui-linkbutton" iconCls="icon-back" plain="true">Regresar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropiedad&id='+row.propi_id;
            }
        }
        
        function mapa(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=mapa&id='+row.propi_id;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.propi_id;
            }
        }


        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/propiedad.php?op=delete',{prop_id:row.prop_id},function(result){
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

    
 