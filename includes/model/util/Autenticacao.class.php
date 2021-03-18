<?php

require("../model/dao/UsuarioDAO.class.php");

class Autenticacao {

	function geraSal($size) {
		
		// String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
		$basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789#$*@-+';
		
		$return = "";
		
		for($count = 0; $size > $count; $count ++) {
			// Gera um caracter aleatorio
			$return .= $basic [rand ( 0, strlen ( $basic ) - 1 )];
		}
		
		return $return;
	}
	
	function sessaoLoginValida() {
		
		$usuarioDAO = new UsuarioDAO();
		
		if (@$_SESSION) {
			$chaveUsuarioDescript = $usuarioDAO->verificaUsuarioAutenticacao($_SESSION['nome_sys_log1202']);
			if ($chaveUsuarioDescript) {
				if (md5(base64_encode($chaveUsuarioDescript)) == $_SESSION['key_sys_log1202']) {
					return true;
				}
			}
		}
		
		throw new Exception('Permissao negada',100);
		return false;
	}
	
}

?>