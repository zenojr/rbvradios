<?php
	
	class equipamentos extends Controller{

		public function index_action(){

			$equipamentosModel = new equipamentosModel;
			$equi = $equipamentosModel->find(null, " status = '1' OR status = '2' ", "id DESC", null, null, null);
			$datas['equi'] = $equi;

			echo json_encode($equi);
			
		}

		public function getmaxid(){

			$equipamentosModel = new equipamentosModel;
			$equi = $equipamentosModel->find("MAX(id) as id_max", null, "id DESC", null, null, null);
			$datas['equi'] = $equi;

			echo json_encode($equi);
			
		}

		public function getspec(){

			$empresa = $this->getParams('id');

			$equipamentosModel = new equipamentosModel;

			$equi = $equipamentosModel->find(null, " empresa = ? AND status = '1' ", null, null, null, Array($empresa));
			$datas['equi'] = $equi;
			echo json_encode($equi);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['nome']){
				$equipamentosModel = new equipamentosModel;
				$equi = $equipamentosModel->insere($dadosFim);
				$datas['equi'] = $equi;
				echo json_encode($equi);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$equipamentosModel = new equipamentosModel;

			$equi = $equipamentosModel->find(null, " id = ? ", null, null, null, Array($id));
			$datas['equi'] = $equi;
			echo json_encode($equi);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$equipamentosModel = new equipamentosModel;
				$equi = $equipamentosModel->set($dadosFim, " id = ? ", Array($id));
				$datas['equi'] = $equi;
				echo json_encode($equi);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$equipamentosModel = new equipamentosModel;
				$equi = $equipamentosModel->deletar(" id = ? ", Array($id));
				$datas['equi'] = $equi;
				echo json_encode($equi);

			}
			
		}

	}

?>