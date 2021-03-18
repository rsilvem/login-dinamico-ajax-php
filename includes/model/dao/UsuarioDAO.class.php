<?php

class UsuarioDAO{

	private $_link;
	
	private $_conf;
	
	function __construct() {
		
		$this->_conf = simplexml_load_file(dirname(__FILE__) . '/../../../conf/database.xml');
		
		try {
			$this->_link = new PDO("pgsql:dbname=".$this->_conf->dbname .
									";host=".$this->_conf->host .
									";port=".$this->_conf->port .
									";user=".$this->_conf->user .
									";password=".$this->_conf->password
								);
			
		} catch (PDOException $e) {
			echo "Erro ao conectar em banco de dados!";
			exit;
		}
		
	}
	
	function __destruct() {
		//mysql_close($this->_link);
		$this->_link = null;
	}
	

	function autenticaUsuario($usuario) {
	
		$rs = $this->_link->prepare("SELECT nickname, senha FROM usuario WHERE nickname = :nickname and senha = :senha LIMIT 1");
	
		if($rs->execute(array(':nickname' => $usuario->getLogin(), ':senha' => $usuario->getSenha()))){
				
			if($rs->rowCount() > 0){
		
				while($row = $rs->fetch(PDO::FETCH_OBJ)){
					return true;
				}
			}
		}
		
		return false;
	}
	
	public function verificaUsuarioAutenticacao($login) {
		
		$rs = $this->_link->prepare("SELECT nickname, senha, sal FROM usuario WHERE nickname = :nickname LIMIT 1");
		
		if($rs->execute(array(':nickname' => $login))) {
			
			if($rs->rowCount() > 0) {
		
				while($row = $rs->fetch(PDO::FETCH_OBJ)){
					 
					if (($row->senha=="" or is_null($row->senha)) or ($row->nickname=="" or is_null($row->nickname)) or ($row->sal=="" or is_null($row->sal))) {
						return null;
					}
					
					$key = $row->senha . $row->nickname . $row->sal; 
					return $key;
				}
			}
		}
		
		return null;
	}
	

	public function getSalByUsuario($login) {
		
		$rs = $this->_link->prepare("SELECT sal FROM usuario WHERE nickname = :nickname LIMIT 1");
		
		if($rs->execute(array(':nickname' => $login))) {
		
			if($rs->rowCount() > 0){
		
				while($row = $rs->fetch(PDO::FETCH_OBJ)){
					return $row->sal;
				}
			}
		}
		
		return "";
	}
	
}

?>