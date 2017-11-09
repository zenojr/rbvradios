<?php
	
	class projetos extends Controller{

		public function index_action(){

			// $projetos = new projetosModel;

			// $proje = $projetos->getProjetos(null, null, "id DESC", null, null);
			// $datas['proje'] = $proje;
			// echo json_encode($proje);
			
		}

		public function perfil(){

			//timeline
			$projetos = new projetosModel;
			$dono = $this->getParams('id');

			// , TIME_FORMAT(horaagendamento, '%H:%i') AS hragendamento
			// VERIFICAR to_char

			$proje = $projetos->find("id, empresa, nome, descricao, tipo, status, data, data_final, data_last_update, criadopor, dono, dataagendamento, to_char(horaagendamento, '%H:%i') AS hragendamento", " dono = ? ", "LIKE('solicitado', status) DESC, LIKE('produzindo', status) DESC, LIKE('agendado', status) DESC, LIKE('aguardando resposta', status) DESC , LIKE('testando', status) DESC, LIKE('pausado', status) DESC, LIKE('atrasado', status) DESC, LIKE('pronto', status) DESC, id DESC", null, null, Array($dono) );
			$datas['proje'] = $proje;

			//convert date agendamento
			// if ($proje[0]['dataagendamento'] != "0000-00-00") {
			// 	$proje[0]['dataagendamento'] = $this->convertDateDiaMesAno($proje[0]['dataagendamento']);
			// }

			echo json_encode($proje);
			
		}

		public function criadopor(){

			//timeline
			$projetos = new projetosModel;
			$dono = $this->getParams('id');

			// , TIME_FORMAT(horaagendamento, '%H:%i') AS hragendamento
			// VERIFICAR to_char

			$proje = $projetos->find("id, empresa, nome, descricao, tipo, status, data, data_final, data_last_update, criadopor, dono, dataagendamento, to_char(horaagendamento, '%H:%i') AS hragendamento", " criadopor = ? ", "LIKE('produzindo', status) DESC, LIKE('agendado', status) DESC, LIKE('aguardando resposta', status) DESC , LIKE('testando', status) DESC, LIKE('pausado', status) DESC, LIKE('atrasado', status) DESC, LIKE('pronto', status) DESC, id DESC", null, null, Array($dono) );
			$datas['proje'] = $proje;

			//convert date agendamento
			if ($proje[0]['dataagendamento'] != "0000-00-00") {
				$proje[0]['dataagendamento'] = $this->convertDateDiaMesAno($proje[0]['dataagendamento']);
			}

			echo json_encode($proje);
			
		}

		public function inserir(){

			$projetos = new projetosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);

			//data
			$dadosFim['data_final'] = date('Y/m/d G:i:s');
			$dadosFim['data_last_update'] = date('Y/m/d G:i:s');

			//convert date agendamento se existir
			if (isset($dadosFim['dataagendamento'])) {
				$date = str_replace('/', '-', $dadosFim['dataagendamento']);
				$dadosFim['dataagendamento'] = $this->convertDateAnoMesDia($date);
			}

			//só insere se dados nome Tiver conteudo
			if ($dadosFim['nome']) {
				//Promos
				$proje = $projetos->insere($dadosFim);
				$datas['proje'] = $proje;
				echo json_encode($proje);

			}
			
		}

		public function getalterar(){

			$id = $this->getParams('id');

			$projetos = new projetosModel;

			$proje = $projetos->find(null, " id = ? ", null, null, null, Array($id));
			$datas['proje'] = $proje;

			//convert date agendamento
			if ($proje[0]['dataagendamento'] != "0000-00-00") {
				$proje[0]['dataagendamento'] = $this->convertDateDiaMesAno($proje[0]['dataagendamento']);
			}

			echo json_encode($proje);
			
		}

		public function setalterar(){

			$projetos = new projetosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];


			//ve se horario e agendamento sao em branco
			if ($dadosFim['dataagendamento'] == "" && $dadosFim['horaagendamento'] == "") {
				$dadosFim['dataagendamento'] = null;
				$dadosFim['horaagendamento'] = null;
			}

			//convert date agendamento
			if ($dadosFim['dataagendamento'] != "00/00/0000") {
				$date = str_replace('/', '-', $dadosFim['dataagendamento']);
				$dadosFim['dataagendamento'] = $this->convertDateAnoMesDia($date);
			}

			//case 
			switch ($dadosFim['status']) {
				case 'pronto':
					$dadosFim['data_final'] = date('Y/m/d G:i:s');
					break;
				
				default:
					$dadosFim['data_last_update'] = date('Y/m/d G:i:s');
					break;
			}

			//só insere se dados nome Tiver conteudo
			if ($id) {
				//Promos
				$proje = $projetos->set($dadosFim, " id = ? ", Array($id));
				$datas['proje'] = $proje;

				//convert date agendamento
				if ($proje['dataagendamento'] != "0000-00-00") {
					$proje['dataagendamento'] = $this->convertDateDiaMesAno($proje['dataagendamento']);
				}

				echo json_encode($proje);

			}
			
		}

		public function delete(){

			$projetos = new projetosModel;

			$jsonInput = json_decode(file_get_contents("php://input"));
			$dados = json_encode($jsonInput);
			$dadosFim = json_decode($dados, true);
			//id
			$id = $dadosFim['id'];

			//só insere se dados nome Tiver conteudo
			if ($id) {
				//Promos
				$proje = $projetos->deletar(" id = ? ", Array($id));
				$datas['proje'] = $proje;
				echo json_encode($proje);

			}
			
		}

		public function relatorioporregistro(){

			$equipamento = $this->getParams('id');

			$projetos = new projetosModel;

			$projRel = $projetos->findMultiPrefix("a.id, a.status, a.empresa, a.descricao, a.tipo, a.nome, a.dono, a.criadopor, a.data, b.nome AS nomeequipamento", " a.equipamento = ? AND b.nregistro = ? AND b.empresa = a.empresa ", " a.id DESC ", null, null, null, Array($equipamento, $equipamento), "projetos a, equipamentos b");

			$datas['projRel'] = $projRel;
			echo json_encode($projRel);
			
		}

		public function relatoriopornome(){

			//GET POST
			$dadosRecebidos = file_get_contents("php://input");
			$dadosRecebidos = json_decode($dadosRecebidos, true);

			//DEFINE VARIAVEIS
			$equipamento = $dadosRecebidos['nregistro'];
			$empresa = $dadosRecebidos['empresa'];

			$projetos = new projetosModel;

			$projRel = $projetos->find(null, " empresa = ? AND equipamento = ? ", "data DESC ", null, null,
				Array($empresa, $equipamento));
			$datas['projRel'] = $projRel;
			echo json_encode($projRel);
			
		}

		public function convertDateDiaMesAno($data){
			return date('d/m/Y', strtotime($data));
		}

		public function convertDateAnoMesDia($data){
			return date('Y-m-d', strtotime($data));
		}

	}

?>