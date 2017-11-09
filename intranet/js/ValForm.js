$(document).ready(function(){

	//executa a função pelo classe do botao submit  e pelo id lá definido
	$(".comment_submit").click(function(){

			//pega os dados conforme o o nome do campo mais o ID do formulario
			var element = $(this);
			var id = element.attr("id");//pega id do campo SUBMIT  que é o mesmo do Form.
			var conteudo_formulario = $("#conteudo_formulario"+id).val();//monta os campos
			var email_destino 		= $("#email_destino"+id).val();
			var email_formulario 	= $("#email_formulario"+id).val();
			var nome_formulario 	= $("#nome_formulario"+id).val();

			//faz toda a validação fo Form
			if(nome_formulario == 'Seu Nome'){

				$("#status").hide(); //esconde status de envio
				$("#status_erro").show();//mostra status de erro
				$("#status_erro").fadeOut(10000);//delay pra sair o status de erro automatico
				$("#status_erro").html("Preencha Seu Nome!");//retorna o erro que aconteceu
			
			}else if(email_formulario == 'Seu Email'){

				$("#status").hide();
				$("#status_erro").show();
				$("#status_erro").fadeOut(10000);
				$("#status_erro").html("Preencha Seu Email!");
			
			}else if(conteudo_formulario == 'Dê os Parabéns'){

				$("#status").hide();
				$("#status_erro").show();
				$("#status_erro").fadeOut(10000);
				$("#status_erro").html("Preencha o Campo da Mensagem! ");
			
			//faz toda a validação fo Form
			//Caso Esteja tudo OK ele retorna os valores Positivos e executa o Script de Envio na pagina Class.Envia_form.php
			}else{

				$("#status").show();//mostra status
				$("#status_erro").hide();//esconte status de erro

				$.ajax({ //ajax por onde vai os dados
					type: "POST",
					url: "includes/class.Envia_form.php",
					data: {conteudo_formulario:conteudo_formulario , email_destino:email_destino , email_formulario:email_formulario , nome_formulario:nome_formulario},
					cache: false,
					success: function(html){

						$("#status_erro").hide();//esconde status de erro
						$("#status").append(html);
						$("#status").fadeOut(10000);//sai automatico status
						$("#nome_formulario"+id).val("Seu Nome");//limpa os campos
						$("#email_formulario"+id).val("Seu Email");//limpa os campos
						$("#conteudo_formulario"+id).val("Dê os Parabéns");//limpa os campos
						$("#status").html("Enviado Com Sucesso!");//escreve msg de sucesso
					}

				});

			}

			return false;

	});

});