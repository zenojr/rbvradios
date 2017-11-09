<?php
	
	class postagemModel extends Model{

		// nome da tabela e atributo de nome dela para sub consultas
		public $_tabela = "relatorio";
	
		public function get($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
		}

		// consulta com prefixo em tabela
		public function getMultiPrefix($campos, $where, $orderby, $limit, $offset, $arrayData, $tabelas){
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