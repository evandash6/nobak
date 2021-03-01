<link href="<?=base_url()?>frontend/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="<?=base_url()?>frontend/js/fileinput.js"></script> 
<div class="row">
    <div class="col-md-12">
        <form id="frm_nvo_producto" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label m-t-20">Foto:</label>
                                        <input id="file-1" class="file" type="file" name="foto_fpago" class="form-control" data-show-preview="true" data-allowed-file-extensions='["jpg","png","jpeg"]' required> <br />
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
                                        <select name="categoria_id" class="form-control" ><?=$categorias?> 
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
                                        <label for="">Precio:</label>    
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                            </div>
                                            <input type="number" step="0.01" name="precio" class="form-control" >
                                        </div>
                                    </div>
                                </div>                                    
                            </div>
                        </div>                
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                                <button type="button" onclick="location.href =''" class="btn btn-danger waves-effect waves-themed"><i class="fa fa-ban m-r-5"></i> Cancelar</button>
                                <button id="btn_guardar_producto" class="btn btn-success waves-effect waves-themed"><i class="fa fa-save m-r-5"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
    

    var icons = function(cell, formatterParams){
            return "<div class='btn btn-success ver_registro btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'code='"+cell.getRow().getData().code+"'descripcion='"+cell.getRow().getData().descripcion+"'precio='"+cell.getRow().getData().precio+"'id='ver' title='Ver'><i class='fas fa-eye'></i></div> \
                    <div class='editar_registro btn btn-secondary btn-sm' ide='"+cell.getRow().getData().id+"' nombre='"+cell.getRow().getData().nombre+"'fecha_creacion='"+cell.getRow().getData().fecha_creacion+"'code='"+cell.getRow().getData().code+"'descripcion='"+cell.getRow().getData().descripcion+"'precio='"+cell.getRow().getData().precio+"' id='editar' title='Editar'><i class='fas fa-edit'></i></div>"
        };

    var table = new Tabulator("#productos", {
        layout:"fitColumns",
        //height:205, // set height of table (in CSS or here), this enables the Virtual DOM and improves render speed dramatically (can be any valid css height value)
        columns:[ //Define Table Columns
            {title:"Código", field:"code",headerFilter:'input', width:80},
            {title:"Nombre", field:"nombre",headerFilter:'input',width:250},
            {title:"Categorias", field:"categoria", headerFilter:'input',width:250},
            {title:"Precio", field:"precio",headerFilter:'input', width:100},
            {title:"Fecha de creacion", field:"fecha_creacion",headerFilter:'input', sorter:"date", width:150},
            {title:"Acciones", formatter:icons, align:"center"},
        ], 
        pagination:"local",
        paginationSize:20
    });

    table.setData(<?=$datos?>);
    //Boton ver
    $('body').on('click','.ver_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>productos/ver_producto/'+id;
    })

    $('body').on('click','.btx-cancel',function(){
        swal.close();
    })

    //Boton editar
    $('body').on('click','.editar_registro',function(){
        let id = $(this).attr('ide');
        location.href = '<?=base_url()?>productos/editar_producto/'+id;
    })

    //BTX MODIFICAR
    $('body').on('click','.btx-modificar',function(e){
        e.preventDefault();
        $(this).attr('disabled',true)
        let id = $(this).attr('ide');
        let nombre = $("#nombre_modificado").val();
        let fecha_creacion = $("#fechac_modificada").val();
        let code = $("#code_modificado").val();
        let descripcion = $("#descripcion_modificada").val();
        let precio = $("#precio_modificado").val();
        console.log(id);
        $.ajax({
            type: "POST",
            url: '<?=base_url()?>inicio/editar_producto',
            data: {'id':id,'nombre':nombre, 'fecha_creacion':fecha_creacion,'code':code,'descripcion':descripcion,'precio':precio},
            success: function (data) {
                console.log(id,nombre,fecha_creacion);  
                console.log(data);
                alert('','El Producto ha sido modificado','success','<?=base_url()?>inicio/productos');
            }
        });
    })

    $('body').on('click','#btn_guardar_producto',function(e){
        e.preventDefault();
        let forms = $('#frm_nvo_producto');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>productos/save_producto',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Producto Creado..','success',function(){
                        location.href = '<?=base_url()?>productos';
                    })
                }
                else{
                    alert('Hubo un error al guardar el producto','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false; 
    })
</script>