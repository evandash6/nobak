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
    location.href = '<?=base_url()?>inicio/ver_cedis/'+id;
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
$('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/editar_cedis/'+id;
})
//BTX MODIFICAR

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