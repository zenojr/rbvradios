<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Rede Barriga Verde - Intranet</title>
	<meta http-equiv="X-UA-Compatible" content="IE=8" />
	<link rel="stylesheet" type="text/css" href="css/estilo.css"> <!-- css da pagina -->
	<script type="text/javascript" src="js/ClearCampos.js"></script>
	<script  type="text/javascript"  src="js/jquery-1.3.2.js"></script>
	<script  type="text/javascript"  src="js/ValForm.js"></script>
	<script  type="text/javascript"  src="js/easter.js"></script>
		<!-- google analytics -->
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-42888268-1', 'rbvradios.inf.br');
		  ga('send', 'pageview');

		</script>
		<!-- google analytics -->
</head>
<body onkeydown="log_keystrokes(event);">

	<div id="corpo"><!-- comeca corpo -->
	
	<?php

		$ip = $_SERVER["REMOTE_ADDR"];

		//biblioteca class.Bloqueia
		//class blqoueado
		//function Aniversariantes
		require_once('includes/class.Bloqueia.php');
		$objbloqueia = new bloqueado;
		$objbloqueia->desbloqueia($ip);

	?>

	</div><!-- fim corpo -->

</body>
</html>