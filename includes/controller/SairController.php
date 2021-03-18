<?php

require_once("../view/SairView.class.php"); //Classe View

session_start();

if (isset($_SESSION["nome_sys_log1202"])) {
	
	$SairView = new SairView();
	
	$SairView->getMessage();
	
	session_destroy();
	unset($_SESSION);
	
}

?>