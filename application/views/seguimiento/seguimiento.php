<div class="row">
    <div class="col-md-10 offset-md-2">
        <div class="row">
            <div class="col-md-4 offset-md-8">
            <label for="">Filtro:</label>
                <select id="filtro" name="filtro" class="form-control" ><?=$estatus?></select>
            </div>
        </div>    
    </div>
</div>
<div class="row m-t-30">
    <div class="col-md-12">
        <div id="tabla_ventas"></div>
    </div>
</div>
<script>

    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-primary btn-sm'  ide='"+cell.getRow().getData().id+"'  title='Ver Seguimiento'><i class='fas fa-eye'></i></div> \
                <div class='btx_editar btn btn-success btn-sm'  ide='"+cell.getRow().getData().id+"'  title='Editar Seguimiento'><i class='fas fa-stamp'></i></div> \
                <div class='btx_cancelar btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' folio='"+cell.getRow().getData().folio+"'   title='Cancelar compra'><i class='fas fa-ban'></i></div>";
    };

    var table = new Tabulator("#tabla_ventas", {
        layout:"fitColumns",
        columns:[
            {title:"Nº de Folio", field:"folio",headerFilter:'input',width:110 },
            {title:"Nombre Cliente", field:"nombre_cliente",headerFilter:'input', width:170},
            {title:"F. de Compra", field:"fecha_compra", headerFilter:'input', width:120},
            {title:"E-mail", field:"email", headerFilter:'input', width:160},
            {title:"Subtotal", field:"subtotal", headerFilter:'input', width:90},
            {title:"Estatus", field:"estatus", headerFilter:'input', width:150},
            {title:"Acciones", formatter:icons, align:"center"},
        ],
        pagination:"local",
        paginationSize:20
    });
    table.setData(<?=$ventas?>);

    $("#tabla_ventas").attr('style','font-size:11px !important');

    $('body').on('change','#filtro',function(){
        let val = $('#filtro option:selected').text()
        if($('#filtro option:selected').val() == 0)    
        table.setFilter([{field:"estatus", type:"like", value:''}]);
        else    
        table.setFilter([{field:"estatus", type:"like", value:val}]);
    })

    $('body').on('click','.btx_ver',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>seguimiento/ver/'+id;
    })

    $('body').on('click','.btx_editar',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>seguimiento/editar/'+id;
    })

    $('body').on('click','.btx_cancelar',function(){
        let id = $(this).attr('ide');
        let folio = $(this).attr('folio');
        modal2('Cancelación de Compra','<div class="row"><div class="col-md-12">Para cancelar la compra con folio: <b>'+folio+'</b> es necesario registrar el motivo de cancelacion.</div></div><div class="row m-t-20"><div class="col-md-12 text-left"><label>Motivo:</label><input type="text" class="form-control" name="motivo"></div></div><div class="row m-t-30"><div class="col-md-12 text-right"><button type="button" onclick="swal.close()" class="btn btn-danger m-r-10"><i class="fas fa-reply m-r-5"></i>Regresar</button><button id="btx_confirm_cancel" ide="'+id+'" type="button" class="btn btn-info"><i class="fas fa-save m-r-5"></i>Confirmar</button></div></div>','info',550,'center');
    })

    $('body').on('click','#btx_confirm_cancel',function(){
        let id = $(this).attr('ide');
        let motivo = $('input[name=motivo]').val();
        api.post('<?=base_url()?>seguimiento/cancelacion',{id:id,motivo:motivo})
        .done(function(data){
            let res = JSON.parse(data);
            console.log(res);
            if(res.ban){
                alertf('','Cancelacion registrada','success',function(){
                    location.href = '<?=base_url()?>seguimiento/';
                })
            }
            else{
                alert('Hubo un error al registrar la cancelación','','error');
            }
        })
        .fail(function(res){
            console.log(res)
        })
    })

</script>