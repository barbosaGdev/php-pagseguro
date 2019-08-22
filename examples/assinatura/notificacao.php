<?php
//=============================================//
//           Cancelando assinatura		       //
//=============================================//
require dirname(__FILE__)."/../_autoload.class.php";
use CWG\PagSeguro\PagSeguroAssinaturas;

$email = "barbosagdev@gmail.com";
$token = "E0C36822391B4A548918B0B346FB5E17";
$sandbox = true;

$pagseguro = new PagSeguroAssinaturas($email, $token, $sandbox);

// $_POST['notificationType'] = 'preApproval';
// $_POST['notificationCode'] = '144F13-CC5C135C13CE-FBB4906F9375-850AB5';

//Caso seja uma notificação de uma assinatura (preApproval)
if ($_POST['notificationType'] == 'preApproval') {
    $codigo = $_POST['notificationCode']; //Recebe o código da notificação e busca as informações de como está a assinatura
    $response = $pagseguro->consultarNotificacao($codigo);
    print_r($response);die;
}