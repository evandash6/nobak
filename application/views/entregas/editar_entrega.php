<script type="text/javascript" src="<?=base_url()?>frontend/js/summernote-lite.js"></script>
<link rel="stylesheet" href="<?=base_url()?>frontend/css/summernote-lite.min.css">
<div class="row">
    <div class="col-md-12">
        <form id="frm_mod_entrega">
            <h2>Editar Forma de Entrega</h2>
            <hr>
            <div id="panel-1" class="panel">
                <div class="panel-container">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12" style="padding-left:30px">
                                <div class="row m-t-20">
                                    <div class="col-md-8">
                                        <label for="">Título:</label>
                                        <input type="text" style="display:none;" id ="id"name="id" >
                                        <input type="text" id="titulo_modificado" required name="titulo" class="form-control" autocomplete="off" maxlength="150">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Costo $:</label>
                                        <input type="text" id="costo_modificado" name="costo" class="form-control" autocomplete="off" maxlength="150">
                                    </div>
                                    <div class="col-md-1" style="display:none">
                                        <label for="">Fecha de creacion:</label>
                                        <input type="date" name="fecha_creacion" value="<?php echo date("Y-m-d");?>" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-10">
                                        <label for="">Descripción</label>
                                        <textarea id="descripcion_modificada" name="descripcion" required cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-10">
                                        <label for="">Mensaje en Email : </label>
                                        <textarea id="mensaje_email_modificado" name="mensaje_email" cols="30" rows="3" class="form-control" maxlength="600"></textarea>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    
                                </div>                                     
                            </div>
                        </div>                
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                            <button type="button"  onclick="location.href ='<?=base_url()?>inicio/entregas'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                            <button type="button" class="btn btn-primary btx-modificar"><i class="fas fa-edit m-r-5"></i> Modificar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$entrega?>;
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
           
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            
        })
        $('textarea').each(function(){
            $(this).summernote('code', valores[$(this).attr('name')])
            $(this).summernote({
                height: 150,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true 
            })
        })
    })

    $('body').on('click','.btx-modificar',function(e){
        e.preventDefault();
        let forms = $('#frm_mod_entrega');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>inicio/actualizar_entrega',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Forma de Entrega actualizada','success',function(){
                        location.href = '<?=base_url()?>inicio/entregas';
                    })
                }
                else{
                    alert('Hubo un error al actualizar la forma de entrega','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false; 
    });
</script>