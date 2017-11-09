<?php
	
	class usuariosModel extends Model{

		public $_tabela = "usuarios";
	
		public function find($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
		}

		// consulta com prefixo em tabela
		public function findMultiPrefix($campos, $where, $orderby, $limit, $offset, $arrayData, $tabelas){
			return $this->readMultiPrefix($campos, $where, $orderby, $limit, $offset, $arrayData, $tabelas);
		}

		public function insere($dados){
			return $this->insert($dados);
		}

		public function set($dados, $where, $condicao){
			return $this->update($dados, $where, $condicao);
		}

		public function deletar($where, $condicao){
			return $this->delete($where, $condicao);
		}
	}

?>