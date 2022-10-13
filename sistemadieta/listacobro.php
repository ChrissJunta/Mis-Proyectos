<table id="dg" title="Lista de Cobros" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/cobro.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="co_id" width="25%">ID </th>               
                <th field="propi_id" width="25%">ID Propiedad</th>
                <th field="co_fecha" width="25%">Fecha </th>
                <th field="co_valortotal" width="25%">Valor Total</th>
                <th field="estado" width="25%">Estado</th>
               
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newcobro" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editriego()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editterreno(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editterreno&id='+row.co_id;
            }
        }
        function editpropi(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=newagregarpropietario&id='+row.co_id;
            }
        }
        function editriego(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editcobro&id='+row.co_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/cobro.php?op=delete',{co_id:row.co_id},function(result){
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

    