<div class="row">
    <div class="col-md-12">
        <h2>Ver Empleado</h2>
        <hr>
    </div>
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Datos Personales</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" required class="form-control" autocomplete="off" der="Max 150 caracteres" maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">CURP:</label>
                                    <input type="text" class="form-control" name="curp" autocomplete="off" der="Max 18 caracteres" maxlength="18">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>
                                    <input type="text" name="email" required class="form-control" autocomplete="off" der="Max 100 caracteres" maxlength="100">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-2">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" required name="fecha_nac" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Domicilio:</label>
                                    <input type="text" name="domicilio" class="form-control" autocomplete="off" der="Max 500 caracteres" maxlength="500">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Teléfono Casa:</label>
                                    <input type="text" name="telefono" class="form-control" autocomplete="off" der="Max 15 caracteres" maxlength="15">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Teléfono Celular:</label>
                                    <input type="text" name="celular" class="form-control" autocomplete="off" der="Max 15 caracteres" maxlength="15">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-8">
                                    <label for="">Puesto a Ocupar:</label>
                                    <select name="puesto_id" class="form-control">
                                        <?=$puestos?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Fecha de Ingreso:</label>
                                    <input type="text" name="fecha_ingreso" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Descripción de Actividades:</label>
                                    <textarea name="actividades" cols="30" rows="5" class="form-control" der="Max 600 caracteres" maxlength="600"></textarea>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button onclick="location.href ='<?=base_url()?>empleados'" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function(){
        let valores =<?=$empleado?>;
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
        if(valores['foto_emp'] != ''){
            $('img[name=foto_emp]').attr('src','<?=base_url()?>frontend/emps/'+valores['foto_emp'])
        }
    })
</script>