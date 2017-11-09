<?php
	
	class timeline extends Controller{

		public function index_action(){

			$timeline = new timelineModel;

			$timeline->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, b.nome AS nome_dono, b.username, b.perfilname, b.foto AS foto_dono, c.conteudo AS audio", " a.token_dono = b.token_id AND c.token_post_dono = a.token_id", " a.id DESC ", "50", null, Array($id), "timeline a, perfil b, anexos c");

			$datas['time'] = $time;
			echo json_encode($time);
			
		}

		public function getspec(){

			$id = $this->getParams('id');

			$timeline = new timelineModel;

			$time = $timeline->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, b.nome AS nome_dono, b.username, b.perfilname, b.foto AS foto_dono, c.conteudo AS audio", " a.token_dono = b.token_id AND c.token_post_dono = a.token_id AND a.token_dono != ? ", " a.id DESC ", "50", null, Array($id), "timeline a, perfil b, anexos c");

			$datas['time'] = $time;
			echo json_encode($time);
			
		}

		public function getperfil(){

			$id = $this->getParams('id');

			$timeline = new timelineModel;

			$time = $timeline->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, b.nome AS nome_dono, b.username, b.perfilname, b.foto AS foto_dono, c.conteudo AS audio", " a.token_dono = b.token_id AND c.token_post_dono = a.token_id AND a.token_dono = ? ", " a.id DESC ", "50", null, Array($id), "timeline a, perfil b, anexos c");

			$datas['time'] = $time;
			echo json_encode($time);
			
		}

	}

?>