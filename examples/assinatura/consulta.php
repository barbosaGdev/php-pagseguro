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

$codeAssinatura = '131F919E44449D62244DEFAA0FEB334C';
$response = $pagseguro->consultaAssinatura($codeAssinatura);
print_r($response);die;
