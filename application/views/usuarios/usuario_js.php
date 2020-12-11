<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class=' editar_registro btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };


 var table = new Tabulator("#usuarios", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value) //assign data to table
     columns:[ //Define Table Columns
		{title:"ID Empleado", field:"id",width:150 },
	 	{title:"Nombre", field:"nombre", width:150},
	 	{title:"Fecha de alta", field:"fecha_creacion",  width:150},
        {title:"Usuario Creador", field:"usuario_creador", width:150},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	],
 	/* rowClick:function(e, row){ //trigger an alert message when the row is clicked
 		alert("nombre " + row.getData().usuario+ " Clicked!!!!");
 	}, */
});
table.setData(<?=$datos?>);

//Boton ver
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_creacion = $(this).attr('fecha_creacion');
    modal_ver(id,nombre,fecha_creacion);
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
            url: '<?=base_url()?>inicio/eliminar_usuario',
            data: {'id':id},
            success: function (data) {
                    alert('','Eliminado','error','<?=base_url()?>inicio/usuarios');
                
            }
        });
    })
})

//Boton editar
$('body').on('click','.editar_registro',function(){
    let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_creacion = $(this).attr('fecha_creacion');
    modal_editar(id,nombre,fecha_creacion);
})

//BTX MODIFICAR
$('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
    $(this).attr('disabled',true)
    let id = $(this).attr('ide');
    let nombre = $("#nombre_modificado").val();
	let fecha_creacion = $("#fechac_modificada").val();
	console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/editar_usuario',
        data: {'id':id,'nombre':nombre, 'fecha_creacion':fecha_creacion},
        success: function (data) {
			console.log(id,nombre,fecha_creacion);  
			console.log(data);
			alert('','El usuario ha sido modificado','success','<?=base_url()?>inicio/usuarios');
        }
    });
})
</script>