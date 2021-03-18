<?php 
ini_set("register_globals", false);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="author" content="Hugo Ferreira - Desenvolvimentos de Sites | Sistemas Web | Sistemas Desktop" />
<meta name="title" content="Login din&acirc;mico em AJAX - PHP | Padr&atilde;o MVC | jQuery - por Hugo Ferreira" />
<meta name="description" content="Login din&acirc;mico em AJAX - PHP | Padr&atilde;o MVC | jQuery - Parte 1" />
<meta name="keywords" content="login dinamico, login ajax, php, hcferreira" />
<meta name="category" content="ajax, web, php" />
    
<title>Login</title>

<!-- Favicon - Icone na barra de título e endereço -->
<link rel="shortcut icon" href="http://www.hcferreira.com.br/templates/template_hcf/favicon.ico" />
    
<!-- Linkando o arquivo de formatação do conteudo - layout.css -->
<link href="css/layout.css" rel="stylesheet" type="text/css" />

<!-- Linkando a biblioteca javascript jQuery -->
<script type="text/javascript" src="js/lib/jquery-1.4.2.js"></script>

<!-- Linkando o arquivo que terá as funções javascript - functions.js -->
<script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
	
    <div id="form_container">
    	
        <form action="includes/controller/UsuarioController.php" method="post" name="frm_login">
        <!--input type="hidden" name="acao" value="autenticar" /-->
        
        <fieldset>
        <legend>Efetuar login:</legend>
            Login:<br />
            <input type="text" name="login" id="login" />
            
            <br /><br />
            
            Senha:<br />
            <input type="password" name="senha" id="senha" /><br /><br />
            
            <button type="button" name="btn_login" id="btn_login">Entrar</button>
			<button type="button" name="btn_sair" id="btn_sair">Sair</button>
            <!--<button type="submit" name="btn_login" id="btn_login">Entrar</button>-->
        </fieldset>
        </form>
    
    </div>
    
    <div id="cadastrar">
    	<a href="includes/controller/CadastroUsuarioController.php">Cadastrar-se</a>
    </div>
    
    <div id="resultado"></div>
	<div id="res_sair"></div>

</body>
</html>