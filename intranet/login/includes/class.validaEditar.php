<?php

class validaEditar{


	function editaAniversario(){


		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			$id       	= $_POST["id"];
			$nome    	= $_POST["nome"];
			$email  	= $_POST["email"];
			$cargo      = $_POST["cargo"];
			$radio      = $_POST["radio"];
			$data  		= $_POST["data"];

			//monda data tipo americano
			$data_explode = explode('/', $data);
			$data_fim = $data_explode[2].'-'.$data_explode[1].'-'.$data_explode[0];

		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM aniversarios WHERE nome = '$nome' AND data = '$data_fim' AND cargo = '$cargo' AND radio = '$radio' AND email ='$email' ");
		$mostra = mysql_num_rows($seleciona);


		if($mostra =='0'){


				$cadastro = mysql_query("UPDATE aniversarios SET nome ='$nome' , email = '$email' , cargo = '$cargo', radio = '$radio' , data = '$data_fim' WHERE id = '$id' ");
					

					if($cadastro == 1){

						echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

					}else{

						echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

					}

		}else{

			echo '<div id="status_erro"> OS DADOS JÁ EXISTEM! </div> <!-- status do envio -->';

		}

	  }

	}//edita cidade



	function editaUsuario(){


		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			$id          = $_POST["id"];
			$senha       = $_POST["senha"];
			$usuario     = $_POST["usuario"];


		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$cadastro = mysql_query("UPDATE usuarios SET senha ='$senha', usuario = '$usuario' WHERE id = '$id' ");
			

			if($cadastro == 1){

				echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

			}else{

				echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

			}

		}


	}//fim editaUsuario


	function editaIp(){


		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			$id          = $_POST["id"];
			$nome      	 = $_POST["nome"];
			$ip     	 = $_POST["ip"];


		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$cadastro = mysql_query("UPDATE bloqueio SET nome ='$nome', ip = '$ip' WHERE id = '$id' ");
			

			if($cadastro == 1){

				echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

			}else{

				echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

			}

		}


	}//fim editaip


	function editaCargo(){


		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			$cargo      	 = $_POST["cargo"];
			$id      	 	 = $_POST["id"];


		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM cargo WHERE cargo = '$cargo'");
		$mostra = mysql_num_rows($seleciona);


		if($mostra =='0'){


				$cadastro = mysql_query("UPDATE cargo SET cargo ='$cargo' WHERE id = '$id'");
					

					if($cadastro == 1){

						echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

					}else{

						echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

					}

		}else{

			echo '<div id="status_erro"> OS DADOS JÁ EXISTEM! </div> <!-- status do envio -->';

		}

	  }


	}//fim CARGO

	function editaRadio(){


		if (isset($_POST['enviar']) && $_POST['enviar'] == 'send') {

			$radio      	 = $_POST["radio"];
			$id      	 	 = $_POST["id"];


		/* começa conecta */
		require_once('class.Conecta.php');
		$ObjConecta = new conexao();


		$seleciona = mysql_query("SELECT * FROM radio WHERE radio = '$radio'");
		$mostra = mysql_num_rows($seleciona);


		if($mostra =='0'){


				$cadastro = mysql_query("UPDATE radio SET radio ='$radio' WHERE id = '$id'");
					

					if($cadastro == 1){

						echo '<div id="status"> ENVIADO COM SUCESSO!</div> <!-- status do envio -->';

					}else{

						echo '<div id="status_erro"> OCORREU ALGUM ERRO, TENTE NOVAMENTE!</div> <!-- status do envio -->';

					}

		}else{

			echo '<div id="status_erro"> OS DADOS JÁ EXISTEM! </div> <!-- status do envio -->';

		}

	  }


	}//fim Radio

}
?>