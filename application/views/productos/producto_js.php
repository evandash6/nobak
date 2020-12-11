<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'code='"+cell.getRow().getData().code+"'descripcion='"+cell.getRow().getData().descripcion+"'precio='"+cell.getRow().getData().precio+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class=' editar_registro btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'code='"+cell.getRow().getData().code+"'descripcion='"+cell.getRow().getData().descripcion+"'precio='"+cell.getRow().getData().precio+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };

 var table = new Tabulator("#productos", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
	 	{title:"Código", field:"code", width:150},
	 	{title:"Nombre", field:"nombre",width:150 },
	 	{title:"Descripción", field:"descripcion", width:150},
		{title:"Precio", field:"precio", width:150},
        {title:"Fecha de creacion", field:"fecha_creacion", sorter:"date", width:150},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	], 
});

table.setData(<?=$datos?>);
//Boton ver
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_creacion = $(this).attr('fecha_creacion');
	let code = $(this).attr('code');
    let descripcion = $(this).attr('descripcion');
	let precio = $(this).attr('precio');
    modal_ver_producto(id,nombre,fecha_creacion,code,descripcion,precio);
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})

//BOTON ELIMINAR
$('body').on('click','.eliminar_registro',function(){
	let id = $(this).attr('ide');
	console.log(id)
    confirm('Eliminar Registro','Desea eliminar el registro?','info')
    .then(function(){
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>inicio/eliminar_producto',
            data: {'id':id},
            success: function (data) {
                    alert('','Eliminado','error','<?=base_url()?>inicio/productos');
                
            }
        });
    })
})

//Boton editar
$('body').on('click','.editar_registro',function(){
    let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_creacion = $(this).attr('fecha_creacion');
	let code = $(this).attr('code');
    let descripcion = $(this).attr('descripcion');
	let precio = $(this).attr('precio');
    modal_editar_producto(id,nombre,fecha_creacion,code,descripcion,precio);
})

//BTX MODIFICAR
$('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
    $(this).attr('disabled',true)
    let id = $(this).attr('ide');
    let nombre = $("#nombre_modificado").val();
	let fecha_creacion = $("#fechac_modificada").val();
	let code = $("#code_modificado").val();
    let descripcion = $("#descripcion_modificada").val();
	let precio = $("#precio_modificado").val();
	console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/editar_producto',
        data: {'id':id,'nombre':nombre, 'fecha_creacion':fecha_creacion,'code':code,'descripcion':descripcion,'precio':precio},
        success: function (data) {
			console.log(id,nombre,fecha_creacion);  
			console.log(data);
			alert('','El Producto ha sido modificado','success','<?=base_url()?>inicio/productos');
        }
    });
})
</script>