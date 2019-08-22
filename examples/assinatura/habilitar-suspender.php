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

$codePagSeguro = '1BA8C57CD4D4F3F114A8FFB47768EA2F';

try {
    print_r($pagseguro->setHabilitarAssinatura($codePagSeguro, true));
} catch (Exception $e) {
    echo $e->getMessage();
}