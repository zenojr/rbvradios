<?php

class agenda{

	public function aniversarios(){

		//monta data de hoje
		$meses = array ("Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez");
		$dia = date ("d", time());
		$mes = date ("m", time());
		$datahj = $mes.'-'.$dia;

		$seleciona = mysql_query("SELECT DISTINCT id, nome, email, radio, data FROM aniversarios WHERE substring(data,-5, 2) - 'P' = '$datahj' AND substring(data,-2, 2) - 'P' >= '$dia'  ORDER BY substring(data,-2, 2) - 'P' ASC") or die ('Na linha: '.__LINE__);

		$verifica_tem_aniversarios = mysql_num_rows($seleciona);

		if($verifica_tem_aniversarios >= 1){

					while($retorna = mysql_fetch_array($seleciona)){

					$nome 	= $retorna['nome'];
					$email 	= $retorna['email'];
					$radio 	= $retorna['radio'];
					$data 	= $retorna['data'];

					//transforma nome
					$nome_minusculas = mb_strtolower($nome, 'UTF-8');
					$nome_maiscula 	 = ucfirst($nome_minusculas);

					// explode data
					//logo apos faz conta pra pegar meses do array q inicia em 0
					//depois substiui os numeros 0 por nada
					//e agora coloca no array final pra mostrar a abreviação do Mês
					$data_fim = explode('-', $data);
					$mes_num = $data_fim[1] -1;
					// $mes_s_zero = str_replace("0","",$mes_num);
					$mes_fim = $meses[$mes_num];

						//se o dia do BD for igual ao de hoje coloca na classe DO DIA se nao Coloca na Classe COMUM
						if($data_fim[2] == $dia){

							echo '<div id="conteudo_rbv_dia"> <!-- começa conteudo_rbv -->';

						}else{

							echo '<div id="conteudo_rbv"> <!-- começa conteudo_rbv -->';

						}				

								echo '<ul>
										<li class="data_aniver">'.$data_fim[2].'
												<span>'.$mes_fim.'</span>
										</li>
										<li class="nome_aniver">'.$nome_maiscula.'</li>
										<li class="nome_empresa">'.$radio.'</li>
									</ul>';


							//se o dia do BD for igual ao de hoje coloca Formulario se não deixa ele sem
								if($data_fim[2] == $dia){

									//id do formulario
									$formularioid = $formularioid +1;

									echo '<div id="formulario"> <!-- comeca formalario -->

												<!--comeca  status -->
													<div id="status_erro"></div>
													<div id="status"></div>
												<!-- fim status -->

							                <form name="'.$formularioid.'" method="post" action="">
													
													<input type="hidden" id="email_destino'.$formularioid.'"  name="email_destino" value="'.$email.'" />
													<input type="text" id="nome_formulario'.$formularioid.'"  name="nome_formulario" value="Seu Nome" onFocus="clearDefault(this);" onBlur="clearDefault(this);"/>
													<input type="text" id="email_formulario'.$formularioid.'"  name="email_formulario" value="Seu Email" onFocus="clearDefault(this);" onBlur="clearDefault(this);"/> 
								                    <input type="text" id="conteudo_formulario'.$formularioid.'" name="conteudo_formulario" value="Dê os Parabéns" onFocus="clearDefault(this);" onBlur="clearDefault(this);"/>

								                    <input type="submit" value="Enviar" class="comment_submit" id="'.$formularioid.'" name="enviar" />
				
								                </form> 
										</div><!-- fim formalario -->';
								}

							echo	'</div> <!-- fim conteudo_rbv -->';

					}//fim while

		}else{

			echo '<div id="sem_niver"> 
					Não tem Aniversários Neste Mês!<br><br>
					<img src="imagem/homer_sad_big.png">
				  </div>';

		}


	}// fim aniversarios




}

?>