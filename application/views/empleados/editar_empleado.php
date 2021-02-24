<div class="row">
    <div class="col-md-12">
        <h2>Editar Empleado</h2>
        <hr>
    </div>
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <form id="frm_nvo_empleado">
                                <input type="hidden" name="id">
                                <div class="row m-t-20">
                                    <h5>Datos Personales</h5>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-4">
                                        <label for="">Nombre:</label>
                                        <input type="text" name="nombre" required class="form-control" autocomplete="off" maxlength="150">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">CURP:</label>
                                        <input type="text" class="form-control" name="curp" autocomplete="off" maxlength="18">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">E-mail:</label>
                                        <input type="text" name="email" required class="form-control" autocomplete="off" maxlength="100">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-2">
                                        <label for="">Fecha de Nacimiento:</label>
                                        <input type="date" required name="fecha_nac" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Domicilio:</label>
                                        <input type="text" name="domicilio" class="form-control" autocomplete="off" maxlength="250">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Teléfono Casa:</label>
                                        <input type="text" name="telefono" class="form-control" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="xx-xxxx-xxxx" autocomplete="off" der="Max 15 caracteres" maxlength="12">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Teléfono Celular:</label>
                                        <input type="text" name="celular" class="form-control" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" placeholder="xx-xxxx-xxxx" autocomplete="off" der="Max 15 caracteres" maxlength="12">
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
                                        <textarea name="actividades" cols="30" rows="5" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button onclick="location.href ='<?=base_url()?>empleados'" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        <button id="btn_act_empleado" class="btn btn-info waves-effect waves-themed"><i class="fa fa-edit m-r-5"></i> Actualizar</button>
                        </div>
                    </div>
<script>
   $(document).ready(function(){
        let valores =<?=$empleado?>;
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
        })
        if(valores['foto_emp'] != ''){
            $('img[name=foto_emp]').attr('src','<?=base_url()?>frontend/emps/'+valores['foto_emp'])
        }
    })

    $('body').on('click','#btn_act_empleado',function(e){
        e.preventDefault();
        let forms = $('#frm_nvo_empleado');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>empleados/actualizar_empleado',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Empleado de actualizado','success',function(){
                        location.href = '<?=base_url()?>empleados/';
                    })
                }
                else{
                    alert('Hubo un error al actualizar el empleado','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false;     
    }) 
</script>