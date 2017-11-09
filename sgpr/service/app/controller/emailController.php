<?php
	
	class email extends Controller{

		public function index_action(){			

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);

			$dadosFim = json_decode($dados, true);

			
			if ($dadosFim['dono']) {

				//instancia class emailHelper
				$radio = $dadosFim['empresa'];
				$radiosModel = new radiosModel;
				$email = $radiosModel->find("email", " radio = ? ", null, null, null, Array($radio));
				$datas['email'] = $email;
				$email_destino =  $email[0]['email'];

				if (!empty($email_destino)) {

					if ($dadosFim['adiciona']) {
						$atualmente = "Novo Chamado Adicionado"; 
					}else{
						$atualmente = "Chamado Atualizado"; 
					}

					//dados
					$usuario		 = $dadosFim['dono'];
					$assunto 		 = $usuario." - ".$atualmente." - Status: ".strtoupper($dadosFim['status'])." - ".$dadosFim['empresa']." - ".$dadosFim['nome'];

					$email_remetente = "sgpr@rbvradios.com.br"; // NÃO FUNCIONA, PORQ? 
					// $email_remetente = "sgpr@fm929.com.br"; // FUNCIONA

					//instancia class emailHelper
					$emailModel = new emailHelper;
					$emailModel->emailEnvio($usuario, $assunto, $email_remetente, $email_destino, $dadosFim, $atualmente);

				}

			}
			
		}


	}

?>