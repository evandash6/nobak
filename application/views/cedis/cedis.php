 <!-- NUEVO CEDIS -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Nuevo CeDis</h2>
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
                                <div class="col-md-8">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">CDL:</label>
                                    <input type="text" class="form-control" name="email" autocomplete="off"  maxlength="18">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <h5>Domicilio </h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Calle:</label>
                                    <input type="text" name="calle" class="form-control">
                                </div>
                                <div class="col-md-1">
                                    <label for="">Número:</label>
                                    <input type="text" name="numero" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Colonia:</label>   
                                    <input type="text" name="colonia" class="form-control" maxlength="50" >
                                </div>
                                <div class="col-md-3">
                                    <label for="">E-mail:</label>   
                                    <input type="text" name="email" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="municipio" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Teléfono :</label>
                                    <input type="text" name="telefono" class="form-control" autocomplete="off"  maxlength="15">
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
<!-- LISTADO DE CEDIS -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Listado de CeDis</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="cedis" style="font-size:12px !important">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>