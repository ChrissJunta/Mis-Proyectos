<table id="dg" title="Lista de Pacientes" class="easyui-datagrid" style="width:100%;height:auto; margin:10px;"
            url="controlador/usuario.php?op=select"
            toolbar="#toolbar" pagination="false" 
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>               
                <th field="idp" width="25%">ID</th>
                <th field="nombresp" width="25%">Nombres</th>
                <th field="edadp" width="25%">Edad</th>
                <th field="generop" width="25%">Género</th>
                <th field="estaturap" width="25%">Estatura</th>
                <th field="pesop" width="25%">Peso</th>
                <th field="imcp" width="25%">IMC</th>
                <th field="enfermedadesp" width="25%">Enfermedades</th>
                <th field="alergiasp" width="25%">Alergias</th>
                <th field="cinturap" width="25%">Cintura</th>
                <th field="munecap" width="25%">Muñeca</th>
               
            </tr>


        </thead>
    </table> 
   
    <div id="toolbar">      
        <input class="easyui-searchbox" data-options="prompt:'Buscar',searcher:buscar  " style="width:250px">
        <a  href="main.php?pag=newpropietario" class="easyui-linkbutton" iconCls="icon-add" plain="true"  >Nuevo</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-reload" plain="true" onclick="refrescar()">Refrescar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="editUser1()">Busqueda</a>
        <a href="main.php?pag=listapropiedad" class="easyui-linkbutton" iconCls="icon-search" plain="true" >Menú</a>
    </div>
    
  

    <script type="text/javascript">
        var url;
        
        function editUser(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropietario&id='+row.idp;
            }
        }
       
        function editUser1(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropiedad&id='+row.idp;
            }
        }

        function menu(){
            var row = $('#dg').datagrid('getSelected');
            if (row){
                window.location.href= 'main.php?pag=editpropiedad&id='+row.idp;
            }
        }

        function destroyUser(){
            var row = $('#dg').datagrid('getSelected');     

if (row){
    $.messager.confirm('Confirmar','¿Estás seguro de Eliminar el item seleccionado?',function(r){
                     
        if (r){
            $.messager.progress({title:'Por favor espere',msg:'Cargando datos...' });

            $.post('controlador/usuario.php?op=delete',{idp:row.idp},function(result){
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

    
 