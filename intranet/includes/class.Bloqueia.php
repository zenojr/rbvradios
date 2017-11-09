<?php

class bloqueado{


	public function desbloqueia($ip){

			//conectar class.Conecta.php
			require_once('class.Conecta.php');
			$objConecta = new Conexao;

			//procura ip no BD
			$seleciona = mysql_query("SELECT * FROM bloqueio WHERE ip = '$ip'");
			$ip_listado = mysql_num_rows($seleciona);


			if($ip_listado >= 1){


				echo '<div id="coluna_esquerda"><!-- comeca esquerda -->
					
					<div id="titulo_rbv"> <!-- titulo_rbv -->
						<img src="imagem/agenda-rbv.png">
						<span>Aniversariantes do Mês</span>
					</div><!-- fim titulo_rbv -->'; 

				
						//biblioteca class.Agenda.php
						//class agenda
						//function Aniversariantes
						require_once('class.Agenda.php');
						$objAgenda = new Agenda;
						$objAgenda->aniversarios();


				echo '</div><!-- fim esquerda -->
						
						<div id="logo"> <!-- comeca logo -->
							<img src="imagem/google.png">
						</div> <!-- fim logo -->

						<div id="procura"> <!-- comeca procura -->

							<script  type="text/javascript"  src="js/iniGoogle.js"></script>

							<gcse:searchbox-only></gcse:searchbox-only>
						</div><!-- fim procura -->';

			}else{


				echo "<meta http-equiv='refresh' content=\"0; url=http://rbvradios.inf.br/erro/ \"/>";

			}



	}//fim desbloqueia

}
?>