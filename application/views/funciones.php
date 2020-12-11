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

    function confirm(titulo,texto,icono,salida=null){
        return new Promise(function(resolve, reject) {
        Swal.fire({
            icon: icono,
            title: titulo,
            text: texto,
            showCancelButton: true,
            confirmButtonColor: '#1dc9b7',
            cancelButtonColor: '#f57379',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar'
        })
        .then(function(result){
            if(result.value){
                resolve(true);
            }
            // else{
            //     reject(false);
            // }
        })
        });
    }

    function modal(titulo,codigo){
        Swal.fire({
        width: 750,
        allowOutsideClick: false,
        position: 'top',
        title: titulo,
        html:codigo,
        showCancelButton: false,
        showConfirmButton: false,
        showCloseButton: true
        })
    }
    function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
  }
  function myFunction() {
    var x = document.getElementById("ocultar");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
  function modal_ver(id,nombre,fecha_creacion){
      Swal.fire({
        title: '<strong>Ver Usuario</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-4">' +
          '<label class="form-label" for="fecha_ini">Fecha de Registro:</label>' +
          '<input class="form-control" readonly id="fechai_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control" id="nombre_modificado" readonly name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button>' +
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_editar(id,nombre,fecha_creacion){
      Swal.fire({
        title: '<strong>Editar Usuario</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-4">' +
          '<label class="form-label" for="fecha_ini">Fecha Registro:</label>' +
          '<input class="form-control"  id="fechac_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control" id="nombre_modificado" name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button><button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_ver_clientes(id,nombre,fecha_registro,direccion,telefono,cp,colonia,email){
      Swal.fire({
        title: '<strong>Ver Cliente</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-4">' +
          '<label class="form-label" for="fecha_ini">Fecha de Registro:</label>' +
          '<input class="form-control" readonly id="fechar_modificada" name="fecha_registro"value="'+fecha_registro+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control"readonly id="nombre_modificado" name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Direccion:</label>' +
          '<input class="form-control" readonly id="direccion_modificada" name="direccion"value="'+direccion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="tel">Telefono:</label>' +
          '<input class="form-control" readonly id="telefono_modificado" name="telefono"value="'+telefono+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="cp">Código Postal:</label>' +
          '<input class="form-control" readonly id="cp_modificado" name="cp"value="'+cp+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="colonia">Colonia:</label>' +
          '<input class="form-control" readonly id="colonia_modificada" name="colonia"value="'+colonia+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="email">E-mail:</label>' +
          '<input class="form-control"readonly id="email_modificado" name="email"value="'+email+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_editar_clientes(id,nombre,fecha_registro,direccion,telefono,cp,colonia,email){
      Swal.fire({
        title: '<strong>Editar Cliente</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-3">' +
          '<label class="form-label" for="fecha_ini">Fecha Registro:</label>' +
          '<input class="form-control" readonly id="fechar_modificada" name="fecha_registro"value="'+fecha_registro+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control" id="nombre_modificado" name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Direccion:</label>' +
          '<input class="form-control" id="direccion_modificada" name="direccion"value="'+direccion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="tel">Telefono:</label>' +
          '<input class="form-control" id="telefono_modificado" name="telefono"value="'+telefono+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="cp">Código Postal:</label>' +
          '<input class="form-control" id="cp_modificado" name="cp"value="'+cp+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="colonia">Colonia:</label>' +
          '<input class="form-control" id="colonia_modificada" name="colonia"value="'+colonia+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="email">E-mail:</label>' +
          '<input class="form-control" id="email_modificado" name="email"value="'+email+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button><button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_ver_cedis(id,cedis,fecha_creacion,direccion,telefono,contacto,email){
      Swal.fire({
        title: '<strong>Ver CeDis</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-3">' +
          '<label class="form-label" for="fecha_ini">Fecha de Creación:</label>' +
          '<input class="form-control" readonly id="fechac_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">CeDis:</label>' +
          '<input class="form-control"readonly id="cedis_modificado" name="nombre"value="'+cedis+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Direccion:</label>' +
          '<input class="form-control" readonly id="direccion_modificada" name="direccion"value="'+direccion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="tel">Telefono:</label>' +
          '<input class="form-control"readonly id="telefono_modificado" name="telefono"value="'+telefono+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="contacto">Contacto:</label>' +
          '<input class="form-control"readonly id="contacto_modificado" name="contacto"value="'+contacto+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="email">E-mail:</label>' +
          '<input class="form-control"readonly id="email_modificado" name="email"value="'+email+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_editar_cedis(id,cedis,fecha_creacion,direccion,telefono,contacto,email){
      Swal.fire({
        title: '<strong>Editar CeDis</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-3">' +
          '<label class="form-label" for="fecha_ini">Fecha de Creación:</label>' +
          '<input class="form-control" readonly id="fechac_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">CeDis:</label>' +
          '<input class="form-control" id="cedis_modificado" name="nombre"value="'+cedis+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Direccion:</label>' +
          '<input class="form-control" id="direccion_modificada" name="direccion"value="'+direccion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="tel">Telefono:</label>' +
          '<input class="form-control" id="telefono_modificado" name="telefono"value="'+telefono+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="contacto">Contacto:</label>' +
          '<input class="form-control" id="contacto_modificado" name="contacto"value="'+contacto+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="email">E-mail:</label>' +
          '<input class="form-control" id="email_modificado" name="email"value="'+email+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button><button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_ver_producto(id,nombre,fecha_creacion,code,descripcion,precio){
      Swal.fire({
        title: '<strong>Ver Producto</strong>',
        icon: '',
        html:
          '<div class="row m-t-10"><div class="col-md-3">' +
          '<label class="form-label" for="fecha_ini">Fecha de Creación:</label>' +
          '<input class="form-control" readonly id="fechac_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control"readonly id="nombre_modificado" name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Código de Producto:</label>' +
          '<input class="form-control" readonly id="code_modificada" name="code"value="'+code+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="des">Descripcion:</label>' +
          '<input class="form-control"readonly id="descripcion_modificada" name="descripcion"value="'+descripcion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="contacto">Precio:</label>' +
          '<input class="form-control"readonly id="precio_modificado" name="precio"value="'+precio+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  function modal_editar_producto(id,nombre,fecha_creacion,code,descripcion,precio){
      Swal.fire({
        title: '<strong>Editar Producto</strong>',
        icon: '',
        html:
        '<div class="row m-t-10"><div class="col-md-3">' +
          '<label class="form-label" for="fecha_ini">Fecha de Creación:</label>' +
          '<input class="form-control" readonly id="fechac_modificada" name="fecha_creacion"value="'+fecha_creacion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="Nombre">Nombre:</label>' +
          '<input class="form-control" id="nombre_modificado" name="nombre"value="'+nombre+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="direccion">Código de Producto:</label>' +
          '<input class="form-control"  id="code_modificado" name="code"value="'+code+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="des">Descripcion:</label>' +
          '<input class="form-control" id="descripcion_modificada" name="descripcion"value="'+descripcion+'"></div></div>'+
          '<div class="row m-t-10"><div class="col-md-12">' +
          '<label class="form-label" for="contacto">Precio:</label>' +
          '<input class="form-control" id="precio_modificado" name="precio"value="'+precio+'"></div></div>'+
          '<div class="row m-t-10 text-right"><div class="col-md-12">' +
          '<button class="btn btn-sm btn-danger btx-cancel">Cancelar</button><button id="id" ide="'+id+'" style="margin-left:10px" class="btn btn-sm btn-primary btx-modificar">Modificar</button>'+
          '</div></div>',
         
          
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        focusConfirm: false,
      })
  }
  
  function modal_html(titulo,html){
    Swal.fire({
        title: titulo,
        icon: '',
        html:html,
        showCloseButton: false,
        showCancelButton: false,
        showConfirmButton: false,
        allowOutsideClick: false,
        focusConfirm: false,
      })
  }

    var api = { 
        get: function (url) {
            return $.ajax({
                url: url,
                type : 'GET',
            });
        },
        post: function (url,data){
            return $.ajax({
                url: url,
                type : 'POST',
                data: data
            });
        }
    }; 
    

    //inicializa menu
    initApp.buildNavigation($("#js-nav-menu"));
</script>
