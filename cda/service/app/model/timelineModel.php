<?php
	
	class timelineModel extends Model{

		// nome da tabela e atributo de nome dela para sub consultas
		public $_tabela = "timeline";
	
		public function get($campos, $where, $orderby, $limit, $offset, $arrayData){
			return $this->read($campos, $where, $orderby, $limit, $offset, $arrayData);
		}

		// consulta com prefixo em tabela
		public function getMultiPrefix($campos, $where, $orderby, $limit, $offset, $arrayData, $tabelas){
			return $this->readMultiPrefix($campos, $where, $orderby, $limit, $offset, $arrayData, $tabelas);
		}
		
	}

?>