<script src="https://cdn.jsdelivr.net/npm/echarts@5.0.2/dist/echarts.min.js" integrity="sha256-NZlQFkif+Cpc0rqEGGpSmaU55Vw4aMWK5KC3BRACd/Q=" crossorigin="anonymous"></script>
<div class="row m-t-30">
    <div class="col-md-6">
        <div id="ventas_valor" style="width:100%;height:300px;"></div>
    </div>
    <div class="col-md-6">
        <div id="estatus_ventas" style="width:100%;height:300px;"></div>
    </div>
    
</div>
<script>

function cargar_pie(){
    var estatus_ventas = document.getElementById('estatus_ventas');

    echarts.init(estatus_ventas).setOption({
    title: {
        text: 'Estatus de Ventas',
        left: 'center'
    },
    legend: {
        orient: 'vertical',
        left: 'center',
        top: '80%'
    },
    series: [
        {
            type: 'pie',
            radius: '50%',
            data: <?=json_encode($pie)?>,
            label: {
                formatter: '  {per|{d}%}  ',
                borderColor: '#8C8D8E',
                rich: {
                    per: {
                        color: '#fff',
                        backgroundColor: '#4C5058',
                        padding: [3, 4],
                        borderRadius: 4
                    }
                }
            }
        }
    ]
});
}

function carga_barras(){
    var ventas_valor = document.getElementById('ventas_valor');

    echarts.init(ventas_valor).setOption({
        title: {
            text: 'Valor de Ventas (Mensual)',
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                label: {
                    backgroundColor: '#000000'
                }
            }
        },
        toolbox: {
            feature: {
                saveAsImage: {}
            }
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: [
            {
                type: 'category',
                boundaryGap: false,
                data: <?=json_encode($barras['etiquetas'])?>
            }
        ],
        yAxis: [
            {
                type: 'value'
            }
        ],
        series: [
            {
                type: 'line',
                stack: '总量',
                areaStyle: {},
                emphasis: {
                    focus: 'series'
                },
                data: <?=json_encode($barras['valores'])?>
            }
        ]
    });
}

cargar_pie();
carga_barras();

</script>