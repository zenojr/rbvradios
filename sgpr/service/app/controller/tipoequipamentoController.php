<?php
	
	class tipoequipamento extends Controller{

		public function index_action(){

			$tipoequipamentoModel = new tipoequipamentoModel;
			$tipo = $tipoequipamentoModel->find(null, null, "id DESC", null, null, null);
			$datas['tipo'] = $tipo;

			echo json_encode($tipo);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['nome']){
				$tipoequipamentoModel = new tipoequipamentoModel;
				$tipo = $tipoequipamentoModel->insere($dadosFim);
				$datas['tipo'] = $tipo;
				echo json_encode($tipo);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$tipoequipamentoModel = new tipoequipamentoModel;

			$tipo = $tipoequipamentoModel->find(null, " id = ? ", null, null, null, Array($id));
			$datas['tipo'] = $tipo;
			echo json_encode($tipo);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$tipoequipamentoModel = new tipoequipamentoModel;
				$tipo = $tipoequipamentoModel->set($dadosFim, " id = ? ", Array($id));
				$datas['tipo'] = $tipo;
				echo json_encode($tipo);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$tipoequipamentoModel = new tipoequipamentoModel;
				$tipo = $tipoequipamentoModel->deletar(" id = ? ", Array($id));
				$datas['tipo'] = $tipo;
				echo json_encode($tipo);

			}
			
		}

	}

?>