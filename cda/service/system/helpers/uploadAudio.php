<?php
	
	class uploadAudio extends Model{

		public function upload($filename){

			//Upload Image OID ====================
			$db = $this->connectPG();
		    pg_query($db, 'begin');
		    $oid = pg_lo_import($db, $filename);
		    pg_query($db, 'commit');
		    pg_close($db);

		    return $oid;

		}

		public function delete($filename){

			//Upload Image OID ====================
			$db = $this->connectPG();
		    pg_query($db, 'begin');
		    $oid = pg_lo_unlink($db, $filename);
		    pg_query($db, 'commit');
		    pg_close($db);

		}

	}

?>