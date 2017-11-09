<?php
require_once("includes/class.Seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página

/* começa conecta */
require_once("includes/class.Conecta.php");
$ObjConecta = new conexao();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>SG - INTRANET - Rbv Rádios </title>
<!-- css da pagina-->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<!-- css da pagina-->
</head>
<body>
<div id="centro"><!-- começa div centro-->
<?php
$cookie = $_COOKIE['permi']; 

		if($cookie == 'permite@#%$**'){

			        /* importa destaques */
			        require_once('includes/class.Painel.php');
			        $ObjImoveis = new painel();
			        $ObjImoveis->admTopoMenu();

					/* pega url e envia  */
					$url=strip_tags($_SERVER['REQUEST_URI']);
					//pega url e envia para retornar formulario
					require_once('includes/class.Painel.php');
					$ObjImoveis = new painel();
					$ObjImoveis->excluir($url);

		}

?>
</div><!-- fim div centro-->
</body>
</html>