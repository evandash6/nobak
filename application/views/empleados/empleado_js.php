<script>
 var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-primary btn-sm'  href='inicio/ver_empleado' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                <div class='btx_editar btn btn-secondary btn-sm'  href='inicio/editar_empleado' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='eliminar_registro btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };


 var table = new Tabulator("#usuarios", {
    layout:"fitDataFill",
 	height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value) //assign data to table
     columns:[ //Define Table Columns
		{title:"ID Empleado", field:"id",width:150 },
	 	{title:"Nombre", field:"nombre", width:150},
         {title:"Fecha de alta", field:"fecha_creacion",  width:150},
         {title:"E-mail", field:"email",  width:150},
        //{title:"Usuario Creador", field:"usuario_creador", width:150},
        {title:"Acciones", formatter:icons, align:"center",width:180},
 	],
 	/* rowClick:function(e, row){ //trigger an alert message when the row is clicked
 		alert("nombre " + row.getData().usuario+ " Clicked!!!!");
 	}, */
});
table.setData(<?=$datos?>);



$('body').on('click','.btx_ver',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/ver_empleado/'+id;
    })

$('body').on('click','.btx_editar',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/editar_empleado/'+id;
    })

   
</script>