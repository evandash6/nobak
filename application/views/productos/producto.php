<!-- NUEVO PRODUCTO -->
<?php echo form_open_multipart('Inicio/crea_producto');?>
<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr"  >
                <h2>Nuevo Producto</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container collapse">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-4" style="border-right:1px solid #BBBBBB;height: 450px;vertical-align:middle; padding-right:30px">
                            <div class="row m-t-20">
                                <div class="col-md-12">
                                <img id="imgSalida"  class="img img-fluid" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label m-t-20">Foto:</label>
                                    <div class="custom-file">
                                    <input type="file" name="foto_producto" id="foto_producto" >
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
                                    <input required type="text" name="nombre" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                                <div class="col-md-1" style="display:none">
                                    <label for="">Fecha de creacion:</label>
                                    <input type="date" name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-5">
                                    <label for="">Código:</label>
                                    <input type="text" required name="code" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                                <div class="col-md-5">
                                    <label for="">Categoria:</label>
                                    <select name="categoria" class="form-control" id="categoria"><option value="0">Seleccione una Categoria </option>
                                       <?=$categorias?> 
                                    </select>
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
                                    <label for="">Precio $ :</label>
                                    <input name="precio" class="form-control" >
                                </div>
                                <div class="col-md-5">
                                    <label for="">Estatus:</label>
                                    <select required name="activo" class="form-control" id="">
                                    <option value=""> Seleccione un Estatus</option>
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
                            <button type="button" onclick="location.href =''" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
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
<script>


 $(function() {
  $('#foto_producto').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
  
      reader.onload = function(e){
         var result=e.target.result;
        $('#imgSalida').attr("src",result);
      }
       
      reader.readAsDataURL(file);
     }
    });
 

</script>