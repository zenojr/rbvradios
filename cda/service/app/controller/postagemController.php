<?php
	
	class postagem extends Controller{

		public function index_action(){

			$postagem = new postagemModel;

			$post = $postagem->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, b.nome AS nome_dono, b.username, b.perfilname, b.foto AS foto_dono, c.conteudo AS audio", " a.token_dono = b.token_id AND c.token_post_dono = a.token_id", " a.id DESC ", "50", null, Array($id), "timeline a, perfil b, anexos c");

			$datas['post'] = $post;
			echo json_encode($post);	
			
		}

		public function getspec(){

			$id = $this->getParams('id');

			$postagem = new postagemModel;

			$post = $postagem->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, b.nome AS nome_dono, b.username, b.perfilname, b.foto AS foto_dono, c.conteudo AS audio", " a.token_dono = b.token_id AND c.token_post_dono = a.token_id AND a.token_dono = ? ", " a.id DESC ", "50", null, Array($id), "timeline a, perfil b, anexos c");
			
			$datas['post'] = $post;
			echo json_encode($post);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			//cria json
			$dadosFim = json_decode($dados, true);

			// Gera token
			$dadosFim['token_id'] = md5(uniqid(rand(), true));

			if ($dadosFim['audio']){

				//insere anexo
				$dadosAnexo['conteudo'] 		= $dadosFim['audio'];
				$dadosAnexo['token_id'] 		= md5(uniqid(rand(), true));
				$dadosAnexo['token_post_dono']	= $dadosFim['token_id'];


				$anexos = new anexosModel;
				$anex = $anexos->insere($dadosAnexo);
				$datas['anex'] = $anex;
				// echo json_encode($anex);

			}

			//só insere se dados username Tiver conteudo
			//remover audio de vetor
			unset($dadosFim['audio']);
			
			if ($dadosFim['titulo']){
				$postagem = new postagemModel;
				$post = $postagem->insere($dadosFim);
				$datas['post'] = $post;
				echo json_encode($post);
			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$postagem = new postagemModel;

			$post = $postagem->getMultiPrefix("a.id, a.titulo, a.descricao, a.token_id, a.token_dono, (date_part('epoch', a.data::timestamp) * 1000) as data, c.conteudo AS audio, c.token_id AS token_audio", "c.token_post_dono = a.token_id AND a.id = ?", null, null, null, Array($id), "timeline a, anexos c");
			
			$datas['post'] = $post;
			echo json_encode($post);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);


			//verifica se audio foi modificado
			if ($dadosFim['audioModified']){

				if ($dadosFim['audio']){

					//insere anexo
					$dadosAnexo['conteudo'] 		= $dadosFim['audio'];
					$dadosAnexo['token_id'] 		= md5(uniqid(rand(), true));
					$dadosAnexo['token_post_dono']	= $dadosFim['token_id'];


					$anexos = new anexosModel;
					$anex = $anexos->insere($dadosAnexo);
					$datas['anex'] = $anex;
					// echo json_encode($anex);

				}

			}


			//id
			$id = $dadosFim['id'];

			//só insere se dados username Tiver conteudo
			//remover audio e token_audio de vetor
			unset($dadosFim['audio']);
			unset($dadosFim['token_audio']);
			unset($dadosFim['audioModified']);
			unset($dadosFim['data']);

			//só insere se dados nome Tiver conteudo
			if ($id) {

				// print_r($dadosFim);
				$postagem = new postagemModel;
				$post = $postagem->set($dadosFim, " id = ? ", Array($id) );
				$datas['post'] = $post;
				echo json_encode($post);

			}
			
		}

		public function delete(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				$postagem = new postagemModel;
				$post = $postagem->deletar(" id = ? ", Array($id) );
				$datas['post'] = $post;
				echo json_encode($post);

			}
			
		}

		public function deleteaudio($url){

			//se vaziu pega valor
			if (empty($url)) {

				$dados = file_get_contents("php://input");
				$dadosFim = json_decode($dados, true);

				$url = $dadosFim['audio'];
			}

			if ($url) {

				$anexos = new anexosModel;
				$anex = $anexos->deletar(" conteudo = ? ", Array($url) );
				$datas['anex'] = $anex;
			}

			//delete image
			$ftUp = new uploadAudio();
			$ftUp->delete($url);

		}

		public function uploadaudio(){

			//Upload Foto
			if ($_FILES["file"]) {
				$ftUp = new uploadAudio();
				echo $ftUp->upload($_FILES["file"]["tmp_name"]);
			}

		}

	}

?>