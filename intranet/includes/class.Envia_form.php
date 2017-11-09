<?php					
// Recupera os valores dos campos através do método POST
$nome_formulario = $_POST['nome_formulario'];
$mensagem = $_POST['conteudo_formulario'];
$email_reply = $_POST['email_formulario'];
$email_destino = $_POST['email_destino'];
$email = 'aniversarios@rbvradios.inf.br';

// Verifica se o nome foi preenchido
if($nome_formulario == 'Seu Nome' or $nome_formulario == ''){
		
		echo '';

} 
// Verifica se a mensagem foi digitada
else if($mensagem == 'Dê os Parabéns' or $mensagem == ''){
		
		echo '';

}
// Verifica se a mensagem foi digitada
else if($email_reply == 'Seu Email' or $email_reply == ''){
		
		echo '';

}
// Se não houver nenhum erro
else {


// ****** ATENÇÃO ********
// ABAIXO ESTÁ A CONFIGURAÇÃO DO SEU FORMULÁRIO.
// ****** ATENÇÃO ********

//CABEÇALHO - ONFIGURAÇÕES SOBRE SEUS DADOS E SEU WEBSITE

$date = date("d/m/ h:i");
$nome_do_site = "Feliz Aniversário";
$email_destino = $email_destino;
$nome_do_destinatario = "Feliz Aniversário";
$assunto_do_email = $nome_formulario." está desejando Feliz Aniversário a você!";

//MAIS - CONFIGURAÇOES DA MENSAGEM ORIGINAL
$cabecalho_da_mensagem_original="From: $email\n";

// FORMA COMO RECEBERÁ O E-MAIL (FORMULÁRIO)
// ******** OBS: SE FOR ADICIONAR NOVOS CAMPOS, ADICIONE OS CAMPOS NA VARIÁVEL ABAIXO *************
$configuracao_da_mensagem_original='

<!doctype html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>$assunto_do_email</title>
<style>
body{
	margin:0px;
	padding:0px;
}
#corpo{
	width:797px;
	height:auto;
	margin: 0 auto;
}

#topo{
	width:797px;
	height:80px;
	margin: 0 auto;
}

#corpo ul{
	width:797px;
	height: auto;
	list-style: none;
	margin: 20px 0px 0px 0px;
	padding: 0px;
	float: left;
}

#corpo ul li{
	width:797px;
	height: auto;
	font-family: Verdana;
	font-size: 14px;
	font-weight: bold;
	color: #333;
	text-align: center;
	margin: 10px 0px 10px 0px;
	float: left;
}

#corpo ul li span{
	font-family: Arial;
	font-size: 12px;
	font-weight: bold;
	font-style:italic;
	color: #666666;
	text-align: left;
	margin: 10px 0px 10px 0px;
	float: left;
}

</style>
</head>
<body>

	<div id="corpo">

		<div id="topo">
		<img src="http://intranet.rbvradios.inf.br/imagem/topo_email.jpg" height="80" width="797" border="0">
		</div>

		<ul>
			<li>'.$mensagem.'</li>
			<li><span>De: '.$nome_formulario.'</span></li>
		<ul>
	</div>

</body>
</html>



';


// ****** IMPORTANTE ********
// A PARTIR DE AGORA RECOMENDA-SE QUE NÃO ALTERE O SCRIPT PARA QUE O  SISTEMA FINCIONE CORRETAMENTE
// ****** IMPORTANTE ********

//ESSA VARIAVEL DEFINE SE É O USUARIO QUEM DIGITA O cidade OU SE DEVE ASSUMIR O cidade DEFINIDO
//POR VOCÊ CASO O USUARIO DEFINA O cidade PONHA "s" NO LUGAR DE "n" E CRIE O CAMPO DE NOME
//'cidade' NO FORMULARIO DE ENVIO


$mens = "$configuracao_da_mensagem_original\n";

$headers  = implode ( "\n",array ( "From: $email", "Reply-To: $email_reply", "Subject: $assunto_do_email","Return-Path:  $email_destino","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );


$seuemail = "$email_destino";
mail($seuemail,$assunto_do_email,$mens,$headers);

unset($nome, $email, $assunto_do_email, $mensagem);
	
}	
?>