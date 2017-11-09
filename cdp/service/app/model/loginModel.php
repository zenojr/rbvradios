<?php
	
	class loginModel extends Model{

		public $_tabela = "usuarios";
	
		public function validaUsuario($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
		}

	}

?>