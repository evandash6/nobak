<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div>  \
                <div class=' editar_registro btn btn-secondary btn-sm' href='inicio/editar' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };
 var table = new Tabulator("#pago", {
    layout:"fitColumns",
 	//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
	 	{title:"No.", field:"id", headerFilter:'input',width:150},
        {title:"Título", field:"titulo",headerFilter:'input',width:350 },
	 	{title:"Costo", field:"costo",headerFilter:'input',width:100 },
	 	{title:"Creación", field:"fecha_creacion", headerFilter:'input',width:100},
        {title:"Acciones", formatter:icons, align:"center"},
 	],
    pagination:"local",
    paginationSize:20
});
table.setData(<?=$datos?>);

//BOTON VER
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/ver_pago/'+id;
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
$('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/editar_pago/'+id;
})
//BTX MODIFICAR

//BOTON ELIMINAR
$('body').on('click','.eliminar_registro',function(){
	let id = $(this).attr('ide');
	console.log(id)
    confirm('Eliminar Registro','Desea eliminar esta forma de pago?','info')
    .then(function(){
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>inicio/eliminar_pago',
            data: {'id':id},
            success: function (data) {
                    alert('','Eliminado','error','<?=base_url()?>inicio/pago');
                
            }
        });
    })
})
</script>