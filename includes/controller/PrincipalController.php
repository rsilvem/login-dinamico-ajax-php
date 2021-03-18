<?php

session_start();
require("../view/PrincipalView.class.php");
require('../model/util/Autenticacao.class.php');

try {
	$autenticacao = new Autenticacao();
	
	// usuario logou no site
	if ($autenticacao->sessaoLoginValida()) {
		$principalView = new PrincipalView();
		$principalView->mostraTitulo();
	}
	
} catch (Exception $e) {
	echo $e->getMessage()."<BR>";
	die();
}



