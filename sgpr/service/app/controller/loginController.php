<?php
	
	class login extends segurancaHelper{

		private $usuario;
		private $senha;

		public function index_action(){

			//post usuarios
			$this->usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
			$this->senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';

			//pesquisa usuario
			$segu = new loginModel;
			$existe = $segu->validaUsuario(" id, username, senha ", " username = ? AND senha = ? ", null, null, null, Array($this->usuario, $this->senha) );

			//confirma se tem ou nao
			if ($existe) {

				//get dados user
				$usuarios = new usuariosModel;
				$usu = $usuarios->find(" id, username ", " username = ? ", null, null, null, Array($this->usuario));
				$datas['usu'] = $usu;

				//config session
				//start session
				session_start();
				// session_set_cookie_params(99999999, '/', '.rbvradios.inf.br');
				// session_save_path("/home/usuario/_session_/");

				$_SESSION['usuarioID'] = $usu[0]['id'];
				$_SESSION['usuarioNome'] = $usu[0]['username'];

				// manda para inicial
				header("Location:".$this->linkUrl);

			} else {
				$this->expulsaVisitante();
			}
		
		}

	}

?>