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
                        <div class="col-md-4" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle; padding-right:30px">
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
                                    <input type="text" style="display:none;" id ="id"name="id">
                                    <input type="text" id="nombre_modificado" name="nombre" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de creacion:</label>
                                    <input type="date" readonly name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Código:</label>
                                    <input type="text" readonly name="code" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Categoria:</label>
                                    <select name="tipo" readonly class="form-control" id=""><option value="0">Seleccione una Categoria </option>
                                       <?=$categorias?> 
                                    </select>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Descripción</label>
                                    <textarea id="descripcion_modificada"name="descripcion" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Precio $ :</label>
                                    <input id="precio_modificado"name="precio" class="form-control" >
                                </div>
                                <div class="col-md-5">
                                    <label for="">Estatus:</label>
                                    <select name="estatus" class="form-control" id="estatus_modificado">
                                    <option value=""> Seleccione un Estatus</option>
                                     <option value="1">Disponible</option>
                                     <option value="2">Agotado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                
                            </div>                                     
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>clientes'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
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
        let valores =<?=$producto?>[0];
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
    let nombre = $("#nombre_modificado").val();
     let descripcion = $("#descripcion_modificada").val();
    let precio = $("#precio_modificado").val();
    //let estatus = $("#estatus_modificado").val(); 
	console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/actualizar_producto',
        data: {'id':id,'nombre':nombre,'descripcion':descripcion,'precio':precio},
        success: function (data) {
			console.log(id,nombre);  
			console.log(data);
			alert('','El Producto ha sido modificado','success','<?=base_url()?>inicio/productos');
        }
    });
})
</script>