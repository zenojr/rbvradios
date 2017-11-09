<?php
	
	class radios extends Controller{

		public function index_action(){

			$radiosModel = new radiosModel;
			$radios = $radiosModel->find(null, null, "id DESC", null, null, null);
			$datas['radios'] = $radios;

			echo json_encode($radios);
			
		}

		public function find(){

			$nivel = $this->getParams('id');

			$radiosModel = new radiosModel;
			$radios = $radiosModel->find(null, " id = ANY('{$nivel}') ", "id DESC", null, null, null);
			$datas['radios'] = $radios;

			echo json_encode($radios);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['radio']){
				$radiosModel = new radiosModel;
				$radios = $radiosModel->insere($dadosFim);
				$datas['radios'] = $radios;
				echo json_encode($radios);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$radiosModel = new radiosModel;

			$radios = $radiosModel->find(null, " id = ? ", null, null, null, Array($id));
			$datas['radios'] = $radios;
			echo json_encode($radios);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$radiosModel = new radiosModel;
				$radios = $radiosModel->set($dadosFim, " id = ? ", Array($id));
				$datas['radios'] = $radios;
				echo json_encode($radios);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$radiosModel = new radiosModel;
				$radios = $radiosModel->deletar(" id = ? ", Array($id));
				$datas['radios'] = $radios;
				echo json_encode($radios);

			}
			
		}

	}

?>