<table id="dg" title="Lista de Riegos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/riego.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="riego_id" width="25%">ID </th>               
                <th field="propi_id" width="25%">ID propietario</th>
                <th field="riego_dias" width="25%">Dias </th>
                <th field="riego_horas" width="25%">Horas</th>
                <th field="riego_fecha" width="25%">Fecha</th>
                <th field="riego_observaciones" width="25%">Observaciones</th>
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editriego()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editterreno(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editterreno&id='+row.propro_codigo;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.propi_id;
            }
        }
        function editriego(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editriegos&id='+row.riego_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/riego.php?op=delete',{riego_id:row.riego_id},function(result){
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

    