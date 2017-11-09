<?php
    require_once('../../../../service/system/Model.php');
    require_once('../../../../service/system/helpers/segurancaHelper.php');
    $seguranca = new segurancaHelper;
    $seguranca->protegePagina();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>YouTube</title>
    <link href="./css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	    <script type="text/javascript" src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="./js/vendor/jquery.js"><\/script>')</script>
    <script src="./js/main.js"></script>
</head>
  <body>
        <div class="container">
            <div class="row" id="template-container"></div>
        </div>
  </body>
</html>
