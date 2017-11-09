<?php
	
	class usuarios extends Controller{

		public function index_action(){

			$usuarios = new usuariosModel;

			//user session
			$user = $_SESSION['usuarioNome'];

			$usu = $usuarios->find( " nivel ","	username = ? ", null, null, null, Array($user));
			$datas['usu'] = $usu;
			json_encode($usu);

			if ($usu[0]['nivel'] == 1) {

				$usu = $usuarios->find("id, nome, email, username, foto, perfilname, nivel", null, "id DESC", null, null, null);
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}else{

				$usu = $usuarios->find("id, nome, email, username", "username = ? ", null, null, null, Array($user));
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function userVisualizacaoChamados(){

			$usuarios = new usuariosModel;

			$usu = $usuarios->find("id, nome, email, username, foto, perfilname, nivel", null, "id DESC", null, null, null);
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function infologado(){

			$usuarios = new usuariosModel;

			//user session
			$user = $_SESSION['usuarioNome'];

			//retorna nivel de usuaario logado
			$usu = $usuarios->find("nivel, perfilname, nome, acesso_radios","	username = ? ", null, null, null, Array($user));
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function perfis(){

			$nivel = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->find("id, nome, foto, perfilname", " nivel < ? ", null, null, null, Array($nivel));
			$datas['usu'] = $usu;
			echo json_encode($usu);

		}

		public function findUserAtendimento(){

			$nivel = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->find("id, nome, foto, perfilname", "  nivel = ANY('{$nivel}') ", null, null, null, null);
			$datas['usu'] = $usu;
			echo json_encode($usu);

		}


		public function inserir(){

			$usuarios = new usuariosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);

			//só insere se dados username Tiver conteudo
			if ($dadosFim['username']){
				//Promos
				$usu = $usuarios->insere($dadosFim);
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function getalterar(){

			$id = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->find("id, nome, email, username, foto, perfilname, nivel, acesso_radios", " id = ? ", null, null, null, Array($id));
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function setalterar(){

			$usuarios = new usuariosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				//Promos
				$usu = $usuarios->set($dadosFim, " id = ? ", Array($id));
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function delusuario(){

			$usuarios = new usuariosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				//Promos
				$usu = $usuarios->deletar(" id = ? ", Array($id));
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

	}

?>