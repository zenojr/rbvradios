<?php
	
	class atendimento extends Controller{

		public function findAll(){

			$atendimentoModel = new atendimentoModel;
			$aten = $atendimentoModel->find(null, null, "idatendimento DESC", null, null, null);
			$datas['aten'] = $aten;

			echo json_encode($aten);
			
		}

		public function find(){

			$nivel = $this->getParams('id');

			$atendimentoModel = new atendimentoModel;
			$aten = $atendimentoModel->find(null, " idatendimento = ANY('{$nivel}') ", "idatendimento DESC", null, null, null);
			$datas['aten'] = $aten;

			echo json_encode($aten);
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$atendimentoModel = new atendimentoModel;

			$atendi = $atendimentoModel->find(null, " idatendimento = ? ", null, null, null, Array($id));
			$datas['atendi'] = $atendi;
			echo json_encode($atendi);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['valor']){
				$atendimentoModel = new atendimentoModel;
				$atendi = $atendimentoModel->insere($dadosFim);
				$datas['atendi'] = $atendi;
				echo json_encode($atendi);

			}
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['idatendimento'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$atendimentoModel = new atendimentoModel;
				$atendi = $atendimentoModel->set($dadosFim, " idatendimento = ? ", Array($id));
				$datas['atendi'] = $atendi;
				echo json_encode($atendi);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['idatendimento'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$atendimentoModel = new atendimentoModel;
				$atendi = $atendimentoModel->deletar(" idatendimento = ? ", Array($id));
				$datas['atendi'] = $atendi;
				echo json_encode($atendi);

			}
			
		}

	}

?>