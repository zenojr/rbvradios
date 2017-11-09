<?php
	
	class status extends Controller{

		public function findAll(){

			$statusModel = new statusModel;
			$stat = $statusModel->find(null, null, "idstatus DESC", null, null, null);
			$datas['stat'] = $stat;

			echo json_encode($stat);
			
		}

		public function find(){

			$nivel = $this->getParams('id');

			$statusModel = new statusModel;
			$stat = $statusModel->find(null, " idstatus = ANY('{$nivel}') ", "idstatus DESC", null, null, null);
			$datas['stat'] = $stat;

			echo json_encode($stat);
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$statusModel = new statusModel;

			$stat = $statusModel->find(null, " idstatus = ? ", null, null, null, Array($id));
			$datas['stat'] = $stat;
			echo json_encode($stat);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['valor']){
				$statusModel = new statusModel;
				$stat = $statusModel->insere($dadosFim);
				$datas['stat'] = $stat;
				echo json_encode($stat);

			}
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['idstatus'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$statusModel = new statusModel;
				$stat = $statusModel->set($dadosFim, " idstatus = ? ", Array($id));
				$datas['stat'] = $stat;
				echo json_encode($stat);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['idstatus'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$statusModel = new statusModel;
				$stat = $statusModel->deletar(" idstatus = ? ", Array($id));
				$datas['stat'] = $stat;
				echo json_encode($stat);

			}
			
		}

	}

?>