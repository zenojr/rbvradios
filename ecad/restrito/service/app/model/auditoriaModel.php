<?php
	
	class auditoriaModel extends Model{

		public $_tabela = "auditoria";
	
		public function get($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
		}

		public function insere($dados){
			return $this->insert($dados);
		}

	}

?>