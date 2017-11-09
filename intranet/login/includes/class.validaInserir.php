<?php

class validaInserir{


	function validaAniversario(){

		error_reporting(0);

		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			
			$nome            = $_POST["nome"];
			$email           = $_POST["email"];
			$data            = $_POST["data"];
			$cargo           = $_POST["cargo"];
			$radio           = $_POST["radio"];

			//monda data tipo americano
			$data_explode = explode('/', $data);
			$data_fim = $data_explode[2].'-'.$data_explode[1].'-'.$data_explode[0];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM aniversarios WHERE nome = '$nome'");
		$mostra = mysql_num_rows($seleciona);


		if($mostra =='0'){


					$cadastro = mysql_query("INSERT INTO aniversarios VALUES ('', '$nome' , '$email', '$cargo', '$radio', '$data_fim')");
						

						if($cadastro == 1){

							echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

						}else{

							echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

						}


		}else{

			echo '<div id="status_erro"> NOME JÁ EXISTE! </div> <!-- status do envio -->';

		}

	  }

	}//fim aniver


	function validaUsuario(){

		error_reporting(0);

		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			
			$usuario            = $_POST["usuario"];
			$senha              = $_POST["senha"];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario' ");
		$mostra = mysql_num_rows($seleciona);


		 if($mostra == '0'){

						$cadastro = mysql_query("INSERT INTO usuarios VALUES ( '', '$usuario', '$usuario', '$senha')");
							

							if($cadastro == 1){

								echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

							}else{

								echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

							}

		 }else{

		 	echo '<div id="status_erro"> NOME DE USUÁRIO JÁ EXISTE! </div> <!-- status do envio -->';

		 }

		
	  }


	}//fim user


	function validaIp(){

		error_reporting(0);

		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			
			$nome            = $_POST["nome"];
			$ip              = $_POST["ip"];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM bloqueia WHERE ip = '$ip' AND nome ='$nome' ");
		$mostra = mysql_num_rows($seleciona);


		 if($mostra == '0'){

						$cadastro = mysql_query("INSERT INTO bloqueio VALUES ( '', '$nome', '$ip')");
							

							if($cadastro == 1){

								echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

							}else{

								echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

							}

		 }else{

		 	echo '<div id="status_erro"> IP JÁ EXISTE! </div> <!-- status do envio -->';

		 }

		
	  }


	}//ip

	function validaCargo(){

		error_reporting(0);

		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			
			$cargo            = $_POST["cargo"];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM cargo WHERE  cargo ='$cargo' ");
		$mostra = mysql_num_rows($seleciona);


		 if($mostra == '0'){

						$cadastro = mysql_query("INSERT INTO cargo VALUES ( '', '$cargo')");
							

							if($cadastro == 1){

								echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

							}else{

								echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

							}

		 }else{

		 	echo '<div id="status_erro"> NOME DO CARGO JÁ EXISTE! </div> <!-- status do envio -->';

		 }

		
	  }


	}//cargo


	function validaRadio(){

		error_reporting(0);

		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			
			$radio            = $_POST["radio"];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM radio WHERE  radio ='$radio' ");
		$mostra = mysql_num_rows($seleciona);


		 if($mostra == '0'){

						$cadastro = mysql_query("INSERT INTO radio VALUES ( '', '$radio')");
							

							if($cadastro == 1){

								echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

							}else{

								echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

							}

		 }else{

		 	echo '<div id="status_erro"> NOME JÁ EXISTE! </div> <!-- status do envio -->';

		 }

		
	  }


	}//radio


}
?>