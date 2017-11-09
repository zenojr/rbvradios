<?php
    require_once('service/system/Model.php');
    require_once('service/system/helpers/segurancaHelper.php');
    $seguranca = new segurancaHelper;
    $seguranca->protegePagina();
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="appSite">
<head>
    <meta charset="UTF-8">
    <title>ECAD - RBV</title>
    <link rel="stylesheet" href="web-files/css/main.css"/>
    <link rel="stylesheet" href="web-files/css/font-awesome.min.css">
</head>
<body>

    <div id="topo">
        
        <div class="logo">
            <img src="web-files/imagem/marca_logo.png">
        </div><!-- Fim .logo -->

    </div><!-- Fim #topo -->

    <div id="centro" ng-controller="PrincipalCtrl as prinCtrl">
        
        <menu permissoes="prinCtrl.controle"></menu>
        
        <!-- ng-view -->
        <div ng-view></div>
        
    </div><!-- fim #centro -->
    
    <!-- loading screen -->
    <div class="loading" loading-page>
        <div class="spinner">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
    </div>

    <script src="web-files/js/component.min.js"></script>

    <script src="web-files/js/app.min.js?v=1"></script>
    
</body>
</html>