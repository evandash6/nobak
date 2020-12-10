<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div>  \
                <div class=' editar_registro btn btn-secondary btn-sm' href='inicio/editar' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
 var table = new Tabulator("#cedis", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
	 	{title:"CeDis", field:"cedis", width:150},
	 	{title:"E-mail", field:"email",width:150 },
	 	{title:"Contacto", field:"contacto", width:150},
		 {title:"Telefono", field:"telefono", width:150},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	],
});
table.setData(<?=$datos?>);

//BOTON VER
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    let cedis = $(this).attr('cedis');
	let fecha_creacion = $(this).attr('fecha_creacion');
    let direccion = $(this).attr('direccion');
    let telefono = $(this).attr('telefono');
	let contacto = $(this).attr('contacto');
    let email = $(this).attr('email');
    
    modal_ver_cedis(id,cedis,fecha_creacion,direccion,telefono,contacto,email);
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
$('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    let cedis = $(this).attr('cedis');
	let fecha_creacion = $(this).attr('fecha_creacion');
    let direccion = $(this).attr('direccion');
    let telefono = $(this).attr('telefono');
	let contacto = $(this).attr('contacto');
    let email = $(this).attr('email');
    
    modal_editar_cedis(id,cedis,fecha_creacion,direccion,telefono,contacto,email);
})
//BTX MODIFICAR
$('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
    $(this).attr('disabled',true)
    let id = $(this).attr('ide');
    let cedis = $("#cedis_modificado").val();
    let fecha_creacion = $("#fechac_modificada").val();
    let direccion=$("#direccion_modificada").val();
    let telefono=$("#telefono_modificado").val();
    let contacto=$("#contacto_modificado").val();
    let email=$("#email_modificado").val();
    console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/editar_cedis',
        data: {'id':id,'cedis':cedis, 'fecha_creacion':fecha_creacion,'direccion':direccion,'telefono':telefono,
                'contacto':contacto,'email':email},
        success: function (data) {
			console.log(id,cedis);  
			console.log(data);
			alert('','El Cedis ha sido modificado','success','<?=base_url()?>inicio/cedis');
        }
    });
})
//BOTON ELIMINAR
$('body').on('click','.eliminar_registro',function(){
	let id = $(this).attr('ide');
	console.log(id)
    confirm('Eliminar Registro','Desea eliminar el CeDis?','info')
    .then(function(){
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>inicio/eliminar_cedis',
            data: {'id':id},
            success: function (data) {
                    alert('','Eliminado','error','<?=base_url()?>inicio/cedis');
                
            }
        });
    })
})
</script>