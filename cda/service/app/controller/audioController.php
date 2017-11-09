<?php
	
	class audio extends Controller{

		public function index_action(){
		}

		public function ouvir(){

			//get id url
			$id = $this->getParams('id');

			$audio = new audioHelper;
			$audio->ouvirAudio($id);

		}

		public function download(){

			//get id url
			$id = $this->getParams('id');

			$audio = new audioHelper;
			$audio->downloadAudio($id);

		}

	}

?>