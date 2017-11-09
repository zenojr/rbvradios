<?php
	
	class audioHelper extends Model{

		protected $db;

		//BANCO / USUARIO /SENHA
		public function __construct(){
			$this->db = $this->connectPG();
		}

		public function ouvirAudio($id){

			pg_query($this->db, "begin");
			$objeto = pg_lo_open($this->db, $id, "r");
 			header('Content-Type: audio/mpeg');
			pg_lo_read_all($objeto);
			pg_lo_close($objeto);
			pg_query($this->db, "commit");
			pg_close($this->db);

		}

		public function downloadAudio($id){

 			pg_query($this->db, "begin");
 			$objeto = pg_lo_open($this->db, $id, "r");
			//nome dos audios 
			$novoNome = $id.".mp3";
			$aquivoNome = $id.".mp3";
			// Configuramos os headers que serÃ£o enviados para o browser
			header('Content-Description: File Transfer');
			header('Content-Disposition: attachment; filename="'.$novoNome.'"');
			header('Content-Type: application/octet-stream');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($aquivoNome));
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Expires: 0');
			// Envia o arquivo para o cliente
			readfile($aquivoNome);
 			pg_lo_read_all($objeto);
 			pg_lo_close($objeto);
 			pg_query($this->db, "commit");
 			pg_close($this->db);

		}

	}

?>