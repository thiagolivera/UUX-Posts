<?php

// Replace this with your own email address
$siteOwnersEmail = 'thiago.engsoftware@gmail.com';
$isaiasEmail = 'isaiasfs1997@hotmail.com';
$orientadoraEmail = 'marilia.mendes@ufc.br';


if($_POST) {

    $name = trim(stripslashes($_POST['nome']));
    $email = trim(stripslashes($_POST['email']));
    $subject = trim(stripslashes('[UUX-POSTS] ' . $_POST['assunto']));
    $contact_message = trim(stripslashes($_POST['mensagem']));


    // Set Message
    $message = "Email from: " . $name . "<br />";
    $message .= "Email address: " . $email . "<br />";
    $message .= "Message: <br />";
    $message .= $contact_message;
    $message .= "<br /> ----- <br /> Este e-mail foi enviado pelo formulário de contato da UUX-Posts. <br />";

    // Set From: header
    $from =  $name . " <" . $email . ">";

    // Email Headers
    $headers = "From: " . "noreply@russas.ufc.br" . "\r\n";
    $headers .= "Reply-To: ". $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
    
    //envia email para desenvolvedor para a marilia
    ini_set("sendmail_from", $siteOwnersEmail); // for windows server
    $mail = mail($siteOwnersEmail, $subject, $message, $headers);
    
    ini_set("sendmail_from", $isaiasEmail); // for windows server
    $mail = mail($isaiasEmail, $subject, $message, $headers);
    
    ini_set("sendmail_from", $orientadoraEmail); // for windows server
    $mail = mail($orientadoraEmail, $subject, $message, $headers);

    if ($mail) { header("location:contato.php?sucesso"); }
    else { header("location:contato.php?erro"); }
}

?>