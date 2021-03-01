<script type="text/javascript" src="<?=base_url()?>frontend/js/summernote-lite.js"></script>
<link rel="stylesheet" href="<?=base_url()?>frontend/css/summernote-lite.min.css">
<link href="<?=base_url()?>frontend/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=base_url()?>frontend/js/fileinput.js"></script> 
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr"  >
                <h2>Nueva Forma de Pago</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <form id="frm_nvo_fpago" enctype="multipart/form-data">
                <div class="panel-container collapse show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-4" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle; padding-right:30px">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label m-t-20">Imagen:</label>
                                        <input id="file-1" class="file" type="file" name="foto_fpago" class="form-control" data-show-preview="true" data-allowed-file-extensions='["jpg","png","jpeg"]' required> <br />
                                        <small>Tamaño máximo de 2MB en .jpg o .png</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8" style="padding-left:30px">
                                <div class="row m-t-20">
                                    <div class="col-md-8">
                                        <label for="">Título:</label>
                                        <input type="text" required name="titulo" class="form-control" autocomplete="off" maxlength="150">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Costo $:</label>
                                        <input type="number" step="0.01" name="costo" class="form-control" autocomplete="off"  required>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-12">
                                        <label for="">Descripción</label>
                                        <textarea name="descripcion" required cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-12">
                                        <label for="">Mensaje en Email : </label>
                                        <textarea name="mensaje_email" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    
                                </div>                                     
                            </div>
                        </div>                
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="location.href =''" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
                                <button id="btn_nvo_fpago" class="btn btn-success waves-effect waves-themed"><i class="fa fa-save m-r-5"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- LISTADO DE FORMAS DE PAGO -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="pago" style="font-size:12px !important">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){
        $('textarea').each(function(){
            $(this).summernote({
                height: 150,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true 
            })
        })
    })

    $("#file-1").fileinput({
        dropZoneTitle: 'Arrastra aqui la foto..',
        showRemove: false,
        showUpload: false,
        showCaption: true,
        showDownload: false,
        showZoom: false,
        showDrag: false,
        required:true,
        msgInvalidFileExtension: 'Extencion invalida en el archivo "{name}". Solo "{extensions}" son tipos de archivo soportado.',
        maxFileSize: 2000
    });

    var icons = function(cell, formatterParams){
        return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Ver'><i class='fas fa-eye'></i></div>  \
                <div class=' editar_registro btn btn-secondary btn-sm' href='inicio/editar' ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Editar'><i class='fas fa-edit'></i></div> \
                <div class='btx_inactivar btn btn-danger btn-sm text-white' ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash'></i></div>";
    };

    var table = new Tabulator("#pago", {
        layout:"fitColumns",
        //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        columns:[ //Define Table Columns
            {title:"No.", field:"id", headerFilter:'input',width:150},
            {title:"Título", field:"titulo",headerFilter:'input',width:350 },
            {title:"Costo", field:"costo",headerFilter:'input',width:100 },
            {title:"Acciones", formatter:icons, align:"center"},
        ],
        pagination:"local",
        paginationSize:20
    });
    table.setData(<?=$datos?>);

    //BOTON VER
    $('body').on('click','.ver_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/ver_fpago/'+id;
    })

    //Boton editar
    $('body').on('click','.editar_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>inicio/editar_fpago/'+id;
    })

    $('body').on('click','.btx_inactivar',function(){
        let id =  $(this).attr('ide');
        confirm('Inactivar Forma de Pago','¿Confirmas que deseas inactivar la forma de Pago?, No se eliminan para conservar el historico de sus actividades..','info',function(){
            api.post('<?=base_url()?>inicio/inactivar_fpago/'+id,)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Forma de pago inactivada','success',function(){
                        location.href = '<?=base_url()?>inicio/fpago';
                    })
                }
                else{
                    alert('Hubo un error al cambiar el estatus de la forma de pago','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            })
        },
        function(){
            alert('','Inactivacion de forma de pago cancelada','success');
        })
    })

    $('body').on('click','#btn_nvo_fpago',function(e){
        e.preventDefault();
        let forms = $('#frm_nvo_fpago');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>inicio/save_fpago',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Forma de Pago guardada','success',function(){
                        location.href = '<?=base_url()?>inicio/fpago';
                    })
                }
                else{
                    alert('Hubo un error al guardar la forma de pago','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false;     
    }) 

    
</script>
