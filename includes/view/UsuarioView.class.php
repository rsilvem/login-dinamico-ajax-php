<?php

class UsuarioView{

	function respostaAutenticacao($resposta){
	
		print "<PRE>";
		print_r(@$_SESSION);
		print "</PRE>";
		
		/*Se a variável $resposta estiver neste momento como TRUE, então os dados estão corretos e podemos 
		exibir uma mensagem de sucesso. Caso contrário, irá cair no else, que irá alertar que os dados são inválidos.*/
		if($resposta){
			
			echo '<p class="blue">Login efetuado com sucesso!</p>';
			//header('location: ../controller/PrincipalController.php');
		}
		else{
			echo '<p class="red">Erro ao efetuar o login. Dados incorretos!</p>';
		}
	}

}

?>