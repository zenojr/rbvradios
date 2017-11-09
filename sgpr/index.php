<?php
    require_once('service/system/Model.php');
    require_once('service/system/helpers/segurancaHelper.php');
    $seguranca = new segurancaHelper;
    $seguranca->protegePagina();
?>
<!DOCTYPE html>
<html lang="pt-BR" ng-app="appSite">
<head>
    <meta charset="utf-8" />
	<title>SGPR - Sistema de Gerenciamento de Projetos - RBV</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=0, width=device-width, height=device-height"/>
    <link rel="stylesheet" href="web-files/css/main.css"/>
    <link rel="stylesheet" href="web-files/css/font-awesome.min.css">
    <!-- favicon -->
	<link rel="shortcut icon" href="/web-files/imagem/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/web-files/imagem/favicon.ico" type="image/x-icon">
</head>
<body ng-controller="PrincipalCtrl as principalCtrl">

	<header id="topo">
        <menu controle="principalCtrl.controle" searchnome="principalCtrl.searchNome.$"></menu>
	</header><!-- Fim #topo -->

	<div id="content">
		
		<ng-view></ng-view><!-- ng-view route angularjs -->
    
	</div><!-- Fim #content -->

    <script src="web-files/js/component.min.js"></script>

    <script src="web-files/js/app.min.js"></script>

    <script src="web-files/js/pushbots.min.js"></script>

    <!-- PushBots SDK -->
    <script src="web-files/js/pushbots-sdk.js" onload="PB.init()" async></script>

</body>
</html>