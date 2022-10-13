<table id="dg" title="Lista de Terrenos" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/terrenos.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="propro_codigo" width="25%">ID terrenos </th>               
                <th field="prop_nombre" width="25%">Nombres</th>
                <th field="prop_apellido" width="25%">Apellidos </th>
                <th field="prop_cedula" width="25%">Cédula</th>
                <th field="propi_id" width="25%">ID Propiedad</th>
                <th field="propi_metros" width="25%">Metros</th>
                <th field="propi_latitud" width="25%">Latitud</th>
                <th field="propi_longitud" width="25%">Longuitud</th>
                <th field="propi_ciudad" width="25%">Ciudad</th>
                <th field="propi_parroquia" width="25%">Parroquia</th>
                <th field="tipodeasignacion" width="25%" >Tipo de Asignación</th>
             
                <th field="fechadeasignacion" width="25%">Fecha de Asignación</th>
            </tr>

        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="javascript:void(0)" class="easyui-linkbutton" onclick="editriego()" iconCls="icon-add" plain="true"  >Agregar riego</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editterreno()">Editar</a>
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
                window.location.href= 'main.php?pag=editriego&id='+row.propi_id;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/terrenos.php?op=delete',{propro_codigo:row.propro_codigo},function(result){
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

    