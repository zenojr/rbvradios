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

				$usu = $usuarios->getUsuarios("id, nome, username, foto, nivel", null, "id DESC", null, null, null);
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}else{

				$usu = $usuarios->getUsuarios("id, nome, username, foto, nivel", " username = ? ", null, null, null, Array($user));
				$datas['usu'] = $usu;
				echo json_encode($usu);

			}
			
		}

		public function infologado(){

			$usuarios = new usuariosModel;

			//user session
			$user = $_SESSION['usuarioNome'];

			//retorna nivel de usuaario logado
			$usu = $usuarios->getUsuarios("nivel, nome, username, token_id, foto", " username = ? ", null, null, null, Array($user));
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			//cria json
			$dadosFim = json_decode($dados, true);

			// Gera token
			$dadosFim['token_id'] = md5(uniqid(rand(), true));

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

			$usu = $usuarios->getUsuarios("id, nome, email, username, foto, perfilname, senha, foto, nivel", " id = ? ", null, null, null, Array($id) );
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		//pega por perfilname
		public function getspec(){

			$id = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->getUsuarios("id, nome, foto, perfilname, token_id", " perfilname = ? ", null, null, null, Array($id) );
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		//ignorar pesquisa por perfilname
		public function getnotspec(){

			$id = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->getUsuarios("id, nome, foto, perfilname, token_id, nivel", " token_id != ? AND nivel != 1 ", null, null, null, Array($id) );
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

		public function deletefotousuario($url){

			//se vaziu pega valor
			if (empty($url)) {

				$dados = file_get_contents("php://input");
				$dadosFim = json_decode($dados, true);

				$url = $dadosFim['foto'];
			}

			//delete image
			$ftUp = new uploadImage();
			$ftUp->delete($url);
		}

		public function uploadfoto(){

			//Upload Foto
			if ($_FILES["file"]) {
				$ftUp = new uploadImage();
				echo $ftUp->upload($_FILES["file"]["tmp_name"]);
			}

		}

	}

?>