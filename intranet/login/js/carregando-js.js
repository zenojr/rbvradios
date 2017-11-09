//Mostra o carregador
function __loadMostra(){
	document.getElementById("carregador").style.display="block";

    $(document).ready(function() {

          $('html, body').animate({scrollTop:0}, 'slow');
      return false;

     });

}