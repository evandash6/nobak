<script type="text/javascript" src="<?=base_url()?>frontend/js/summernote-lite.js"></script>
<link rel="stylesheet" href="<?=base_url()?>frontend/css/summernote-lite.min.css">
<link href="<?=base_url()?>frontend/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=base_url()?>frontend/js/fileinput.js"></script> 
<div class="row">
    <div class="col-md-12">
        <h2>Ver Forma de Pago</h2>
        <hr>
        <form id="frm_nvo_fpago" enctype="multipart/form-data">
        <input type="hidden" name="id">
            <div id="panel-1" class="panel">
                <div class="panel-container">
                    <div class="panel-content">
                        <div class="row">
                                <div class="col-md-4 p-r-10 text-center" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle;">
                                    <input type="hidden" name="id">
                                    <div class="row m-t-20">
                                        <div class="col-md-12">
                                            <img name ="img_pago" class="img img-fluid" alt="">
                                            <input id="file-1" class="file" type="file" name="foto_fpago" class="form-control" data-show-preview="false" data-allowed-file-extensions='["jpg","png","jpeg"]'> <br />
                                            <small>Tamaño máximo de 2MB en .jpg o .png</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 " style="padding-left:50px">
                                    <div class="row m-t-20">
                                            <h5>Forma de Pago</h5>
                                    </div>
                                    <div class="row m-t-20">
                                            <div class="col-md-8">
                                                <label for="">Título:</label>
                                                <input type="text" required name="titulo" class="form-control" autocomplete="off" maxlength="150">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Costo $:</label>
                                                <input type="text" name="costo" class="form-control" autocomplete="off" maxlength="150">
                                            </div>
                                            <div class="col-md-1" style="display:none">
                                                <label for="">Fecha de creacion:</label>
                                                <input type="date" name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                            </div>
                                    </div>
                                    <div class="row m-t-20">
                                            <div class="col-md-10">
                                                <label for="">Descripción</label>
                                                <textarea name="descripcion" required cols="30" rows="6" class="form-control summernote" maxlength="600"></textarea>
                                            </div>
                                    </div>
                                    <div class="row m-t-20">
                                            <div class="col-md-10">
                                                <label for="">Mensaje en Email : </label>
                                                <textarea name="mensaje_email" cols="30" rows="6" class="form-control" maxlength="600"></textarea>
                                            </div>
                                    </div>
                                </div>
                        </div>                
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                                <button  onclick="location.href ='<?=base_url()?>inicio/fpago'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                                <button id="btn_act_fpago" type="button" class="btn btn-primary"><i class="fas fa-edit m-r-5"></i>Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
     $("#file-1").fileinput({
        dropZoneTitle: 'Arrastra aqui la foto del producto..',
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

    $(document).ready(function(){

        let valores =<?=$fpago?>;
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('textarea').each(function(){
            $(this).summernote('code', valores[$(this).attr('name')])
            $(this).summernote({
                height: 150,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true 
            })
        })

        if(valores.imagen != null){
            $('img[name=img_pago]').attr('src','<?=base_url()?>frontend/images/payment/'+valores.imagen)
        }

    })

    $('body').on('click','#btn_act_fpago',function(e){
        e.preventDefault();
        let forms = $('#frm_nvo_fpago');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>inicio/actualizar_fpago',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Forma de Pago actualizada','success',function(){
                        location.href = '<?=base_url()?>inicio/fpago';
                    })
                }
                else{
                    alert('Hubo un error al actualizar la forma de pago','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false;     
    }) 
</script>