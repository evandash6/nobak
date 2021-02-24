<!-- NUEVO EMPLEADO -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2><b>Nuevo Empleado</b></h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container collapse">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <form id="frm_nvo_empleado" action="#">
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
                                    <div class="col-md-3">
                                        <label for="">Fecha de Nacimiento:</label>
                                        <input type="date" required name="fecha_nac" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="">Domicilio:</label>
                                        <input type="text" name="domicilio" class="form-control" required autocomplete="off" maxlength="250">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Teléfono Casa:</label>
                                        <input type="text" name="telefono" placeholder="xx-xxxx-xxxx" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" class="form-control" required autocomplete="off" maxlength="12">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Teléfono Celular:</label>
                                        <input type="text" name="celular" placeholder="xx-xxxx-xxxx" pattern="[0-9]{2}-[0-9]{4}-[0-9]{4}" class="form-control" autocomplete="off" maxlength="12">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-8">
                                        <label for="">Puesto a Ocupar:</label>
                                        <select name="puesto_id" class="form-control" required>
                                            <?=$puestos?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Fecha de Ingreso:</label>
                                        <input type="date" name="fecha_ingreso" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-9">
                                        <label for="">Descripción de Actividades:</label>
                                        <textarea name="actividades" cols="30" rows="5" class="form-control" required maxlength="600"></textarea>
                                    </div>
                                    <div class="col-md-3 m-t-40">
                                        <label for="">Contraseña de Acceso</label>
                                        <input type="password" readonly required name="pass" class="form-control text-center" placeholder="Asignar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>              
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                            <button type="button" onclick="location.href =''" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
                            <button id="btn_guardar_empleado" class="btn btn-info waves-effect waves-themed"><i class="fa fa-save m-r-5"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="panel-1" class="panel">
    <div class="panel-container show">
        <div class="panel-content">
        <section class="content">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 m-t-10">
                    <div class="bg-light text-white" id="tabla_empleados" style="font-size:12px !important"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script>

    var icons = function(cell, formatterParams){
        return "<div class='btx_ver btn btn-primary btn-sm'  ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Ver empelado'><i class='fas fa-eye'></i></div> \
                <div class='btx_editar btn btn-secondary btn-sm'  ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Editar empleado'><i class='fas fa-edit'></i></div> \
                <div class='btx_pass btn btn-info btn-sm'  ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Cambiar contraseña'><i class='fas fa-unlock'></i></div> \
                <div class='btx_inactivar btn btn-danger btn-sm text-white'  ide='"+cell.getRow().getData().id+"' data-toggle='tooltip' title='Inactivar empleado'><i class='fas fa-trash'></i></div>";
    };

    var table = new Tabulator("#tabla_empleados", {
        layout:"fitColumns",
        //height:600, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value) //assign data to table
        columns:[ //Define Table Columns
            {title:"ID", field:"id",width:60 },
            {title:"Nombre Empleado", field:"nombre",headerFilter:'input', width:250},
            {title:"Fecha de alta", field:"fecha_creacion", headerFilter:'input', width:150},
            {title:"E-mail", field:"email", headerFilter:'input', width:150},
            {title:"Telefono", field:"telefono", headerFilter:'input', width:150},
            //{title:"Usuario Creador", field:"usuario_creador", width:150},
            {title:"Acciones", formatter:icons, align:"center"},
        ],
        pagination:"local",
        paginationSize:20
        /* rowClick:function(e, row){ //trigger an alert message when the row is clicked
            alert("nombre " + row.getData().usuario+ " Clicked!!!!");
        }, */
    });
    table.setData(<?=$empleados?>);

    $('body').on('click','.btx_ver',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>empleados/ver_empleado/'+id;
    })

    $('body').on('click','.btx_editar',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>empleados/editar_empleado/'+id;
    })

    $('body').on('click','input[name=pass]',function(){
        modal('Confirma la contraseña','<div class="row m-t-20"><div class="col-md-12"><input type="password" name="pass1" placeholder="contraseña" class="form-control"></div><div class="col-md-12 m-t-20"><input type="password" placeholder="vuelve a escribir la contraseña" name="pass2" class="form-control"></div></div><div class="row m-t-20"><div class="col-md-12 text-right"><button type="button" class="btn btn-primary btx_valida_m"><i class="fas fa-check m-r-5"></i>Validar</button></div></div>',350,'center');
    })

    $('body').on('click','.btx_valida_m',function(){
        let pass = $('input[name=pass1]').val();
        let pass2 = $('input[name=pass2]').val();
        if(pass == pass2){
            alert('','Contraseña asignada','success');
            $('input[name=pass]').val(pass);
        }
        else{
            alertf('Contraseñas DIFERENTES, verifica nuevamente los datos','','info',function(){
                $('input[name=pass]').val('');
            });
        }
    })

    $('body').on('click','#btn_guardar_empleado',function(e){
        e.preventDefault();
        let pass = $('input[name=pass]').val();
        let forms = $('#frm_nvo_empleado');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            if(pass != ''){
                let formData = new FormData(forms[0]);
                api.post('<?=base_url()?>empleados/save_empleado',formData,true)
                .done(function(data){
                    let res = JSON.parse(data);
                    console.log(res);
                    if(res.ban){
                        alertf('','Registro de empleado correcto','success',function(){
                            location.href = '<?=base_url()?>empleados/';
                        })
                    }
                    else{
                        alert('Hubo un error al generar el nuevo empleado','','error');
                    }
                })
                .fail(function(res){
                    console.log(res)
                })
            }
            else{
                alert('','Es necesario asignar una contraseña','info');
            }   
        }
        return false;     
    })

    $('body').on('click','.btx_pass',function(){
        let id =  $(this).attr('ide');
        modal('Cambiar contraseña','<form id="frm_act_pass"><div class="row m-t-20 text-left"><div class="col-md-12"><label>Contraseña:</label><input type="hidden" name="id" value="'+id+'"><input type="password" required name="pass_m1" placeholder="contraseña" class="form-control"></div><div class="col-md-12 m-t-20"><label>Confirmar contraseña:</label><input type="password" required placeholder="vuelve a escribir la contraseña" name="pass_m2" class="form-control"></div></div><div class="row m-t-20"><div class="col-md-12 text-right"><button type="button" class="btn btn-info btx_pass_act"><i class="fas fa-edit m-r-5"></i>Cambiar contraseña</button></div></div></form>',450,'center');
    }) 

    $('body').on('click','.btx_pass_act',function(e){
        e.preventDefault();
        let forms = $('#frm_act_pass');
        let pass = $('input[name=pass_m1]').val();
        let pass2 = $('input[name=pass_m2]').val();
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            if(pass == pass2){
                let formData = new FormData(forms[0]);
                api.post('<?=base_url()?>empleados/act_pass',formData,true)
                .done(function(data){
                    let res = JSON.parse(data);
                    console.log(res);
                    if(res.ban){
                        alertf('','Contraseñas actualizadas','success',function(){
                            location.href = '<?=base_url()?>empleados/';
                        })
                    }
                    else{
                        alert('Hubo un error al cambiar de contraseña','','error');
                    }
                })
                .fail(function(res){
                    console.log(res)
                })
            }
            else{
                alert('','Contraseñas deben ser iguales','info');
            }   
        }
        return false; 
    })

    $('body').on('click','.btx_inactivar',function(){
        let id =  $(this).attr('ide');
        confirm('Inactivar empleado','¿Confirmas que deseas inactivar el empleado?, los empleados no se eliminan para conservar el historico de sus actividades..','info',function(){
            api.post('<?=base_url()?>empleados/inactivar_empleado/'+id,)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Empleado inactivado','success',function(){
                        location.href = '<?=base_url()?>empleados/';
                    })
                }
                else{
                    alert('Hubo un error al cambiar el estatus del empleado','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            })
        },
        function(){
            alert('','Inactivacion de empleado cancelada','success');
        })
    })
</script>