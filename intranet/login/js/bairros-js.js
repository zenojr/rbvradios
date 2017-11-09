		$(function(){
			$('#cidade').change(function(){
				if( $(this).val() ) {
					$('#bairro').hide();
					$('.carregando').show();
					$.getJSON('http://www.imobiliariacontestado.com/login/includes/class.Bairros.php?search=',{cidade: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].nome + '">' + j[i].nome + '</option>';
						}	
						$('#bairro').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#bairro').html('<option value=""> Escolha um Bairro </option>');
				}
			});
		});