<?php
	
	class nivelacessoModel extends Model{

		public $_tabela = "niveis_acesso";
	
		public function find($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
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