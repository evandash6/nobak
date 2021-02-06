<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_registro='"+cell.getRow().getData().fecha_registro+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'cp='"+cell.getRow().getData().cp+"'colonia='"+cell.getRow().getData().colonia+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class=' editar_registro btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"'nombre='"+cell.getRow().getData().nombre+"'fecha_registro='"+cell.getRow().getData().fecha_registro+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'cp='"+cell.getRow().getData().cp+"'colonia='"+cell.getRow().getData().colonia+"'email='"+cell.getRow().getData().email+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };

var table = new Tabulator("#clientes", {
    layout:"fitColumns",
 	//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
        {title:"ID", field:"id", width:60},
        {title:"Nombre", field:"nombre",headerFilter:'input', width:150},
	 	{title:"E-mail", field:"email",headerFilter:'input',width:150 },
	 	{title:"Dirección", field:"direccion", headerFilter:'input',width:150},
        {title:"CP", field:"cp", headerFilter:'input',width:150},
        {title:"Telefono", field:"telefono",headerFilter:'input', width:150},
        {title:"Acciones", formatter:icons, align:"center"},
 	],
    pagination:"local",
    paginationSize:20
});

table.setData(<?=$datos?>);
//Boton ver
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/ver_cliente/'+id;
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
$('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/editar_cliente/'+id;
})
//BTX MODIFICAR
$('body').on('click','.btx-modificar',function(e){
    alert('','El cliente ha sido modificado','success','<?=base_url()?>inicio/clientes');
    /* e.preventDefault();
    $(this).attr('disabled',true)
    let id = $(this).attr('ide');
    let nombre = $("#nombre_modificado").val();
    let fecha_registro = $("#fechar_modificada").val();
    let direccion=$("#direccion_modificada").val();
    let telefono=$("#telefono_modificado").val();
    let cp=$("#cp_modificado").val();
    let colonia=$("#colonia_modificada").val();
    let email=$("#email_modificado").val();
    console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/editar_cliente',
        data: {'id':id,'nombre':nombre, 'fecha_registro':fecha_registro,'direccion':direccion,'telefono':telefono,
                'cp':cp,'colonia':colonia,'email':email},
        success: function (data) {
			console.log(id,nombre);  
			console.log(data);
			alert('','El cliente ha sido modificado','success','<?=base_url()?>inicio/clientes');
        }
    }); */
})
//BOTON ELIMINAR
$('body').on('click','.eliminar_registro',function(){
	let id = $(this).attr('ide');
	console.log(id)
    confirm('Eliminar Registro','Desea eliminar el registro?','info')
    .then(function(){
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>inicio/eliminar_cliente',
            data: {'id':id},
            success: function (data) {
                    alert('','Eliminado','error','<?=base_url()?>inicio/clientes');
                
            }
        });
    })
})
//
function ocultar() {
    var x = document.getElementById("ocultar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>