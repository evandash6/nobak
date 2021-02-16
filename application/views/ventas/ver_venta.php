<div class="row">
    <div class="col-md-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>Ver Detalle de Venta</h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12" style="padding-left:30px">
                            <div class="row m-t-20">
                                <h5>Ventas</h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-6">
                                    <label for="">No. Folio:</label>
                                    <input type="text" required name="folio" class="form-control" autocomplete="off"  maxlength="150">
                                </div>
                                <div class="col-md-4">
                                    <label for="">E-mail:</label>   
                                    <input type="text" name="email" class="form-control" maxlength="20" >
                                </div>
                            </div>
                            <div class="row m-t-20">
                                <h5>Detalle </h5>
                            </div>
                            <div class="row m-t-20">
                                <div class="col-md-1">
                                    <label for="">Cantidad:</label>
                                    <input type="text" required name="cantidad" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="">Producto:</label>   
                                    <input type="text" name="producto" class="form-control" maxlength="20" >
                                </div>
                                <div class="col-md-2">
                                    <label for="">Precio $:</label>   
                                    <input type="text" name="precio" class="form-control" maxlength="20" >
                                </div>
                                <div class="col-md-1">
                                    <label for="">I.V.A $:</label>   
                                    <input type="text" name="iva" class="form-control" maxlength="20" >
                                </div>
                                <div class="col-md-2">
                                    <label for="">Subtotal $:</label>   
                                    <input type="text" name="subtotal" class="form-control" maxlength="20" >
                                </div>
                            </div>
                    <div class="row m-t-20">
                        <div class="col-md-12 text-right">
                        <button  onclick="location.href ='<?=base_url()?>ventas'"  class="btn btn-danger waves-effect waves-themed"><i class="fa fa-reply m-r-5"></i> Regresar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$venta?>[0];
        $('input').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('select').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
        $('textarea').each(function(){
            $(this).val(valores[$(this).attr('name')])
            $(this).attr('disabled',true)
        })
    })
</script>