<?php
	
	class timeline extends Controller{


		public function getperfil(){

			$id = $this->getParams('id');

			$timeline = new timelineModel;

			$time = $timeline->get("id, valor, arquivo, data", " token_dono = ? ", " id DESC ", null, null, Array($id));

			$datas['time'] = $time;
			echo json_encode($time);
			
		}

	}

?>