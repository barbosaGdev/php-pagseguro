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

$codePagSeguro = '324CE6D30505CFB3344E1F8C5CFF9926';

try {
    print_r($pagseguro->cancelarAssinatura($codePagSeguro));
} catch (Exception $e) {
    echo $e->getMessage();
}