<?php
	
	class nivelacesso extends Controller{

		public function findAll(){

			$nivelacessoModel = new nivelacessoModel;
			$acesso = $nivelacessoModel->find(null, null, "id DESC", null, null, null);
			$datas['acesso'] = $acesso;

			echo json_encode($acesso);
			
		}

		public function find(){

			$nivel = $this->getParams('id');

			$nivelacessoModel = new nivelacessoModel;

			$acesso = $nivelacessoModel->find(null, " nivel = ? ", null, null, null, Array($nivel));
			$datas['acesso'] = $acesso;
			echo json_encode($acesso);
			
		}

		public function findSuporte(){

			$idatendimento = $this->getParams('id');

			$nivelacessoModel = new nivelacessoModel;

			$acesso = $nivelacessoModel->find("nivel", " '{$idatendimento}' = ANY(suporte_atendimento) ", null, null, null, null);
			$datas['acesso'] = $acesso;
			echo json_encode($acesso);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['nivel']){
				$nivelacessoModel = new nivelacessoModel;
				$acesso = $nivelacessoModel->insere($dadosFim);
				$datas['acesso'] = $acesso;
				echo json_encode($acesso);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$nivelacessoModel = new nivelacessoModel;

			$acesso = $nivelacessoModel->find(null, " id = ? ", null, null, null, Array($id));
			$datas['acesso'] = $acesso;
			echo json_encode($acesso);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$nivelacessoModel = new nivelacessoModel;
				$acesso = $nivelacessoModel->set($dadosFim, " id = ? ", Array($id));
				$datas['acesso'] = $acesso;
				echo json_encode($acesso);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$nivelacessoModel = new nivelacessoModel;
				$acesso = $nivelacessoModel->deletar(" id = ? ", Array($id));
				$datas['acesso'] = $acesso;
				echo json_encode($acesso);

			}
			
		}

	}

?>