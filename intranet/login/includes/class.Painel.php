<?php


class painel{


	function admTopoMenu(){


		echo '	
				<a href="index.php">
					<div id="topo"> <!-- topo -->
					</div> <!-- topo -->
				</a>

				<div id="menu"> <!-- menu -->

					<ul>
						<li>Anivesários
							<ul>
								<a href="inserir.php?opt=aniver">
									<li><img src="imagem/add.png">Adicionar</li>
								</a>
								<a href="indexeditar.php?opt=aniver">
									<li><img src="imagem/editar.png">Editar</li>
								</a>
							</ul>
						</li>
						<li>Cargos
							<ul>
								<a href="inserir.php?opt=cargo">
									<li><img src="imagem/add.png">Adicionar</li>
								</a>
								<a href="indexeditar.php?opt=cargo">
									<li><img src="imagem/editar.png">Editar</li>
								</a>
							</ul>
						</li>
						<li>Rádios
							<ul>
								<a href="inserir.php?opt=radio">
									<li><img src="imagem/add.png">Adicionar</li>
								</a>
								<a href="indexeditar.php?opt=radio">
									<li><img src="imagem/editar.png">Editar</li>
								</a>
							</ul>
						</li>
						<li>Liberar Ips
							<ul>
								<a href="inserir.php?opt=ip">
									<li><img src="imagem/add.png">Adicionar</li>
								</a>
								<a href="indexeditar.php?opt=ip">
									<li><img src="imagem/editar.png">Editar</li>
								</a>
							</ul>
						</li>						
						<li>Usuários
							<ul>
								<a href="inserir.php?opt=usuario">
									<li><img src="imagem/add.png">Adicionar</li>
								</a>
								<a href="indexeditar.php?opt=usuario">
									<li><img src="imagem/editar.png">Editar</li>
								</a>
							</ul>
						</li>
						<a href="includes/logout.php">
							<li><img src="imagem/sair.png"> Sair</li>
						</a>
					</ul>
				</div><!-- menu -->';


	}


	function add($url){

		//pega url e retorna formulario correto
		$opcao = $_GET['opt'];

		//imprime formulario imovel
		if($opcao == 'aniver'){


			//pega validação
			require_once('class.validaInserir.php');
		    $ObjImoveis = new validaInserir();
		    $ObjImoveis->validaAniversario();

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Inserir Aniversário
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome da Aniversariante:</label>
			        <input type="text" id="nome" name="nome" class="validate[required] text-input" value=""/>

					<label>Email:</label>
			        <input type="text" id="email" name="email" class="validate[required] text-input" value=""/>';


			/* começa conecta / Imprime Selects *cargo* e depois *radios* */
			require_once('class.Conecta.php');
			$ObjConecta = new conexao();

			echo '<label>Selecione o Cargo:</label>
			        <select id="cargo" name="cargo" class="validate[required] text-input">
			        <option value="" selected></option>';


				$seleciona = mysql_query("SELECT * FROM cargo WHERE id ORDER BY id DESC");
				while ($mostra = mysql_fetch_array($seleciona)){

					$cargo = $mostra['cargo'];

					echo '<option value="'.$cargo.'">'.$cargo.'</option>';

				}


			echo '</select>';

			//radios select
			echo '<label>Selecione a Rádio:</label>
			        <select id="radio" name="radio" class="validate[required] text-input">
			        <option value="" selected></option>';


				$seleciona = mysql_query("SELECT * FROM radio WHERE id ORDER BY id DESC");
				while ($mostra = mysql_fetch_array($seleciona)){

					$radio = $mostra['radio'];

					echo '<option value="'.$radio.'">'.$radio.'</option>';

				}


			echo '</select>';


			echo '<label>Data:</label>
			        <input type="text" id="data" name="data" class="validate[required] text-input" value=""/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'ip'){


			//pega validação
			require_once('class.validaInserir.php');
		    $ObjImoveis = new validaInserir();
		    $ObjImoveis->validaIp();

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Inserir IP
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome da Rádio:</label>
			        <input type="text" id="nome" name="nome" class="validate[required] text-input" value=""/>

					<label>Numero do IP:</label>
			        <input type="text" id="ip" name="ip" class="validate[required] text-input" value=""/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'cargo'){


			//pega validação
			require_once('class.validaInserir.php');
		    $ObjImoveis = new validaInserir();
		    $ObjImoveis->validaCargo();

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Inserir Cargos
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome do Cargo:</label>
			        <input type="text" id="cargo" name="cargo" class="validate[required] text-input" value=""/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'radio'){


			//pega validação
			require_once('class.validaInserir.php');
		    $ObjImoveis = new validaInserir();
		    $ObjImoveis->validaRadio();

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Inserir Rádio
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome da Rádio:</label>
			        <input type="text" id="radio" name="radio" class="validate[required] text-input" value=""/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'usuario'){


			//pega validação
			require_once('class.validaInserir.php');
		    $ObjImoveis = new validaInserir();
		    $ObjImoveis->validaUsuario();


			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Inserir Usuário
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome do Usuário:</label>
			        <input type="text" id="usuario" name="usuario" class="validate[required] text-input" value=""/>

					<label>Senha:</label>
			        <input type="password" id="senha" name="senha" class="validate[required] text-input" value=""/>
					
					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}

	}

