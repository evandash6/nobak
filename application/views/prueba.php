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
                   
                            <div class="row m-t-20">
                                <div class="col-md-4">
                                    <label for="">Estado:</label>
                                    <select  class="form-control" name="estado" id="estado">
                                       <option value="0">Seleccione un Estado :
                                       </option> 
                                       <?=$estado?>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label for="">Municipio:</label>
                                    <input type="text" name="municipio" class="form-control" autocomplete="off"  maxlength="50">
                                </div>
                                
                        </div>
                    </div>                
                   
                </div>
            </div>
        </div>
    </div>
</div>
