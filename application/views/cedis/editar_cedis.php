
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
                                    <input type="text" style="display:none;" id ="id"name="id" >
                                    <input type="text" id="cedis_modificado" required name="cedis" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Tipo:</label>
                                    <select type="text" readonly name="tipo_cedis" placeholder="Seleccione tipo de CeDis" class="form-control">
                                        <option value="1">tipo1</option>
                                        <option value="2">tipo2</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">CDL:</label>
                                    <input type="text" id="cdl_modificado" class="form-control" name="cdl" autocomplete="off"  maxlength="18">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de creacion:</label>
                                    <input type="date" readonly name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <h5>Domicilio </h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Calle y número:</label>
                                    <input type="text" readonly required name="direccion" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>   
                                    <input type="text" id ="email_modificado" name="email" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Teléfono :</label>
                                    <input type="text" id="telefono_modificado" name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contacto :</label>
                                    <input type="text" id="contacto_modificado" name="contacto" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                            </div> 
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>cedis'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        <button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>
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
           
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
            
        })
    })
    $('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
    $(this).attr('disabled',true)
    let id =  $("#id").val();
    let cedis = $("#cedis_modificado").val();
    let cdl = $("#cdlmodificado").val();
    let telefono=$("#telefono_modificado").val();
    let contacto=$("#contacto_modificado").val();
    let email=$("#email_modificado").val();
    console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/actualizar_cedis',
        data: {'id':id,'cedis':cedis, 'cdl':cdl,'telefono':telefono,
                'contacto':contacto,'email':email},
        success: function (data) {
			console.log(id,cedis);  
			console.log(data);
			alert('','El Cedis ha sido modificado','success','<?=base_url()?>inicio/cedis');
        }
    });
})
</script>