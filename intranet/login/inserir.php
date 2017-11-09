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
<!--  css engine valider -->
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css">
<!-- css engine valider -->
<!-- carregando scripts -->
<script src="js/jquery-1.6.min.js"></script>
<script src="js/carregando-js.js"></script>
<!-- carregando scripts -->
</head>
<body>
<div id="centro"><!-- começa div centro-->

			<?php
		        /* importa destaques */
		        require_once('includes/class.Painel.php');
		        $ObjImoveis = new painel();
		        $ObjImoveis->admTopoMenu();

		    ?>

				<?php
		        /* pega url e envia  */
		        $url=strip_tags($_SERVER['REQUEST_URI']);
		        //pega url e envia para retornar formulario
		        require_once('includes/class.Painel.php');
		        $ObjImoveis = new painel();
		        $ObjImoveis->add($url);

		    	?>

<div id="carregador">
	<div id="carregador_interno">
		Enviando ... 
		<img src="imagem/carregando.gif">
	</div>
</div>

</div><!-- fim div centro-->
<!-- java script -->
	
		<!-- formata data -->
		<script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			jQuery(function($){
		   $("#data").mask("99/99/9999");
		});
		</script>
		<!-- formata data -->
		
		<!-- js gallery e valida forms -->
        <script  src="js/jquery-1.6.min.js" type="text/javascript"></script>
        <script  src="js/jquery.validationEngine-pt.js" type="text/javascript" charset="utf-8"></script>
        <script  src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
        <!-- bibiliotecas validation forms -->
            <script>      
                jQuery(document).ready(function(){
                    // binds form submission and fields to the validation engine
                    jQuery("#formID2").validationEngine('attach', {promptPosition : "bottomLeft", autoPositionUpdate : false, scroll: false});
                });
            </script>
            <!-- fim biblioteca validation forms -->
<!--  javascript -->
</body>
</html>