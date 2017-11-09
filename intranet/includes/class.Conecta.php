<?php

ini_set('default_charset','UTF-8'); 
//class conecta

class conexao{
    
    private $host ="mysql02.rbvradios1.hospedagemdesites.ws";
    private $user="rbvradios11";
    private $senha="acre6458";
    private $banco="rbvradios11";
    private $con="";
    
    //metodo contrutor
    
    function __construct() {
        
        if(mysql_set_charset('utf8', $this->con = mysql_connect($this->host, $this->user, $this->senha))){
            
            
            if(!$this->seldb = mysql_select_db($this->banco, $this->con)){
                
                die ('<center>Erro ao selecionar Banco'.'<br>Linha:'. __LINE__ .'<br>'.mysql_error()).'</center>';
                            
            }else{
                
                return $this->con;
            }
            
            
        }
                
                
        
        
    }
    
    
    
}


?>
