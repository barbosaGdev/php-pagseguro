<?php
//=============================================//
//           Criando uma assinatura		       //
//=============================================//
require dirname(__FILE__)."/../_autoload.class.php";
use CWG\PagSeguro\PagSeguroAssinaturas;

$email = "barbosagdev@gmail.com";
$token = "E0C36822391B4A548918B0B346FB5E17";
$sandbox = true;

$pagseguro = new PagSeguroAssinaturas($email, $token, $sandbox);

$codigoPlano = 'E488FBA13434E41114179FB619875F62';
$url = $pagseguro->assinarPlanoCheckout($codigoPlano);

echo 'URL para o Checkout: ' . $url;