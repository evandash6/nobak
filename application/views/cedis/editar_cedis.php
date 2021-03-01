
<div class="row">
    <div class="col-md-12">
        <h2>Editar CeDis</h2>
        <hr>
        <div id="panel-1" class="panel">
            <div class="panel-container show">
                <form id="frm_nvo_cedis">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12" style="padding-left:30px">
                                <div class="row m-t-20">
                                    <div class="col-md-5">
                                        <label for="">Nombre:</label>
                                        <input type="hidden" name="id">
                                        <input type="text" required name="nombre" class="form-control" autocomplete="off"  maxlength="150">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">CDL:</label>
                                        <input type="text" class="form-control" name="cdl" autocomplete="off"  maxlength="18">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono :</label>
                                        <input type="text" name="telefono" class="form-control" autocomplete="off"  maxlength="15">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-4">
                                        <label for="">Dirección:</label>
                                        <input type="text" required name="direccion" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">E-mail:</label>   
                                        <input type="text" name="email" class="form-control" maxlength="20" >
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Contacto :</label>
                                        <input type="text" name="contacto" class="form-control" autocomplete="off"  maxlength="15">
                                    </div>
                                </div>
                        <div class="row m-t-20">
                            <div class="col-md-12 text-right">
                            <button  onclick="location.href ='<?=base_url()?>cedis'"  class="btn btn-danger"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                            <button class="btn btn-primary btx-modificar"><i class="fa fa-edit m-r-5"></i> Modificar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$datos?>;
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
        let forms = $('#frm_nvo_cedis');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            let formData = new FormData(forms[0]);
            api.post('<?=base_url()?>cedis/actualizar_cedis',formData,true)
            .done(function(data){
                let res = JSON.parse(data);
                console.log(res);
                if(res.ban){
                    alertf('','Cedis de actualizado','success',function(){
                        location.href = '<?=base_url()?>cedis/';
                    })
                }
                else{
                    alert('Hubo un error al actualizar el cedis','','error');
                }
            })
            .fail(function(res){
                console.log(res)
            }) 
        }
        return false; 
    })
</script>