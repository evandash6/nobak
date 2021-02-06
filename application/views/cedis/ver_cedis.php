
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Ver CeDis</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>CeDis</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" required name="cedis" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Tipo:</label>
                                    <select type="text" name="tipo_cedis" placeholder="Seleccione tipo de CeDis" class="form-control">
                                        <option value="1">tipo1</option>
                                        <option value="2">tipo2</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">CDL:</label>
                                    <input type="text" class="form-control" name="cdl" autocomplete="off"  maxlength="18">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de creacion:</label>
                                    <input type="date" name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <h5>Domicilio </h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Calle y número:</label>
                                    <input type="text" required name="direccion" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>   
                                    <input type="text" name="email" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Teléfono :</label>
                                    <input type="text" name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contacto :</label>
                                    <input type="text" name="contacto" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                            </div> 
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>cedis'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$cedis?>[0];
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