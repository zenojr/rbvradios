<?php
	
	class clientes extends Controller{

		public function index_action(){

		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			//decode json
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['nome']){
				$clientes = new clientesModel;
				$clie = $clientes->insere($dadosFim);
				$datas['clie'] = $clie;
				echo json_encode($clie);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$clientes = new clientesModel;

			$clie = $clientes->get("id, nome, appid, appsecret, dono_token", " id = ? ", null, null, null, Array($id) );
			$datas['clie'] = $clie;
			echo json_encode($clie);
			
		}

		//pega por token
		public function getspec(){

			$id = $this->getParams('id');

			$clientes = new clientesModel;

			$clie = $clientes->get("id, nome, appid, appsecret", " '{$id}' = ANY (dono_token) ", "id DESC", null, null, null);
			$datas['clie'] = $clie;
			echo json_encode($clie);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$clientes = new clientesModel;
				$clie = $clientes->set($dadosFim, " id = ? ", Array($id) );
				$datas['clie'] = $clie;
				echo json_encode($clie);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$clientes = new clientesModel;
				$clie = $clientes->deletar(" id = ? ", Array($id) );
				$datas['clie'] = $clie;
				echo json_encode($clie);

			}
			
		}


	}

?>