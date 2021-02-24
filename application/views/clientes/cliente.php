
<!-- LISTADO DE CLIENTES -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="clientes" style="font-size:12px !important">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var icons = function(cell, formatterParams){
        return "<div class='btn btn-primary ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Ver cliente'><i class='fas fa-eye'></i></div> ";
    };

    var table = new Tabulator("#clientes", {
        layout:"fitColumns",
        //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        columns:[ //Define Table Columns
            {title:"ID", field:"id", width:60},
            {title:"Nombre", field:"nombre",headerFilter:'input', width:250},
            {title:"E-mail", field:"email",headerFilter:'input',width:200 },
            {title:"Ultimo Acceso", field:"ultimo_acceso", headerFilter:'input',width:150},
            {title:"Fecha de Registro", field:"fecha_registro", headerFilter:'input',width:150},
            {title:"Acciones", formatter:icons, align:"center"},
        ],
        pagination:"local",
        paginationSize:20
    });

    table.setData(<?=$datos?>);

    $('body').on('click','.ver_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>clientes/ver_cliente/'+id;
    })
</script>