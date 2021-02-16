
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Nuevo Empleado</h2>
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
                                <div class="col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" style="display:none;" id ="id"name="id" >
                                    <input type="text" readonly name="nombre" required class="form-control" autocomplete="off" der="Max 150 caracteres" maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">CURP:</label>
                                    <input type="text" readonly class="form-control" name="curp" autocomplete="off" der="Max 18 caracteres" maxlength="18">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">E-mail:</label>
                                    <input type="text" id="email_modificado" name="email" required class="form-control" autocomplete="off" der="Max 100 caracteres" maxlength="100">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Contraseña:</label>
                                    <input id="password_modificada"type="password" autocomplete="off" required name="password" class="form-control" maxlength="100">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-3">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" readonly required name="fecha_nac" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Escolaridad:</label>   
                                    <input type="text" name="escolaridad" class="form-control" maxlength="50" der="Max 50 caracteres">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Domicilio:</label>
                                    <input type="text" id="domicilio_modificado" name="domicilio" class="form-control" autocomplete="off" der="Max 500 caracteres" maxlength="500">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Teléfono Casa:</label>
                                    <input type="text" id="telefono_modificado"name="telefono" class="form-control" autocomplete="off" der="Max 15 caracteres" maxlength="15">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Teléfono Celular:</label>
                                    <input type="text" readonly name="celular" class="form-control" autocomplete="off" der="Max 15 caracteres" maxlength="15">
                                </div>
                                
                            </div>
                            <div class="row m-t-20">
                                <h5>Experiendia Laboral</h5>
                                <div class="col-md-12">
                                    <textarea name="actividades" readonly cols="30" rows="5" class="form-control" der="Max 600 caracteres" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-8">
                                    <label for="">Puesto a Ocupar:</label>
                                    <select name="puesto" class="form-control">
                                        <option value="1">Administrador</option>
                                        <option value="2">Almacenista</option>
                                        <option value="3">CeDis</option>
                                        <option value="4">Otro</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fecha de Ingreso:</label>
                                    <input type="date"  readonly name="fecha_ingreso" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Descripción de Actividades:</label>
                                    <textarea readonly name="actividades" cols="30" rows="5" class="form-control" der="Max 600 caracteres" maxlength="600"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>empleados'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        <button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>
                        </div>
                    </div>
<script>
   
    $(document).ready(function(){
        let valores = <?=$empleado?>[0];
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
    let id = $("#id").val();
    let direccion=$("#direccion_modificada").val();
    let telefono=$("#telefono_modificado").val();
    let password=$("#password_modificada").val();
    let cp=$("#cp_modificado").val();
    let colonia=$("#colonia_modificada").val();
    let email=$("#email_modificado").val();
    console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/actualizar_empleado',
        data: {'id':id,'direccion':direccion,'telefono':telefono,'password':password,
                'cp':cp,'colonia':colonia,'email':email},
        success: function (data) {
			console.log(id);  
			console.log(data);
			alert('','El cliente ha sido modificado','success','<?=base_url()?>inicio/empleados');
        }
    }); 
})
</script>