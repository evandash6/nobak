<!-- NUEVO PRODUCTO -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr"  >
                <h2>Nuevo Producto</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-4" style="border-right:1px solid #BBBBBB;height: 750px;vertical-align:middle; padding-right:30px">
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                    <img src="<?=base_url()?>frontend/images/user.png" class="img img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label m-t-20">Foto:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="archivo">
                                        <label class="custom-file-label" for="customFile">Elegir Archivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Producto</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" autocomplete="off" placeholder="Max 150 caracteres" maxlength="150">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Descripción</label>
                                    <textarea name="actividades" cols="30" rows="3" class="form-control" placeholder="Max 600 caracteres" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Tipo:</label>
                                    <select name="tipo_producto" class="form-control" id="">Seleccione un producto</select>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Precio $:</label>
                                    <input name="tipo_producto" class="form-control" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Estatus:</label>
                                    <select name="tipo_producto" class="form-control" id="">Seleccione un Estatus</select>
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
<!-- LISTADO DE PRODUCTOS -->
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Listado de Productos</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12 m-t-10">
                            <div class="bg-light text-white" id="productos" style="font-size:12px !important">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>