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
                                    <img name="img_producto" src="<?=base_url()?>frontend/images/user.png" class="img img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="custom-file">
                                        <input type="text" class="custom-file-input" id="archivo">
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
                                    <input type="text" readonly name="categoria" class="form-control" autocomplete="off" maxlength="150">
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
                            </div>
                            <div class="row m-t-20">
                                
                            </div>                                     
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>productos'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
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
        console.log(valores);
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
          
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
           
        })
        if(valores.fotografia_name != null){
            $('img[name=img_producto]').attr('src','<?=base_url()?>frontend/productos/'+valores.fotografia_name+'.jpg')
            
        }
    })
    $('body').on('click','.btx-modificar',function(e){
    e.preventDefault();
    $(this).attr('disabled',true)
    let id = $("#id").val();
    let nombre = $("#nombre_modificado").val();
    let descripcion = $("#descripcion_modificada").val();
    let precio = $("#precio_modificado").val();
    let activo = $("#activo_modificado").val();
    //let estatus = $("#estatus_modificado").val(); 
	console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/actualizar_producto',
        data: {'id':id,'nombre':nombre,'descripcion':descripcion,'precio':precio,'activo':activo},
        success: function (data) {
			console.log(id,nombre);  
			console.log(data);
			alert('','El Producto ha sido modificado','success','<?=base_url()?>inicio/productos');
        }
    });
})
</script>