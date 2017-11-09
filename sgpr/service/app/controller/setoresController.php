<?php
	
	class setores extends Controller{

		public function index_action(){

			$setoresModel = new setoresModel;
			$setor = $setoresModel->find(null, null, "id DESC", null, null, null);
			$datas['setor'] = $setor;

			echo json_encode($setor);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['nome']){
				$setoresModel = new setoresModel;
				$setor = $setoresModel->insere($dadosFim);
				$datas['setor'] = $setor;
				echo json_encode($setor);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$setoresModel = new setoresModel;

			$setor = $setoresModel->find(null, " id = ? ", null, null, null, Array($id));
			$datas['setor'] = $setor;
			echo json_encode($setor);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$setoresModel = new setoresModel;
				$setor = $setoresModel->set($dadosFim, " id = ? ", Array($id));
				$datas['setor'] = $setor;
				echo json_encode($setor);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$setoresModel = new setoresModel;
				$setor = $setoresModel->deletar(" id = ? ", Array($id));
				$datas['setor'] = $setor;
				echo json_encode($setor);

			}
			
		}

	}

?>