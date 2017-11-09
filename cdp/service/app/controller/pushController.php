<?php
	
	class push extends Controller{

		public function index_action(){
			
		}

		public function enviar(){

			//recebe dados
			$dados = file_get_contents("php://input");
			//decode json
			$dadosFim = json_decode($dados, true);

			//vars
			$mensagem = $dadosFim['descricao'];
			$dadosCliente = json_decode($dadosFim['usudados'], true);

			// print_r($dadosCliente);

			//instancia classe pushBots
			$pb = new pushBotsHelper();

			// Application ID
			$appID = $dadosCliente['appid'];
			// Application Secret
			$appSecret = $dadosCliente['appsecret'];
			$pb->App($appID, $appSecret);

			// Notification Settings
			$pb->Alert($mensagem);
			$pb->Platform(array("0","1")); //$platform 0=> iOS or 1=> Android.

			//icon configure
			// $largeImage = array("largeIcon" => "http://www.transamericavideira.fm.br/imagem/marca.png");
			// $pb->Payload($largeImage);

			//envia
			$pb->Push();

		}

	}

?>