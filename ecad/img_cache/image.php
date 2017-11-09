<?php

class Model{

	protected $db;

	//BANCO / USUARIO /SENHA
	public function __construct(){
		$this->db = pg_connect("host=ecadmusicas.postgresql.dbaas.com.br port=5432 dbname=ecadmusicas user=ecadmusicas password=roma@@6458");
	}

	public function getImg($id){

		pg_query($this->db, "begin");
		$objeto = pg_lo_open($this->db, $id, "r");
		header('Content-Type: image/jpeg');
		pg_lo_read_all($objeto);
		pg_lo_close($objeto);
		pg_query($this->db, "commit");
		pg_close($this->db);

	}

}

$md =  new Model();
$md->getImg($_GET['id']);

?>

