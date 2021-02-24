<!-- NUEVO CLIENTE -->
<div class="row">
    <div class="col-md-12">
    <h2>Ver Cliente</h2>
    <hr>
    </div>
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row m-l-10 m-r-10">
                        <div class="col-md-12">
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5><b>Datos de Facturacion</b></h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-8">
                                    <label for="">Nombre:</label>
                                    <input type="text" required name="nombre" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>
                                    <input type="email" class="form-control" name="email" autocomplete="off"  maxlength="18">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de Ingreso:</label>
                                    <input type="date" name="fecha_registro" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Calle y Número:</label>
                                    <input type="text" required name="direccion" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Colonia:</label>   
                                    <input type="text" required name="colonia" class="form-control" maxlength="50" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">Código postal:</label>   
                                    <input type="text" name="cp" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Estado:</label>
                                    <input type="text"  class="form-control" name="nombre_estado_ent">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="nombre_municipio_ent" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Teléfono :</label>
                                    <input type="text" required name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">RFC:</label>
                                    <input type="text" name="rfc" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Uso CFDI:</label>
                                    <input type="text" name="uso_cfdi" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Notas:</label>
                                    <textarea name="nota" cols="30" rows="5" class="form-control"  maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <h5><b>Datos de Entrega (Opcional)</b></h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre_ent" class="form-control">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Código postal:</label>   
                                    <input type="text" name="cp_ent" class="form-control" maxlength="20" >
                                </div>
                                <div class="col-md-2">
                                    <label for="">Teléfono :</label>
                                    <input type="text" name="telefono_ent" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Colonia:</label>   
                                    <input type="text" name="colonia_ent" class="form-control" maxlength="50" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Calle y Número:</label>
                                    <input type="text" name="direccion_ent" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Estado:</label>
                                    <input type="text"  class="form-control" name="nombre_estado" >
                                </div>
                                <div class="col-md-4">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="nombre_municipio" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                            </div> 
                            <div class="row m-t-20">
                                <div class="col-md-12 text-right">
                                    <button  onclick="location.href ='<?=base_url()?>clientes'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                                </div>
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
        let valores =<?=$cliente?>;
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
    })
</script>