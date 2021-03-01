<script>
    function alert(titulo,texto,icono,salida=null){
        Swal.fire({
        icon: icono,
        title: titulo,
        text: texto
        })
        .then(() => {
            if(salida != null)
                location.href = salida
        })
    }

    function alertf(titulo,texto,icono,fn=function(){}){
        Swal.fire({
        icon: icono,
        title: titulo,
        text: texto,
        onClose: () => {
            fn();
        }
        })
    }

    function confirm(titulo,texto,icono,fn=function(){},fn2=function(){}){
        return new Promise(function(resolve, reject) {
        Swal.fire({
            icon: icono,
            title: titulo,
            html: texto,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar',
            allowOutsideClick: false,
            allowEscapeKey: false
        })
        .then(function(result){
            if(result.value){
                resolve(true);
                fn();
            }
            else{
                fn2();
            }
        })
        });
    }

    function cargando(){
        Swal.fire({
        html: '<div class="row"><div class="col-md-12"><img style="max-width:250px" src="<?=base_url()?>frontend/images/spinner.gif" class="img"></div><div class="col-md-12"><p style="font-size:20px"><b>Espera un momento..</b></p></div></div>',
        showConfirmButton: false,
        allowOutsideClick: false,
        allowEscapeKey: false
        })
    }

    function modal(titulo,codigo,ancho=750,pos='top'){
        Swal.fire({
        width: ancho,
        icon: icono,
        allowOutsideClick: false,
        position: pos,
        title: titulo,
        html:codigo,
        showCancelButton: false,
        showConfirmButton: false,
        showCloseButton: true
        })
    }

    function modal2(titulo,codigo,icono='question',ancho=750,pos='top'){
        Swal.fire({
        width: ancho,
        icon: icono,
        allowOutsideClick: false,
        position: pos,
        title: titulo,
        html:codigo,
        showCancelButton: false,
        showConfirmButton: false,
        showCloseButton: true
        })
    }


  var api = { 
        get: function (url) {
            cargando();
            return $.ajax({
                url: url,
                type : 'GET',
                contentType: false,
                processData: false,
                cache: false
            }).done(function(){ swal.close()});
        },
        post: function (url,data,activo=false,load=true){
            if(activo){
                if(load)
                    cargando();
                return $.ajax({
                    url: url,
                    type : 'POST',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false
                }).done(function(){ swal.close()});
            }
            else{
                if(load)
                    cargando();
                return $.ajax({
                    url: url,
                    type : 'POST',
                    data: data
                }).done(function(){ swal.close()});
            }
        }
    };  

</script>