	//acaba o ADD

	function editarIndex($url){

		//pega url e retorna formulario correto

		$opcao = $_GET['opt'];

		//imprime formulario imovel
		if($opcao == 'aniver'){

			echo '
						<div id="titulo_listar">
							Listar Aniversários
						</div>

			<div id="lista_editar">';


			$seleciona = mysql_query("SELECT * FROM aniversarios WHERE id ORDER BY id DESC ");
			while($mostra = mysql_fetch_array($seleciona)){

					$nome 	= $mostra['nome'];
					$cargo 	= $mostra['cargo'];
					$radio 	= $mostra['radio'];
					$email 	= $mostra['email'];
					$data 	= $mostra['data'];
					$id 	= $mostra['id'];

					//transforma nome
					$nome_minusculas = mb_strtolower($nome, 'UTF-8');
					$nome_maisculas  = ucfirst($nome_minusculas);
					
					//monda data tipo brasileiro
					$data_explode = explode('-', $data);
					$data_fim = $data_explode[2].'/'.$data_explode[1];

				echo '

						<div id="procura"><!-- div procura -->
								<ul>
									<li class="forma">'.$nome_maisculas.'</li>
									<li class="forma_data">Aniversário: '.$data_fim.'</li>
									<li class="forma_data">Cargo: '.$cargo.' | Local/Rádio: '.$radio.'</li>
									<li class="forma_data">Email: '.$email.'</li>
								</ul>

								<div id="edicao_ul">

									<a href="editar.php?opt=aniver&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/editar.png">
										</div>
									</a>

									<a href="excluir.php?opt=aniver&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/apagar.png">
										</div>
									</a>

								</div>

						</div><!-- div procura -->';

			}

			echo '</div>';


			}else if($opcao == 'ip'){

			echo '
						<div id="titulo_listar">
							Listar IPs
						</div>

			<div id="lista_editar">';


			$seleciona = mysql_query("SELECT * FROM bloqueio WHERE id ORDER BY id DESC ");
			while($mostra = mysql_fetch_array($seleciona)){

					$nome 	= $mostra['nome'];
					$ip 	= $mostra['ip'];
					$id 	= $mostra['id'];


				echo '

						<div id="procura"><!-- div procura -->
								<ul>
									<li class="forma">'.$nome.'</li>
									<li class="forma_data">Numero de IP: '.$ip.'</li>
								</ul>

								<div id="edicao_ul">

									<a href="editar.php?opt=ip&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/editar.png">
										</div>
									</a>

									<a href="excluir.php?opt=ip&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/apagar.png">
										</div>
									</a>

								</div>

						</div><!-- div procura -->';

			}

			echo '</div>';


		}else if($opcao == 'cargo'){

			echo '
						<div id="titulo_listar">
							Listar Cargos
						</div>

			<div id="lista_editar">';


			$seleciona = mysql_query("SELECT * FROM cargo WHERE id ORDER BY id DESC ");
			while($mostra = mysql_fetch_array($seleciona)){

					$cargo 	= $mostra['cargo'];
					$id 	= $mostra['id'];


				echo '

						<div id="procura"><!-- div procura -->
								<ul>
									<li class="forma">'.$cargo.'</li>
								</ul>

								<div id="edicao_ul">

									<a href="editar.php?opt=cargo&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/editar.png">
										</div>
									</a>

									<a href="excluir.php?opt=cargo&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/apagar.png">
										</div>
									</a>

								</div>

						</div><!-- div procura -->';

			}

			echo '</div>';


		}else if($opcao == 'radio'){

			echo '
						<div id="titulo_listar">
							Listar Rádios
						</div>

			<div id="lista_editar">';


			$seleciona = mysql_query("SELECT * FROM radio WHERE id ORDER BY id DESC ");
			while($mostra = mysql_fetch_array($seleciona)){

					$radio 	= $mostra['radio'];
					$id 	= $mostra['id'];


				echo '

						<div id="procura"><!-- div procura -->
								<ul>
									<li class="forma">'.$radio.'</li>
								</ul>

								<div id="edicao_ul">

									<a href="editar.php?opt=radio&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/editar.png">
										</div>
									</a>

									<a href="excluir.php?opt=radio&act=excluir&id='.$id.'">
										<div class="edicao_img">
											<img src="imagem/apagar.png">
										</div>
									</a>

								</div>

						</div><!-- div procura -->';

			}

			echo '</div>';


		}else if($opcao == 'usuario'){

			echo '
						<div id="titulo_listar">
							Listar Usuários
						</div>

			<div id="lista_editar">';


			$seleciona = mysql_query("SELECT * FROM usuarios WHERE nome != 'admin' ORDER BY id DESC ");
			while($mostra = mysql_fetch_array($seleciona)){

					$usuario = $mostra['usuario'];
					$id_usuario = $mostra['id'];

				echo '

						<div id="procura"><!-- div procura -->
								<ul>
									<li class="forma">'.$usuario.'</li>
								</ul>

								<div id="edicao_ul">

									<a href="editar.php?opt=usuario&act=excluir&id='.$id_usuario.'">
										<div class="edicao_img">
											<img src="imagem/editar.png">
										</div>
									</a>

									<a href="excluir.php?opt=usuario&act=excluir&id='.$id_usuario.'">
										<div class="edicao_img">
											<img src="imagem/apagar.png">
										</div>
									</a>

								</div>

						</div><!-- div procura -->';

			}

			echo '</div>';

		}

	}



