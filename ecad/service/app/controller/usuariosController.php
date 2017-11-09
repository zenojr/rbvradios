<?php
	
	class usuarios extends Controller{

		public function index_action(){

			$usuarios = new usuariosModel;

			$usu = $usuarios->getUsuarios("id, nome, foto, perfilname", " nivel = 2 ", "id DESC", null, null, null);
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

		//pega por perfilname
		public function getspec(){

			$id = $this->getParams('id');

			$usuarios = new usuariosModel;

			$usu = $usuarios->getUsuarios("id, nome, foto, perfilname, rua, cidade, telefone, bairro, token_id", " perfilname = ? ", null, null, null, Array($id) );
			$datas['usu'] = $usu;
			echo json_encode($usu);
			
		}

	}

?>