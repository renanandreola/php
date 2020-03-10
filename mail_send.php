<?php

function pegaValor($valor) {
    return isset($_POST[$valor]) ? $_POST[$valor] : '';
}

function validaEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function enviaEmail($de, $assunto, $mensagem, $para, $email_servidor) {
    $headers = "From: $email_servidor\r\n" .
               "Reply-To: $de\r\n" .
               "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  
  mail($para, $assunto, nl2br($mensagem), $headers);
}

$email_servidor = "renanandreolla@outlook.com";
$para = "renanandreolla@outlook.com";
$de = pegaValor("email");
$mensagem = pegaValor("mensagem");
$assunto = "Assunto da mensagem";

//corpo do script
if ($nome && validaEmail($de) && $mensagem) {
    enviaEmail($de, $assunto, $mensagem, $para, $email_servidor);
    $pagina = "mail_ok.php";
} else {
    $pagina = "mail_error.php";
}
header("location:$pagina");
?>