	function editar($url){

		//pega url e retorna formulario correto

		$opcao = $_GET['opt'];

		//imprime formulario imovel
		if($opcao == 'aniver'){

			//pega validação
			require_once('class.validaEditar.php');
		    $ObjImoveis = new validaEditar();
		    $ObjImoveis->editaAniversario();

			$id = $_GET['id'];

			$seleciona = mysql_query("SELECT * FROM aniversarios WHERE id = '$id' ");
			$mostra = mysql_fetch_array($seleciona);

			$id 			  	= $mostra["id"];
			$nome            	= $mostra["nome"];
			$cargo            	= $mostra["cargo"];
			$radio            	= $mostra["radio"];
			$email            	= $mostra["email"];
			$data            	= $mostra["data"];

			//monda data tipo brasileiro
			$data_explode = explode('-', $data);
			$data_fim = $data_explode[2].$data_explode[1].$data_explode[0];

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Editar Aniversário
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome do Aniversariante:</label>
					<input type="hidden" id="id" name="id" value="'.$id.'"/>
			        <input type="text" id="nome" name="nome" class="validate[required] text-input" value="'.$nome.'"/>

					<label>Email:</label>
			        <input type="text" id="email" name="email" class="validate[required] text-input" value="'.$email.'"/>';


			/* começa conecta / Imprime Selects *cargo* e depois *radios* */
			require_once('class.Conecta.php');
			$ObjConecta = new conexao();

			echo '<label>Selecione o Cargo:</label>
			        <select id="cargo" name="cargo" class="validate[required] text-input">
			        <option value="'.$cargo.'" selected>'.$cargo.'</option>';


				$seleciona = mysql_query("SELECT * FROM cargo WHERE cargo != '$cargo' ORDER BY id DESC");
				while ($mostra = mysql_fetch_array($seleciona)){

					$cargo_while = $mostra['cargo'];

					echo '<option value="'.$cargo_while.'">'.$cargo_while.'</option>';

				}


			echo '</select>';

			//radios select
			echo '<label>Selecione a Rádio:</label>
			        <select id="radio" name="radio" class="validate[required] text-input">
			        <option value="'.$radio.'" selected>'.$radio.'</option>';


				$seleciona = mysql_query("SELECT * FROM radio WHERE radio != '$radio' ORDER BY id DESC");
				while ($mostra = mysql_fetch_array($seleciona)){

					$radio_while = $mostra['radio'];

					echo '<option value="'.$radio_while.'">'.$radio_while.'</option>';

				}


			echo '</select>';

			echo '<label>Data:</label>
			        <input type="text" id="data" name="data" class="validate[required] text-input" value="'.$data_fim.'"/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'ip'){


			//pega validação
			require_once('class.validaEditar.php');
		    $ObjImoveis = new validaEditar();
		    $ObjImoveis->editaIp();

			$id = $_GET['id'];

			$seleciona = mysql_query("SELECT * FROM bloqueio WHERE id = '$id' ");
			$mostra = mysql_fetch_array($seleciona);

			$id 			  	= $mostra["id"];
			$nome            	= $mostra["nome"];
			$ip            		= $mostra["ip"];

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Editar IP
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome da Rádio:</label>
					<input type="hidden" id="id" name="id" value="'.$id.'"/>
			        <input type="text" id="nome" name="nome" class="validate[required] text-input" value="'.$nome.'"/>

					<label>Numero do IP:</label>
			        <input type="text" id="ip" name="ip" class="validate[required] text-input" value="'.$ip.'"/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'cargo'){


			//pega validação
			require_once('class.validaEditar.php');
		    $ObjImoveis = new validaEditar();
		    $ObjImoveis->editaCargo();

			$id = $_GET['id'];

			$seleciona = mysql_query("SELECT * FROM cargo WHERE id = '$id' ");
			$mostra = mysql_fetch_array($seleciona);

			$id 			  	= $mostra["id"];
			$cargo            	= $mostra["cargo"];

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Editar Cargo
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Cargo:</label>
					<input type="hidden" id="id" name="id" value="'.$id.'"/>
			        <input type="text" id="cargo" name="cargo" class="validate[required] text-input" value="'.$cargo.'"/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'radio'){


			//pega validação
			require_once('class.validaEditar.php');
		    $ObjImoveis = new validaEditar();
		    $ObjImoveis->editaRadio();

			$id = $_GET['id'];

			$seleciona = mysql_query("SELECT * FROM radio WHERE id = '$id' ");
			$mostra = mysql_fetch_array($seleciona);

			$id 			  	= $mostra["id"];
			$radio            	= $mostra["radio"];

			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Editar Rádio
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Cargo:</label>
					<input type="hidden" id="id" name="id" value="'.$id.'"/>
			        <input type="text" id="radio" name="radio" class="validate[required] text-input" value="'.$radio.'"/>

					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}else if($opcao == 'usuario'){


			//pega validação
			require_once('class.validaEditar.php');
		    $ObjImoveis = new validaEditar();
		    $ObjImoveis->editaUsuario();

			$id = $_GET['id'];

			$seleciona = mysql_query("SELECT * FROM usuarios WHERE id = '$id' ");
			$mostra = mysql_fetch_array($seleciona);

			$id 			   = $mostra["id"];
			$usuario           = $mostra["usuario"];


			echo '
			<div id="titulo_formularios"> <!--  titulo_formularios -->
				Editar Usuário
			</div> <!--  titulo_formularios -->

			<div id="formularios"> <!-- formularios -->

				<form id="formID2" class="formular" enctype="multipart/form-data" method="post" action="">

					<label>Nome do Usuário:</label>
					<input type="hidden" id="id" name="id"  value="'.$id.'"/>
			        <input type="text" id="usuario" name="usuario" class="validate[required] text-input" value="'.$usuario.'"/>

					<label>Nova Senha:</label>
			        <input type="password" id="senha" name="senha" class="validate[required] text-input" value=""/>
					
					<input type="hidden" name="enviar" value="send"/>
					<input type="submit" value="Enviar" class="submit" id="envia" />

				</form>

			</div> <!-- formularios -->';

		}

	}

