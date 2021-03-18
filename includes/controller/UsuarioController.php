<?php

//Aqui importamos todas as classes que poderуo ser usadas baseado nas solicitaчѕes que forem feitas.
require("../model/bean/Usuario.class.php"); // Classe Bean
require("../model/dao/UsuarioDAO.class.php"); // Classe DAO
require("../view/UsuarioView.class.php"); //Classe View

//Armazena na variсvel $acao o que o sistema esta requisitando (cadastrar, autenticar, excluir, etc)
$acao = $_REQUEST["acao"];

//Baseado no que foi solicitado, chama na classe DAO o mщtodo responsсvel por tal tarefa, e depois manda pra View a resposta, para ser exibida de alguma forma ao usuсrio
switch($acao){

	case 'autenticar':{
		
		// Se for autenticar, entуo deverуo ser informados login e senha.
		
		//Primeiro instanciamos um objeto da classe Bean, para setar os valores informados no formulсrio
		$usuario = new Usuario();	
		
		/* Agora vamos instanciar um objeto da classe DAO e um da View, e passaremos para a View o que for retornado pela DAO */
		$usuarioDAO = new UsuarioDAO();
		$usuarioView = new UsuarioView();
		
		/* Agora setamos para a Bean os valores informados,pois serуo validados na camada DAO, que 
		irс verificar a consistencia dos dados em um Banco de Dados: MySQL, XML, ou qualquer outra base de dados; e depois retornar para a controller o resultado. */
		$usuario->setLogin($_REQUEST["login"]);
		$usuario->setSal($usuarioDAO->getSalByUsuario($_REQUEST["login"]));
		$usuario->setSenha($_REQUEST["senha"]);
		
		//Passaremos para o mщtodo de autenticaчуo da DAO um objeto da classe Usuсrio. Armazenaremos na variсvel $resultado o que este mщtodo retornar.
		$resultado = $usuarioDAO->autenticaUsuario($usuario);
		
		if ($resultado) {
			
			session_start();
			$_SESSION["nome_sys_log1202"] = $usuario->getLogin();
			$_SESSION["key_sys_log1202"]  = md5(base64_encode($usuario->getSenha() . $usuario->getLogin() . $usuario->getSal())); // senha ja esta criptografada + login + sal (re-criptografa)
		}
		
		//Agora chamamos um mщtodo da View passando para o mesmo o que foi retornado pela DAO.
		$usuarioView->respostaAutenticacao($resultado);
		
	}
	break;
	
	case 'cadastrar':{
		//Aqui faz as validaчѕes necessсrias e requisita o mщtodo da classe DAO responsсvel por cadastrar o usuсrio.
	}
	
	case 'excluir':{
		//Aqui faz as validaчѕes necessсrias e requisita o mщtodo da classe DAO responsсvel por excluir o usuсrio.
	}
	
	default:
		return null; //Por padrуo, esse switch nуo retorna nada.
		
}


?>