<?php

class emailHelper{

	public function emailEnvio($usuario, $assunto, $email_remetente, $email_destino, $dados, $atualmente){

			//define que Sistema que esta usando
			$ip_usuario = $_SERVER["REMOTE_ADDR"];
			$date = date("d/m/y h:i");


			//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
			$from 		= "From: $email_remetente\n";
			$cpOculta	= "Bcc: $email_destino\n";

			//configs de Cores
			if ($dados['status'] == "pronto") {
				$color = "#599162";
			}else if($dados['status'] == "produzindo"){
				$color = "#F2C779";
			}else if($dados['status'] == "pausado"){
				$color = "#88DAF9";
			}else if($dados['status'] == "atrasado"){
				$color = "#B94A48";
			}else if($dados['status'] == "agendado"){
				$color = "#018D92";
			}else if($dados['status'] == "aguardando resposta"){
				$color = "#BC5AAA";
			}else{
				$color = "#C8C8C8";
			}

			//MSG
			$message = '<html><body>';
			$message .= '<table rules="all" style="font-family: Arial;font-size:13px;border:1px solid #999; border-collapse: collapse;" cellpadding="10">';
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Empresa:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($dados['empresa']) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Analista Téc:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($dados['dono']) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Titulo Chamado:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($dados['nome']) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Descrição:</strong> </td><td style='border:1px solid #999;'>" . utf8_encode($dados['descricao']) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Tipo:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($dados['tipo']) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Data - Hora:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($date) . "</td></tr>";
			$message .= "<tr><td style='border:1px solid #999; background: #EEE;'><strong>Situação:</strong> </td><td style='border:1px solid #999;'>" . strip_tags($atualmente) . "</td></tr>";
			$message .= "<tr style='background: {$color}'><td><strong>Status:</strong> </td><td style='border:1px solid #999;'>" . strtoupper($dados['status']) . "</td></tr>";

			if($dados['status'] == "agendado") {
				$message .= "<tr><td><strong>Agendado para:</strong> </td><td style='border:1px solid #999;'> Dia " . strtoupper($dados['dataagendamento']) . " às " .strtoupper($dados['horaagendamento']). "h </td></tr>";
			}

			$message .= "</table>";
			$message .= "</body></html>";


			//ENVIO DA MENSAGEM ORIGINAL
			$mens     = "$message\n";
			$headers  = "MIME-Version: 1.0\n";
			$headers .= "$from";
			$headers  .= "$cpOculta";
			$headers .= "Content-Type: text/html; charset=\"UTF-8\"". "\r\n";

			//envio
			mail($email_remetente, $assunto, $mens, $headers, "-r".$email_remetente);	

	} 		

}

?>