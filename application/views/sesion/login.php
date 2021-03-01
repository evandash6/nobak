<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>NOBAK</title>
        <meta name="description" content="Panel Administrativo NOBAK">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="icon" type="image/png" href="<?=base_url()?>frontend/images/brillosos.png">
        <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/vendors.bundle.min.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/app.bundle.css">
        <link rel="stylesheet" href="<?=base_url()?>frontend/css/propio.css">
        <script type="text/javascript" src="<?=base_url()?>frontend/js/sweetalert2.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
        <style>
          html, body{
            background-color:#000000 !important;
          }
          .login {
            width: 300px;
            height: 450px;
            background: url(<?=base_url()?>frontend/images/fondo_login.gif) center center no-repeat;
            background-size: cover;
            margin: 30px auto;
            border-radius: 3px;
          }
          .login .form h2 {
            color: #FFF;
            text-align: center;
            font-weight: normal;
            font-size: 18px;
            margin-top: 60px;
            margin-bottom: 10px;
          }
          .login .form input {
            width: 100%;
            height: 40px;
            margin-top: 20px;
            background: rgba(255,255,255,.5);
            border: 1px solid rgba(255,255,255,.1);
            padding: 0 15px;
            color: #FFF;
            border-radius: 2px;
            font-size: 14px;
          }
          .login .form input:focus {
            border: 1px solid rgba(255,255,255,.8);
            outline: none;
          }
          ::-webkit-input-placeholder {
              color: #DDD;
          }
          .login .form input.submit {
            background: rgba(255,255,255,.9);
            color: #444;
            font-size: 15px;
            margin-top: 40px;
            font-weight: bold;
          }
        </style>
    </head>
    <body class="container">
      <script src="<?=base_url()?>frontend/js/vendors.bundle.min.js"></script>
      <script src="<?=base_url()?>frontend/js/app.bundle.min.js"></script>
      <div class="row bg-negro m-t-30 text-center">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4 offset-md-4 login">
              <form id="frm_ini">
                <div class="form">
                  <img src="<?=base_url()?>frontend/images/brillosos.png" alt="">
                  <input type="text" name="email" placeholder="E-mail" required>
                  <input type="password" name="pass" placeholder="Contraseña" required>
                    <div class="row m-t-20">
                      <div class="col-md-10">
                        <div class="g-recaptcha" style="width:100px" data-sitekey="6LcRcz0aAAAAAOxR4z7Duo5rg3sax0E2WJql94nJ"></div>
                      </div>
                    </div>
                  <button type="button" class="btn btn-success btn-block m-t-20 btx_inicio_ses"><i class="fas fa-door-open m-r-5"></i>Inicio de Sesión</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
</body>
<script>
   function captcha() {
        var response = grecaptcha.getResponse();
        if(response.length == 0)
            return false;
        else
            return true;
    }

    $('body').on('click','.btx_inicio_ses',function(){
        let forms = $('#frm_ini');
        if(forms[0].reportValidity() === false){
            forms[0].classList.add('was-validated');
        }
        else{
            if(!captcha()){
                alertf('Captcha obligatorio','','info',function(){
                    return;
                });
            }else{
                let formData = new FormData(forms[0]);
                api.post('<?=base_url()?>sesion/valida_ses',formData,true)
                .done(function(data){
                    let res = JSON.parse(data);
                    //console.log(res);
                    if(res.ban){
                      location.href = '<?=base_url()?>inicio/';
                    }
                    else{
                        $('input[name=pass]').val('');
                        alert('Verifica tus credenciales e intentalo nuevamente','','error');
                    }
                })
                .fail(function(res){
                    console.log(res)
                })
            }
        }
    })
</script>
</html>


