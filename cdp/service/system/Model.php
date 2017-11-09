<?php
// desliga erros
error_reporting(0);
	
	class Model{
				
		protected $db;
		public $_tabela;

		//BANCO / USUARIO /SENHA
		public function __construct(){
			$this->db = new PDO('pgsql:host=centraldepush.postgresql.dbaas.com.br;dbname=centraldepush', 'centraldepush', 'lampada@@6458');
			$this->db->exec("SET NAMES 'UTF8'");
		}

		//INSERE DADOS
		public function insert(Array $dados){

			//transforma valores em 2 vetores
			foreach ($dados as $inds => $vals) {
				//Json_Descode tem problema para reconhecer quando é um Booleano Falso, 
				//portanto ele verifica se a variavel é boleana, se for e for vazia, ele seta como falsa.
				if (is_bool($vals)) {
					if (empty($vals))
						$vals = 'false';
				}

				//se for diferente de vazio adiciona
				if (!is_null($vals)) {
					//separa campos
					$campos[]  = "{$inds}";
					//separa campos para prepare PDO
					$pdoCampos[] = ":{$inds}";
					//monta array para execução do prepare PDO
					$pdoCamposValores[":{$inds}"] = "{$vals}";
				}

			}

			//trasnforma os vetores em strings e coloca virgulas ( lembre da ASPAS SIMPLES nos valores);
			$campos  = implode(",", $campos);
			$pdoCampos = implode(",", $pdoCampos);

			//query no BD
			$query = $this->db->prepare("INSERT INTO {$this->_tabela} ({$campos}) VALUES ({$pdoCampos}) ");
			$query = $query->execute($pdoCamposValores);

			//Return Array se ocorrer tudo certo
			if ($query) {

				//return Dados
				return $dados;

			}else{

				// print_r($this->db->errorInfo());
			    header("HTTP/1.0 404 Not Found");
			    exit;

			}

		}

		//INSERE DADOS UNICOS
		public function insertUnique(Array $dados){

			//transforma valores em 2 vetores
			foreach ($dados as $inds => $vals) {
				//Json_Descode tem problema para reconhecer quando é um Booleano Falso, 
				//portanto ele verifica se a variavel é boleana, se for e for vazia, ele seta como falsa.
				if (is_bool($vals)) {
					if (empty($vals))
						$vals = 'false';
				}

				//se for diferente de vazio adiciona
				if (!is_null($vals)) {
					//separa campos
					$campos[]  = "{$inds}";
					//separa campos para prepare PDO
					$pdoCampos[] = ":{$inds}";
					//monta array para execução do prepare PDO
					$pdoCamposValores[":{$inds}"] = "{$vals}";
				}

			}

			//trasnforma os vetores em strings e coloca virgulas ( lembre da ASPAS SIMPLES nos valores);
			$campos  = implode(",", $campos);
			$pdoCampos = implode(",", $pdoCampos);

			//query no BD
			$query = $this->db->prepare("INSERT INTO {$this->_tabela} ({$campos}) VALUES ({$pdoCampos}) ");
			$query = $query->execute($pdoCamposValores);

			//Return Array se ocorrer tudo certo
			if ($query) {

				//return Dados
				return $dados;

			}else{

				//return cod de erro
				$arErro = $this->db->errorInfo();
				echo $arErro[0];
			    header("HTTP/1.0 404 Not Found");
			    exit;
			}

		}

		//NEW READ
		public function read($campos = null, $where = null, $orderby = null, $limit = null, $offset = null, $arrayData = null){

			//verifica where se esta ou não vazio
			$campos = ($campos !=  null ? "{$campos}" : "*");
			//verifica where se esta ou não vazio
			$where = ($where !=  null ? "WHERE {$where}" : "");
			//verifica orderby se esta ou não vazio
			$orderby = ($orderby !=  null ? "ORDER BY {$orderby}" : "");
			//verifica limit se esta ou não vazio
			$limit = ($limit !=  null ? "LIMIT {$limit}" : "");
			//verifica offset se esta ou não vazio
			$offset = ($offset !=  null ? "OFFSET {$offset}" : "");

			$query = $this->db->prepare("SELECT {$campos} FROM {$this->_tabela} {$where} {$orderby} {$limit} {$offset}");
			$query->execute($arrayData);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$dados = $query->fetchALL();

			if (!empty($dados)) {
				return $dados;
			}else{
				return [];
			}

		}
		
		//NEW READ COM MULTIPLOS PREFIXOS
		public function readMultiPrefix($campos = null, $where = null, $orderby = null, $limit = null, $offset = null, $arrayData = null, $tabelas = null){

			//verifica where se esta ou não vazio
			$campos = ($campos !=  null ? "{$campos}" : "*");
			//verifica where se esta ou não vazio
			$where = ($where !=  null ? "WHERE {$where}" : "");
			//verifica orderby se esta ou não vazio
			$orderby = ($orderby !=  null ? "ORDER BY {$orderby}" : "");
			//verifica limit se esta ou não vazio
			$limit = ($limit !=  null ? "LIMIT {$limit}" : "");
			//verifica offset se esta ou não vazio
			$offset = ($offset !=  null ? "OFFSET {$offset}" : "");
			//verifica se existe tabelas
			$tabelas = ($tabelas !=  null ? "{$tabelas}" : "{$this->_tabela}");

			$query = $this->db->prepare("SELECT {$campos} FROM {$tabelas} {$where} {$orderby} {$limit} {$offset}");
			$query->execute($arrayData);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$dados = $query->fetchALL();

			if (!empty($dados)) {
				return $dados;
			}else{
				return [];
			}

		}

		//READ DISTINCT
		public function readDistinct($campos = null, $where = null, $orderby = null, $limit = null, $offset = null, $arrayData = null){

			//verifica where se esta ou não vazio
			$where = ($where !=  null ? "WHERE {$where}" : "");
			//verifica campos se esta ou não vazio
			$campos = ($campos !=  null ? "{$campos}" : "");
			//verifica orderby se esta ou não vazio
			$orderby = ($orderby !=  null ? "ORDER BY {$orderby}" : "");
			//verifica limit se esta ou não vazio
			$limit = ($limit !=  null ? "LIMIT {$limit}" : "");
			//verifica offset se esta ou não vazio
			$offset = ($offset !=  null ? "OFFSET {$offset}" : "");

			$query = $this->db->prepare("SELECT DISTINCT {$campos} FROM {$this->_tabela} {$where} {$orderby} {$limit} {$offset}");
			$query->execute($arrayData);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$dados = $query->fetchALL();

			if (!empty($dados)) {
				return $dados;
			}else{
				return [];
			}

		}

		//UPDATE
		public function update(Array $dados, $where, Array $condicao){

			//transforma valores em 2 vetores
			foreach ($dados as $inds => $vals) {
				//Json_Descode tem problema para reconhecer quando é um Booleano Falso, 
				//portanto ele verifica se a variavel é boleana, se for e for vazia, ele seta como falsa.
				if (is_bool($vals)) {
					if (empty($vals))
						$vals = 'false';
				}

				//se for diferente de vazio adiciona
				if (!is_null($vals)) {
					//separa campos para prepare PDO
					$pdoCampos[] = "{$inds} = ?";
					//monta array para execução do prepare PDO
					$pdoCamposValores[] = "{$vals}";
				}

			}

			//ADD Condição no Final do array
			array_push($pdoCamposValores, "{$condicao[0]}");

			//trasnforma os vetores em strings e coloca virgulas ( lembre da ASPAS SIMPLES nos valores);
			$pdoCampos = implode(",", $pdoCampos);

			$query = $this->db->prepare("UPDATE {$this->_tabela} SET {$pdoCampos} WHERE {$where}");
			$query = $query->execute($pdoCamposValores);

			//Return Array se ocorrer tudo certo
			if ($query) {

				//return Dados
				return $dados;

			}else{

				// print_r($this->db->errorInfo());
			    header("HTTP/1.0 404 Not Found");
			    exit;

			}

		}

		//DELETE
		public function delete($where, Array $condicao){

			$query = $this->db->prepare("DELETE FROM {$this->_tabela} WHERE {$where}");
			$query = $query->execute($condicao);
			
			//Return Array se ocorrer tudo certo
			if ($query) {

				echo true;

			}else{

			    header("HTTP/1.0 404 Not Found");
			    exit;

			}

		}

	}

?>