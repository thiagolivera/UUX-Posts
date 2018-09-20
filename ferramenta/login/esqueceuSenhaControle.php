<?php
include_once '../Banco.php';
class RecuperarSenha extends Banco{
    
    public function __construct() {
        
    }
    
    public function recuperarSenha($email){
        $isEmailCadastrado = self::isEmailCadastrado($email);
        
        if($isEmailCadastrado == 0){
            header("location:esqueceuSenha.php?erroEmail");
        } else{
            $token = md5($email . date("Y-m-d H:i:s"));

            $sql = "INSERT INTO `loginRecuperacao`(`idToken`, `idUsuario`, `token`, `criadoEm`) VALUES (DEFAULT,'".$isEmailCadastrado[0]."','".$token."','".date("Y-m-d H:i:s")."');";
            parent::Executar($sql);

            $link = "uuxposts.russas.ufc.br/v3/ferramenta/login/esqueceuSenha.php?token=".$token;

            $retorno = array($link, $isEmailCadastrado);
            self::enviarEmail($email,$retorno);
        }
    }

    public function isEmailCadastrado($email){
        $sql = "SELECT * FROM login WHERE login = '" . $email . "' LIMIT 1;";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return 0;
        }
        return @mysqli_fetch_row($rtn);
    }

    public function enviarEmail($siteOwnersEmail, $token){
        $subject = '[UUX-Posts] Recuperação de Senha'; //assunto do e-mail

        // Set Message
        $message .= 'Olá, '. $token[1][1] .'! <br> Parece que você esqueceu sua senha de acesso a ferramenta UUX-Posts.'
                . ' Para recuperá-la, <a href="'.$token[0].'">clique aqui</a>. Este link é válido por 24 horas.'
                . '<br><br>Caso o link acima não funcione copie e cole em seu navegador: '.$token[0];
        $message .= "<br><br> ----- <br /> Essa mensagem foi enviada para ".$siteOwnersEmail." a seu pedido. Caso não tenha sido você, apenas ignore este e-mail. <br />";

        // Set From: header
        $from =  "UUX-Posts <noreply@russas.ufc.br>";

        // Email Headers
        $headers = "From: " . $from . "\r\n";
        $headers .= "Reply-To: ". $from . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        ini_set("sendmail_from", $siteOwnersEmail); // for windows server
        $mail = mail($siteOwnersEmail, $subject, $message, $headers);

        if ($mail) { header("location:esqueceuSenha.php?emailEnviado"); }
        else { echo "Something went wrong. Please try again."; }
    }
    
    public function isToken($token){
        $sql = "SELECT * FROM loginRecuperacao WHERE token = '" . $token . "' LIMIT 1;";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return -1;
        }
        return @mysqli_fetch_row($rtn);
    }
    
    public function verificarValidadeToken($token){
        $dadosToken = self::isToken($token);
        
        $diaAtual  = new DateTime(date("Y-m-d H:i:s"));
        $diaToken = new DateTime($dadosToken[3]);
        
        $diferenca = (array) $diaAtual->diff($diaToken);
        
        if($diferenca["days"] == 0){
            session_start();
            $_SESSION["idUsuario"] = $dadosToken[1];
            header("location:recuperarSenha.php");
        }else{
            header("location:esqueceuSenha.php?tokenExpirado");
        }
    }
    
    public function alterarSenha($idUsuario, $senha){
        $sql = "UPDATE `login` SET `senha` = MD5('". $senha ."') WHERE `codlogin`=".$idUsuario.";";
        parent::Executar($sql);
        return true;
    }
}