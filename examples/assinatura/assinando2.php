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

//Nome do comprador igual a como esta no CARTÂO
$pagseguro->setNomeCliente("GABRIEL BARBOSA DAVID");
//Email do comprovador
$pagseguro->setEmailCliente("c45014486012121325466@sandbox.pagseguro.com.br");
//Informa o telefone DD e número
$pagseguro->setTelefone('11', '999999999');
//Informa o CPF
$pagseguro->setCPF('11111111111');
//Informa o endereço RUA, NUMERO, COMPLEMENTO, BAIRRO, CIDADE, ESTADO, CEP
$pagseguro->setEnderecoCliente('Rua C', '99', 'COMPLEMENTO', 'BAIRRO', 'São Paulo', 'SP', '57000000');
//Informa o ano de nascimento
$pagseguro->setNascimentoCliente('01/01/1990');
//Infora o Hash  gerado na etapa anterior (assinando.php), é obrigatório para comunicação com checkoutr transparente
$pagseguro->setHashCliente($_POST['hash']);
//Informa o Token do Cartão de Crédito gerado na etapa anterior (assinando.php)
$pagseguro->setTokenCartao($_POST['token']);
//Código usado pelo vendedor para identificar qual é a compra
$pagseguro->setReferencia("CWG004");
//Plano usado (Esse código é criado durante a criação do plano)
$pagseguro->setPlanoCode('E488FBA13434E41114179FB619875F62');
//No ambiente de testes funciona normalmente sem o IP, no ambiente "real", mesmo na documentação falando que é opcional, precisei passar o IP ($_SERVER['HTTP_CLIENT_IP'];) do cliente para finalizar corretamente a assinatura
// https://comunidade.pagseguro.uol.com.br/hc/pt-br/community/posts/360001810594-Pagamento-Recorrente-Cancelado- (o erro e a solução encontrada)
$pagseguro->setIPCliente('127.0.0.1');

try{
    $codigo = $pagseguro->assinaPlano();
    echo 'O código unico da assinatura é: ' . $codigo;
} catch (Exception $e) {
    echo $e->getMessage();
}
