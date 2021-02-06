<!-- NUEVO CLIENTE -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Ver Cliente</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Datos Personales</h5>
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
                                <h5>Domicilio de entrega</h5>
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
                                    <select  class="form-control" name="estado" id="estado">
                                        <option value="">Seleccione un Estado</option>
                                        <?=$estado?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="municipio" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Teléfono :</label>
                                    <input type="text" required name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                            </div>
                           
                            <div  style ="display:block" class="row m-t-10">
                                <div class="row m-t-20">
                                    <h5>Datos de facturación (Opcional)</h5>
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
                                    <div class="col-md-6">
                                        <label for="">Calle y Número:</label>
                                        <input type="text" name="direccionf" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Colonia:</label>   
                                        <input type="text" name="coloniaf" class="form-control" maxlength="50" >
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Código postal:</label>   
                                        <input type="text" name="cpf" class="form-control" maxlength="20" >
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-4">
                                        <label for="">Estado:</label>
                                        <select  class="form-control" name="estadof" id="estado">
                                            <option value="">Seleccione un Estado</option>
                                            <?=$estado?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Municipio:</label>
                                        <input type="text" name="municipiof" class="form-control" autocomplete="off"  maxlength="50">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono :</label>
                                        <input type="text" name="telefonof" class="form-control" autocomplete="off"  maxlength="15">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-12">
                                        <label for="">Notas:</label>
                                        <textarea name="nota" cols="30" rows="5" class="form-control"  maxlength="600"></textarea>
                                    </div>
                                </div>
                            </div>
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
<script>
    $(document).ready(function(){
        let valores =<?=$cliente?>[0];
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