<script>
 var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_registro='"+cell.getRow().getData().fecha_registro+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'cp='"+cell.getRow().getData().cp+"'colonia='"+cell.getRow().getData().colonia+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver Detalle'><i class='fas fa-eye'></i></div> ";
    };

var table = new Tabulator("#ventas", {
    layout:"fitColumns",
 	//height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
     columns:[ //Define Table Columns
        {title:"ID", field:"id", width:60},
        {title:"Folio", field:"folio",headerFilter:'input', width:250},
	 	{title:"E-mail", field:"email",headerFilter:'input',width:200 },
        {title:"IVA", field:"iva_incluido", headerFilter:'input',width:80},
        {title:"Subtotal", field:"subtotal", headerFilter:'input',width:120},
	 	{title:"Fecha de Compra", field:"fecha_compra", headerFilter:'input',width:150},
        {title:"Acciones", formatter:icons, align:"center"},
 	],
    pagination:"local",
    paginationSize:20
});

table.setData(<?=$datos?>);
//Boton ver
$('body').on('click','.ver_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/ver_venta/'+id;
})
$('body').on('click','.btx-cancel',function(){
    swal.close();
})
//Boton editar
/* $('body').on('click','.editar_registro',function(){
	let id = $(this).attr('ide');
    location.href = '<?=base_url()?>inicio/editar_cliente/'+id;
}) */

//BOTON ELIMINAR
/* $('body').on('click','.eliminar_registro',function(){
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
}) */
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