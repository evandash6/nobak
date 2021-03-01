<script type="text/javascript" src="<?=base_url()?>frontend/js/summernote-lite.js"></script>
<link rel="stylesheet" href="<?=base_url()?>frontend/css/summernote-lite.min.css">
<div class="row">
    <div class="col-md-12">
        <h2>Ver Forma de Pago</h2>
        <hr>
        <div id="panel-1" class="panel">
            <div class="panel-container">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-2 text-center" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle; padding-right:30px">
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <img name ="img_pago" class="img img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left:30px">
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
                                    <textarea name="descripcion" required cols="30" rows="6" class="form-control" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Mensaje en Email : </label>
                                    <textarea name="mensaje_email" cols="30" rows="6" class="form-control" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                
                            </div>                                     
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>inicio/fpago'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$fpago?>;
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('textarea').each(function(){
            $(this).summernote('code', valores[$(this).attr('name')])
            $(this).summernote('disable');
        })

        if(valores.imagen != null){
            $('img[name=img_pago]').attr('src','<?=base_url()?>frontend/images/payment/'+valores.imagen)
        }
    })
</script>