<?php
	
	class postagem extends Controller{


		public function getspec(){

			$id = $this->getParams('id');

			$postagem = new postagemModel;

			$post = $postagem->getMultiPrefix("a.id, a.valor, a.arquivo, a.data, b.nome AS nome_dono", " token_dono = ANY ('$id') AND a.token_dono = b.token_id ", " a.id DESC ", null, null, null, "relatorio a, usuarios b");
			
			$datas['post'] = $post;
			echo json_encode($post);
			
		}

		public function inserir(){

			$dados = file_get_contents("php://input");
			//cria json
			$dadosFim = json_decode($dados, true);

			// Gera token
			$dadosFim['token_id'] = md5(uniqid(rand(), true));
			
			if ($dadosFim['valor']){
				$postagem = new postagemModel;
				$post = $postagem->insere($dadosFim);
				$datas['post'] = $post;
				echo json_encode($post);
			}
			
		}

		public function getedit(){

			$id = $this->getParams('id');

			$postagem = new postagemModel;

			$post = $postagem->get("id, valor, arquivo, data, token_dono", " id = ? ", " id DESC ", null, null, Array($id));
			
			$datas['post'] = $post;
			echo json_encode($post);
			
		}

		public function atualizar(){

			$dados = file_get_contents("php://input");
			$dadosFim = json_decode($dados, true);

			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {

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

			//delete
			if ($id) {
				//delete arquivo
				$this->deletearquivo($dadosFim['arquivo']);

				$postagem = new postagemModel;
				$post = $postagem->deletar(" id = ? ", Array($id) );
				$datas['post'] = $post;
				echo json_encode($post);
			}
			
		}

		public function deletearquivo($url){

			//se vaziu pega valor
			if (empty($url)) {

				$dados = file_get_contents("php://input");
				$dadosFim = json_decode($dados, true);

				$url = $dadosFim['arquivo'];
			}

			//só insere se dados nome Tiver conteudo
			if ($url) {

				$dadosFim['arquivo'] = 0;

				print_r($dadosFim);

				$postagem = new postagemModel;
				$post = $postagem->set($dadosFim, " arquivo = ? ", Array($url) );
				$datas['post'] = $post;
				echo json_encode($post);

				//delete arquivo
				$ftUp = new expToPdf();
				$ftUp->delete($url);
			}

		}

		public function uploadexp(){

			//Upload 
			if ($_FILES["file"]) {
				$ftUp = new expToPdf();
				$dados = $ftUp->upload($_FILES["file"]["tmp_name"], $_POST["valor"] );

				echo json_encode( $dados, JSON_FORCE_OBJECT | JSON_UNESCAPED_SLASHES);
			}

		}

	}

?>