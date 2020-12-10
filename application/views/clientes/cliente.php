<!-- NUEVO CLIENTE -->
<?php echo form_open_multipart('Inicio/crea_cliente');?>
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Nuevo Cliente</h2>
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
                                    <input type="text" class="form-control" name="email" autocomplete="off"  maxlength="18">
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
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Colonia:</label>   
                                    <input type="text" name="colonia" class="form-control" maxlength="50" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">Código postal:</label>   
                                    <input type="text" name="cp" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="municipio" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Estado:</label>
                                    <input type="text" name="estado" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Teléfono :</label>
                                    <input type="text" name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                </div>
                            </div>
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
                                    <input type="text" name="uso" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Notas:</label>
                                    <textarea name="notas" cols="30" rows="5" class="form-control"  maxlength="600"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                            <button onclick="location.href =''" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
                            <button id="btn_guardar_usuario" class="btn btn-success waves-effect waves-themed"><i class="fa fa-save m-r-5"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LISTADO DE CLIENTES -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Lista de Clientes</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="clientes" style="font-size:12px !important">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>