<?php
include './Banco.php';
class Autenticacao extends Banco {
	protected $_login, $_senha;
        
	public function __construct($login, $senha){
		$this->_login = addslashes($login);
		$this->_senha = addslashes($senha);
		self::validarUser();
	}

	protected function validarUser(){
		$sql = "SELECT * FROM login WHERE login = '".$this->_login."' AND crypsenha = MD5('".$this->_senha."') LIMIT 1;";
		$rtn = parent::Executar($sql);
		if($rtn == '0'){
                    //nada encontrado
		}else{
                    $usuario = pg_fetch_row($rtn);
                    if($usuario[4] === 'f'){
                        $_SESSION['login'] = $usuario[0];
                        header("location:index.php");
                    }
			//Usuario encontrado
			//Você pode dar um fetch alguma coisa aqui para ver se ele está ou nao bloqueado;
			//E daqui mesmo da classe jogar os dados para dentro de uma sessao com o nome dele
			//e retornar true caso esteja tudo bem e redirecionar para a pagina de acesso.
		return true;
		}		
	}
}