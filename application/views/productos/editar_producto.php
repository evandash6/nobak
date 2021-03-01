<link href="<?=base_url()?>frontend/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=base_url()?>frontend/js/fileinput.js"></script> 
<div class="row">
    <div class="col-md-12">
        <form id="frm_act_producto" enctype="multipart/form-data" >
            <h2>Editar Producto</h2>
            <div id="panel-1" class="panel">
                <input type="hidden" name="id">
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-4" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle; padding-right:30px">
                                <div class="row m-t-20">
                                    <div class="col-md-12 text-center">
                                        <img class="img img-fluid" src="<?=base_url()?>frontend/productos/<?=json_decode($producto,true)['fotografia_name']?>" alt="">
                                        <input id="file-1" class="file" type="file" name="foto_producto" class="form-control" data-show-preview="false" data-allowed-file-extensions='["jpg","png","jpeg"]' required> <br />
                                        <small>Tamaño máximo de 2MB en .jpg o .png</small>
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
                                        <select name="categoria_id" class="form-control"><?=$categorias?></select>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-10">
                                        <label for="">Descripción</label>
                                        <textarea name="descripcion" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-5">
                                        <label for="">Precio:</label>    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" step="0.01" name="precio" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Estatus</label>
                                        <select name="activo" class="form-control">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    
                                </div>                                     
                            </div>
                        </div>                
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                            <button type="button"  onclick="location.href ='<?=base_url()?>productos'"  class="btn btn-danger"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                            <button style="margin-left:10px" class="btn btn-primary btx-modificar"><i class="fas fa-edit m-r-5"></i>Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
     
    $("#file-1").fileinput({
        dropZoneTitle: 'Arrastra aqui la foto del producto..',
        showRemove: false,
        showUpload: false,
        showCaption: true,
        showDownload: false,
        showZoom: false,
        showDrag: false,
        required:true,
        msgInvalidFileExtension: 'Extencion invalida en el archivo "{name}". Solo "{extensions}" son tipos de archivo soportado.',
        maxFileSize: 2000
    });


    $(document).ready(function(){
        let valores =<?=$producto?>;
        //console.log(valores);
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
        let forms = $('#frm_act_producto');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>productos/actualizar_producto',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Producto actualizado','success',function(){
                        location.href = '<?=base_url()?>productos';
                    })
                }
                else{
                    alert('Hubo un error al actualizar el producto','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false; 
    })
</script>