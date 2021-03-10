<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <div class="row">
                    <div class="col-md-6">
                        <label for="">Forma de Entrega:</label>
                        <input type="text" value="<?=$compra->forma_entrega?>" readonly class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="">CEDIS:</label>
                        <input type="text" value="<?=$compra->cedis_nombre?>" readonly class="form-control">
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-md-12">
                        <h4>Historial de Acciones</h4>
                        <table class="table">
                            <thead class="bg-dark">
                                <tr>
                                    <td>#</td>
                                    <td>Estatus Actual</td>
                                    <td>Fecha y Hora</td>
                                    <td>Siguiente Etapa</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?Php
                                    if(count($his_compras)>0)
                                    for ($i=0; $i < count($his_compras) ; $i++) {
                                        $x = $i+1;
                                        if( $x == count($his_compras)){
                                            $boton = '<td><select venta="'.$his_compras[$i]['venta_id'].'" class="form-control btx_cambio_st">'.$estatus.'</select></td>';
                                        }
                                        else{
                                            $boton = '<td></td>';
                                        }
                                        echo '<tr>
                                                <td>'.($i+1).'</td>
                                                <td>'.$his_compras[$i]['estatus1'].'</td>
                                                <td>'.$his_compras[$i]['fecha_registro'].'</td>
                                                '.$boton.'
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
<script>

    $('header').hide();
    $('.subheader').hide();

    $('body').on('change','.btx_cambio_st',function(){
        let venta_id = $(this).attr('venta');
        let estatus_id = $(this).val();
        api.post('<?=base_url()?>seguimiento/validar_etapa',{estatus_id:estatus_id,venta:venta_id})
        .done(function(data){
            let res = JSON.parse(data);
            //console.log(res);
            if(res.ban){
                alertf('','Etapa autorizada','success',function(){
                    parent.location.reload();
                })
            }
            else{
                alert('Hubo un error al actualizar etapa de compra','','error');
            }
        })
        .fail(function(res){
            console.log(res)
        })
    })
</script>