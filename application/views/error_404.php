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
        <script defer src="<?=base_url()?>frontend/js/all.js"></script>
        <script type="text/javascript" src="<?=base_url()?>frontend/js/sweetalert2.js"></script>
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
        <style>
                            html {
                height:100%;
                }

                body {
                margin:0;
                }

                .bg {
                animation:slide 3s ease-in-out infinite alternate;
                background-image: linear-gradient(-60deg, #6c3 50%, #09f 50%);
                bottom:0;
                left:-50%;
                opacity:.5;
                position:fixed;
                right:-50%;
                top:0;
                z-index:-1;
                }

                .bg2 {
                animation-direction:alternate-reverse;
                animation-duration:4s;
                }

                .bg3 {
                animation-duration:5s;
                }

                .content {
                box-sizing:border-box;
                left:50%;
                padding:10vmin;
                position:fixed;
                text-align:center;
                top:50%;
                transform:translate(-50%, -50%);
                }

                h1 {
                font-family:monospace;
                }

                @keyframes slide {
                0% {
                    transform:translateX(-25%);
                }
                100% {
                    transform:translateX(25%);
                }
                }
        </style>
    </head>
    <body class="container text-center">
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <div class="content">
            <div class="row m-t-40">
                <div class="col-md-6 offset-md-3">
                    <img class="img" src="<?=base_url()?>frontend/images/brillosos.png" alt="">
                </div>
            </div>
            <div class="row m-t-40" style="background-color:rgba(255,255,255,.8);border-radius:.25em;box-shadow:0 0 .25em rgba(0,0,0,.25);">
                <div class="col-md-8 offset-md-2 p-t-10 p-b-10">
                    <h1 style="font-size:30px">Página Web No Encontrada...</h1>
                </div>
            </div>
        </div>
    </body>
    </html>