<?php 
	//------------------------------
	//UFT-8
	ini_set('default_charset','UTF-8'); 

	define('CONTROLLER', 'app/controller/');
	define('VIEWS', 'app/view/');
	define('MODEL', 'app/model/');
	define('HERLPERS', 'system/helpers/');
 	 
 	 function __autoload($file){

 	 	if(file_exists(MODEL.$file.'.php'))
 	 		require_once(MODEL.$file.'.php');
 	 	else if(file_exists(HERLPERS.$file.'.php'))
 	 		require_once(HERLPERS.$file.'.php');
 	 	else if(file_exists(CONTROLLER.$file.'.php'))
 	 		require_once(CONTROLLER.$file.'.php');
 	 	else
 	 		die('Model ou Helper Não Encontrado.');

 	 }

 	 require_once('system/System.php');
 	 require_once('system/Model.php');
 	 require_once('system/Controller.php');

 	 $start = new System;
 	 $start->run();
?>