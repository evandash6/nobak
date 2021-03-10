<div class="row">
    <div class="col-md-12">
    <h3>Datos Generales</h3>
       <hr>
       <div class="row m-t-10">
        <div class="col-md-4 offset-md-8 text-center">
            <label for="">Estatus:</label>
            <input type="text" name="estatus" style="color:blue" class="form-control no-fondo text-center">
        </div>
       </div>
       <div class="row m-t-20">
           <div class="col-md-3">
                <label for="">Folio de Compra:</label>
                <input type="text" name="folio" class="form-control">
           </div>
           <div class="col-md-3">
                <label for="">Nombre del Cliente:</label>
                <input type="text" name="nombre_cliente" class="form-control">
           </div>
           <div class="col-md-3">
                <label for="">Email:</label>
                <input type="text" name="email" class="form-control">
           </div>
           <div class="col-md-3">
                <label for="">Fecha de Compra:</label>
                <input type="text" name="fecha_compra" class="form-control">
           </div>
       </div>
       <div class="row m-t-20">
           <div class="col-md-12">
           <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2><b>Ver Detalles</b></h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Colapsar"></button>
                    </div>
                </div>
                <div class="panel-container collapse">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-md-12" style="padding-left:30px">
                                <div class="row m-t-20">
                                    <div class="col-md-4">
                                            <label for="">Forma de Pago:</label>
                                            <input type="text" name="forma_pago" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="">Forma de Entrega:</label>
                                            <input type="text" name="forma_entrega" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="">CeDis:</label>
                                            <input type="text" name="cedis_nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <b><h5>Datos de Facturacion</h5></b>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-3">
                                            <label for="">RFC:</label>
                                            <input type="text" name="rfc" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="">Uso CFDI:</label>
                                            <input type="text" name="uso_cfdi" class="form-control">
                                    </div>
                                    <div class="col-md-5">
                                            <label for="">Nota:</label>
                                            <input type="text" name="colonia" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-5">
                                            <label for="">Dirección:</label>
                                            <input type="text" name="direccion" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                            <label for="">CP:</label>
                                            <input type="text" name="cp" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                            <label for="">Colonia:</label>
                                            <input type="text" name="colonia" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                            <label for="">Telefono:</label>
                                            <input type="text" name="telefono" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-3">
                                            <label for="">Estado:</label>
                                            <input type="text" name="estado" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                            <label for="">Municipio:</label>
                                            <input type="text" name="municipio" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <b><h5>Datos de Entrega</h5></b>
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                    <div class="col-md-3">
                                            <label for="">Nombre del Cliente:</label>
                                            <input type="text" name="nombre" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                            <label for="">Email:</label>
                                            <input type="text" name="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                            <label for="">Dirección:</label>
                                            <input type="text" name="direccion" class="form-control">
                                    </div>
                                </div>
                                <div class="row m-t-20">
                                        <div class="col-md-2">
                                            <label for="">CP:</label>
                                            <input type="text" name="cp" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                            <label for="">Colonia:</label>
                                            <input type="text" name="colonia" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                            <label for="">Telefono:</label>
                                            <input type="text" name="telefono" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>              
                    </div>
                </div>
            </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-6 offset-md-3 text-center">
           <h4>Historial de Acciones</h4>
            <table class="table">
                <thead class="bg-dark">
                    <tr>
                        <td>#</td>
                        <td>Estatus Actual</td>
                        <td>Fecha y Hora</td>
                    </tr>
                </thead>
                <tbody>
                    <?Php

                        if(count($his_compras)>0)
                        for ($i=0; $i < count($his_compras) ; $i++) { 
                            echo '<tr>
                                    <td>'.($i+1).'</td>
                                    <td>'.$his_compras[$i]['estatus2'].'</td>
                                    <td>'.$his_compras[$i]['fecha_registro'].'</td>
                                </tr>';
                        }
                    ?>
                </tbody>
            </table>
           </div>
       </div>
       <div class="row">
           <div class="col-md-12 text-right">
            <button  onclick="location.href ='<?=base_url()?>seguimiento'"  class="btn btn-danger"><i class="fa fa-reply m-r-5"></i> Regresar</button>
           </div>
       </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        let valores =<?=$compra?>;
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
        if(valores['foto_emp'] != ''){
            $('img[name=foto_emp]').attr('src','<?=base_url()?>frontend/emps/'+valores['foto_emp'])
        }
    })
</script>