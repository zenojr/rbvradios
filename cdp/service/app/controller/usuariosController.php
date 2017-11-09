<?php
	
	class usuarios extends Controller{

		public function index_action(){

			$usuarios = new usuariosModel;

			//user session
			$user = $_SESSION['usuarioNome'];

			//pega nivel de usuario
			$usu = $usuarios->getUsuarios(" nivel ","	username = ? ", null, null, null, Array($user) );
			$datas['usu'] = $usu;
			json_encode($usu);
			
			//veirfica qual Select q ele deve fazer
			if ($usu[0]['nivel'] == 1) {

				$usu = $usuarios->getUsuarios("id, nome, username, nivel, token", null, "id DESC", null, null, null);
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}else{

				$usu = $usuarios->getUsuarios("id, nome, username, nivel, token", " username = ? ", null, null, null, Array($user));
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function infologado(){

			$usuarios = new usuariosModel;

			//user session
			$user = $_SESSION['usuarioNome'];

			// echo $user;

			//retorna nivel de usuaario logado
			$usu = $usuarios->getUsuarios("nivel, nome, username, token", " username = ? ", null, null, null, Array($user));
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			//cria json
			$dadosFim = json_decode($dados, true);

			// Gera token
			$dadosFim['token'] = md5(uniqid(rand(), true));

			//só insere se dados username Tiver conteudo
			if ($dadosFim['username']){
				$usuarios = new usuariosModel;
				$usu = $usuarios->insere($dadosFim);
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->getUsuarios("id, nome, email, username, senha, nivel", " id = ? ", null, null, null, Array($id) );
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$usuarios = new usuariosModel;
				$usu = $usuarios->set($dadosFim, " id = ? ", Array($id) );
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$usuarios = new usuariosModel;
				$usu = $usuarios->deletar(" id = ? ", Array($id) );
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}


	}

?>