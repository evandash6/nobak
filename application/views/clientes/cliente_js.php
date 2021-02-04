<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_registro='"+cell.getRow().getData().fecha_registro+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'cp='"+cell.getRow().getData().cp+"'colonia='"+cell.getRow().getData().colonia+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class=' editar_registro btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"'nombre='"+cell.getRow().getData().nombre+"'fecha_registro='"+cell.getRow().getData().fecha_registro+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'cp='"+cell.getRow().getData().cp+"'colonia='"+cell.getRow().getData().colonia+"'email='"+cell.getRow().getData().email+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };

var table = new Tabulator("#clientes", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
	 	{title:"Nombre", field:"nombre", width:150},
	 	{title:"E-mail", field:"email",width:150 },
	 	{title:"Dirección", field:"direccion", width:150},
        {title:"CP", field:"cp", width:150},
        {title:"Telefono", field:"telefono", width:150},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	],
});

table.setData(<?=$datos?>);
//Boton ver
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_registro = $(this).attr('fecha_registro');
    let direccion = $(this).attr('direccion');
    let telefono = $(this).attr('telefono');
	let cp = $(this).attr('cp');
    let colonia = $(this).attr('colonia');
    let email = $(this).attr('email');
    
    modal_ver_clientes(id,nombre,fecha_registro,direccion,telefono,cp,colonia,email);
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
$('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    let nombre = $(this).attr('nombre');
	let fecha_registro = $(this).attr('fecha_registro');
    let direccion = $(this).attr('direccion');
    let telefono = $(this).attr('telefono');
	let cp = $(this).attr('cp');
    let colonia = $(this).attr('colonia');
    let email = $(this).attr('email');
    
    modal_editar_clientes(id,nombre,fecha_registro,direccion,telefono,cp,colonia,email);
})
//BTX MODIFICAR
$('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
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
    });
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