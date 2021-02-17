<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr"  >
                <h2>Editar Forma de Pago</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container">
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
                                <input type="text" style="display:none;" id ="id"name="id" >
                                    <label class="form-label m-t-20">Imagen:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="archivo_modificado">
                                        <label class="custom-file-label" for="customFile">Elegir Archivo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Forma de Pago</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-8">
                                    <label for="">Título:</label>
                                    <input type="text"  id="titulo_modificado"name="titulo" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                                <div class="col-md-2">
                                    <label for="">Costo $:</label>
                                    <input type="text" id="costo_modificado"name="costo" class="form-control" autocomplete="off" maxlength="150">
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Descripción</label>
                                    <textarea id="descripcion_modificada"name="descripcion" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-10">
                                    <label for="">Mensaje en Email : </label>
                                    <textarea id ="mensaje_email_modificado"name="mensaje_email" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                </div>
                            </div>
                            <div class="row m-t-20">
                                
                            </div>                                     
                        </div>
                    </div>                
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>pagos'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
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
        let valores =<?=$pago?>[0];
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
    let id =  $("#id").val();
    //let archivo = $("#archivo_modificado").val();
    let titulo = $("#titulo_modificado").val();
    let costo=$("#costo_modificado").val();
    let descripcion=$("#descripcion_modificada").val();
    let mensaje_email=$("#mensaje_email_modificado").val();
    console.log(id);
    $.ajax({
        type: "POST",
        url: '<?=base_url()?>inicio/actualizar_pago',
        data: {'id':id,'titulo':titulo, 'descripcion':descripcion,'costo':costo,'mensaje_email':mensaje_email},
        success: function (data) {
			console.log(id,titulo);  
			console.log(data);
			alert('','La Forma de Pago ha sido modificada','success','<?=base_url()?>inicio/pago');
        }
    });
})
</script>