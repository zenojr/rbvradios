<?php

class Model{

	protected $db;

	//BANCO / USUARIO /SENHA
	public function __construct(){
		$this->db = pg_connect("host=postgresql02.rbvradios1.hospedagemdesites.ws port=5432 dbname=rbvradios13 user=rbvradios13 password=lambda6458");
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

