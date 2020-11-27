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
                        
                        <div class="col-md-8" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Datos Personales</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" autocomplete="off" placeholder="Max 150 caracteres" maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">CURP:</label>
                                    <input type="text" class="form-control" name="curp" autocomplete="off" placeholder="Max 18 caracteres" maxlength="18">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Edad:</label>
                                    <input type="text" class="form-control" name="edad" maxlength="2" placeholder="Max 2">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-3">
                                    <label for="">Fecha de Nacimiento:</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Escolaridad:</label>   
                                    <input type="text" name="escolaridad" class="form-control" maxlength="50" placeholder="Max 50 caracteres">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Especialidad:</label>   
                                    <input type="text" name="especialidad" class="form-control" maxlength="100" placeholder="Max 100 caracteres">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Domicilio:</label>
                                    <input type="text" name="domicilio" class="form-control" autocomplete="off" placeholder="Max 500 caracteres" maxlength="500">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Teléfono Casa:</label>
                                    <input type="text" name="telefono" class="form-control" autocomplete="off" placeholder="Max 15 caracteres" maxlength="15">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Teléfono Celular:</label>
                                    <input type="text" name="celular" class="form-control" autocomplete="off" placeholder="Max 15 caracteres" maxlength="15">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>
                                    <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Max 100 caracteres" maxlength="100">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <h5>Experiendia Laboral</h5>
                                <div class="col-md-12">
                                    <textarea name="actividades" cols="30" rows="5" class="form-control" placeholder="Max 600 caracteres" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-9">
                                    <label for="">Puesto a Ocupar:</label>
                                    <select name="puesto" class="form-control"></select>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Fecha de Ingreso:</label>
                                    <input type="date" name="fecha_ingreso" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <label for="">Descripción de Actividades:</label>
                                    <textarea name="actividades" cols="30" rows="5" class="form-control" placeholder="Max 600 caracteres" maxlength="600"></textarea>
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