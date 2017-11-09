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
			$titulo = strtoupper($dadosFim['status']).' - '.$dadosFim['empresa'].' - '.$dadosFim['dono'];
			$mensagem = $dadosFim['nome'];

			//instancia classe pushBots
			$pb = new pushBotsHelper();

			// Application ID
			$appID = '58d9547b4a9efa04248b4567';
			// Application Secret
			$appSecret = 'fce76eeadadb8b9ad725c6469beaa4a2';
			$pb->App($appID, $appSecret);

			// Notification Settings
			$pb->Alert($mensagem);
			$pb->Platform(array("2", "3")); //$platform 0=> iOS or 1=> Android or => 2 e 3 navegadores
			// Custom fields - payload data
			$customfields= array("title" => $titulo);
			$pb->Payload($customfields);

			//envia
			$pb->Push();

		}

	}

?>