	//acaba o EDIT


	function excluir($url){

		//pega url e retorna formulario correto

		$opcao = $_GET['opt'];

		//exclui 
		if($opcao == 'aniver'){

			$act  = $_GET['act'];

			if ($act == 'excluir') {

				$id  = $_GET['id'];

			$ok = mysql_query("DELETE FROM aniversarios WHERE id = '$id'");
			echo "<meta http-equiv='refresh' content=\"1; url=indexeditar.php?opt=aniver \"/>";
			echo '<div id="status"> EXCLUIDO COM SUCESSO!</div> <!-- status do envio -->';
			}

		}else if($opcao == 'usuario'){

			$act  = $_GET['act'];

			if ($act == 'excluir') {

				$id  = $_GET['id'];

			$ok = mysql_query("DELETE FROM usuarios WHERE id = '$id'");
			echo "<meta http-equiv='refresh' content=\"1; url=indexeditar.php?opt=usuario \"/>";
			echo '<div id="status"> EXCLUIDO COM SUCESSO!</div> <!-- status do envio -->';
			}

		}else if($opcao == 'cargo'){

			$act  = $_GET['act'];

			if ($act == 'excluir') {

				$id  = $_GET['id'];

			$ok = mysql_query("DELETE FROM cargo WHERE id = '$id'");
			echo "<meta http-equiv='refresh' content=\"1; url=indexeditar.php?opt=cargo \"/>";
			echo '<div id="status"> EXCLUIDO COM SUCESSO!</div> <!-- status do envio -->';
			}

		}else if($opcao == 'radio'){

			$act  = $_GET['act'];

			if ($act == 'excluir') {

				$id  = $_GET['id'];

			$ok = mysql_query("DELETE FROM radio WHERE id = '$id'");
			echo "<meta http-equiv='refresh' content=\"1; url=indexeditar.php?opt=radio \"/>";
			echo '<div id="status"> EXCLUIDO COM SUCESSO!</div> <!-- status do envio -->';
			}

		}else if($opcao == 'ip'){

			$act  = $_GET['act'];

			if ($act == 'excluir') {

				$id  = $_GET['id'];

			$ok = mysql_query("DELETE FROM bloqueio WHERE id = '$id'");
			echo "<meta http-equiv='refresh' content=\"1; url=indexeditar.php?opt=ip \"/>";
			echo '<div id="status"> EXCLUIDO COM SUCESSO!</div> <!-- status do envio -->';
			}

		}

	}//acaba o Exclui

}

?>