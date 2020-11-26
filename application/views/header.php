<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Olimpoos</title>
        <meta name="description" content="Sistema Web Administrativo Olimpoos">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="icon" type="image/png" href="<?=base_url()?>frontend/images/logo.png">
        <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/vendors.bundle.min.css">
        <link rel="stylesheet" media="screen, print" href="<?=base_url()?>frontend/css/app.bundle.min.css">
        <link rel="stylesheet" href="<?=base_url()?>frontend/css/propio.css">
        <script src="https://kit.fontawesome.com/7898ee300d.js" crossorigin="anonymous"></script>
        <!-- Tabulator -->
        <link rel="stylesheet" href="<?=base_url()?>frontend/css/tabulator_propio.css">
        <script type="text/javascript" src="<?=base_url()?>frontend/js/tabulator.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>frontend/js/sweetalert2.js"></script>
        
    </head>
    <body class="mod-bg-1">
    <script>
        'use strict';
        var classHolder = document.getElementsByTagName("BODY")[0],
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) : 
        {},
        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';
        if(themeSettings.themeOptions&&(classHolder.className=themeSettings.themeOptions),themeSettings.themeURL&&!document.getElementById("mytheme")){var cssfile=document.createElement("link");cssfile.id="mytheme",cssfile.rel="stylesheet",cssfile.href=themeURL,document.getElementsByTagName("head")[0].appendChild(cssfile)}var saveSettings=function(){themeSettings.themeOptions=String(classHolder.className).split(/[^\w-]+/).filter(function(e){return/^(nav|header|mod|display)-/i.test(e)}).join(" "),document.getElementById("mytheme")&&(themeSettings.themeURL=document.getElementById("mytheme").getAttribute("href")),localStorage.setItem("themeSettings",JSON.stringify(themeSettings))},resetSettings=function(){localStorage.setItem("themeSettings","")};
    </script>
    <script src="<?=base_url()?>frontend/js/vendors.bundle.min.js"></script>
    <script src="<?=base_url()?>frontend/js/app.bundle.min.js"></script>
    <!-- <script type="text/javascript" src="<=base_url()?>frontend/js/jquery.mask.js"></script> -->
    <div class="page-wrapper"><div class="page-inner">
    <aside class="page-sidebar"><div class="page-logo"> <img src="<?=base_url()?>frontend/images/logo.png" class="img img-fluid" alt="Olimpoos WebApp"> <span class="page-logo-text mr-1"> Olimpoos </span> </div><nav id="js-primary-nav" class="primary-nav" role="navigation"> <div class="nav-filter"> <div class="position-relative"> <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0"> <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar"> <i class="fal fa-chevron-up"></i> </a> </div></div>
                    