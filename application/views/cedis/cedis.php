 <!-- NUEVO CEDIS -->
<div class="row">
    <div class="col-md-12">
    <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2><b>Nuevo CeDis</b></h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container collapse">
                <div class="panel-content">
                    <form id="frm_nvo_cedis">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Nombre:</label>
                                    <input type="text" required name="nombre" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">CDL:</label>
                                    <input type="text" class="form-control" name="cdl" autocomplete="off"  maxlength="18">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Teléfono :</label>
                                    <input type="text" name="telefono" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="xx-xxxx-xxxx" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de creacion:</label>
                                    <input type="date" name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Dirección:</label>
                                    <input type="text" required name="direccion" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>   
                                    <input type="text" name="email" class="form-control" maxlength="150" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">Contacto :</label>
                                    <input type="text" name="contacto" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12 text-right">
                                    <button type="button" onclick="location.href =''" class="btn btn-danger"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
                                    <button type="button" id="btn_guardar_cedis" class="btn btn-success"><i class="fa fa-save m-r-5"></i> Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LISTADO DE CEDIS -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-2" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="cedis" style="font-size:12px !important">
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
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div>  \
                <div class=' editar_registro btn btn-secondary btn-sm' href='inicio/editar' ide='"+cell.getRow().getData().id+"' cedis='"+cell.getRow().getData().cedis+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'direccion='"+cell.getRow().getData().direccion+"'telefono='"+cell.getRow().getData().telefono+"'contacto='"+cell.getRow().getData().contacto+"'email='"+cell.getRow().getData().email+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='btx_inactivar btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' id='eliminar' title='Eliminar'><i class='fas fa-trash'></i></div>";
        };
    var table = new Tabulator("#cedis", {
        layout:"fitColumns",
        //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        columns:[ //Define Table Columns
            {title:"CeDis", field:"nombre", headerFilter:'input',width:150},
            {title:"Dirección", field:"direccion",headerFilter:'input',width:250 },
            {title:"Contacto", field:"contacto", headerFilter:'input',width:250},
            {title:"Telefono", field:"telefono", headerFilter:'input',width:150},
            {title:"Acciones", formatter:icons, align:"center"},
        ],
        pagination:"local",
        paginationSize:20
    });
    table.setData(<?=$datos?>);

    $('body').on('click','#btn_guardar_cedis',function(e){
        e.preventDefault();
        let forms = $('#frm_nvo_cedis');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>cedis/save_cedis',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Registro de cedis correcto','success',function(){
                        location.href = '<?=base_url()?>cedis/';
                    })
                }
                else{
                    alert('Hubo un error al generar el nuevo cedis','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            })   
        }
        return false; 
    })

    //BOTON VER
    $('body').on('click','.ver_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>cedis/ver_cedis/'+id;
    })

    //Boton editar
    $('body').on('click','.editar_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>cedis/editar_cedis/'+id;
    })

    $('body').on('click','.btx_inactivar',function(){
        let id =  $(this).attr('ide');
        confirm('Inactivar CEDIS','¿Confirmas que deseas inactivar el cedis?, los cedis no se eliminan para conservar el historico de sus actividades..','info',function(){
            api.post('<?=base_url()?>cedis/inactivar_cedis/'+id,)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Cedis inactivado','success',function(){
                        location.href = '<?=base_url()?>cedis/';
                    })
                }
                else{
                    alert('Hubo un error al cambiar el estatus del cedis','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            })
        },
        function(){
            alert('','Inactivacion de cedis cancelada','success');
        })
    })
</script>