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

//Sete apenas TRUE caso queira importa o Jquery também. Caso já possua, não precisa
$js = $pagseguro->preparaCheckoutTransparente(true);
echo $js['completo'];
?> 



<h2> Campos Obrigatórios </h2>

<p>Nome do Cliente</p>
<input type="text" id="nome_cliente" />

<p>Data de Nascimento</p>
<input type="text" id="data_nasc" />

<p>CPF</p>
<input type="text" id="cpf" />

<p>E-mail do Cliente</p>
<input type="text" id="email_cliente" />

<p>DDD</p>
<input type="text" id="ddd" />

<p>Telefone</p>
<input type="text" id="telefone" />

<p>Endereço</p>
<input type="text" id="endereco" />

<p>Número</p>
<input type="text" id="numero" />

<p>Bairro</p>
<input type="text" id="bairro" />

<p>Complemento</p>
<input type="text" id="complemento" />

<p>Cidade</p>
<input type="text" id="cidade" />

<p>Unidade Federativa</p>
<input type="text" id="estado" />

<p>CEP</p>
<input type="text" id="cep" />

<p>Número do Cartão</p>
<input type="text" id="pagseguro_cartao_numero" />

<p>CVV do cartão</p>
<input type="text" id="pagseguro_cartao_cvv"  />

<p>Mês de expiração do Cartao</p>
<input type="text" id="pagseguro_cartao_mes"  />

<p>Ano de Expiração do Cartão</p>
<input type="text" id="pagseguro_cartao_ano" />

<br>

<button id="botao_comprar">Comprar</button>





<script type="text/javascript">

    // const mysql      = require('mysql');
    // const connection = mysql.createConnection({
    // host     : 'localhost',
    // port     : 8000,
    // user     : 'root',
    // password : '',
    // database : 'wp_portinari'
    // });
    
    // connection.connect(function(err){
    // if(err) return console.log(err);
    // console.log('conectou!');
    // createTable(connection);
    // });


    function recebeCartao() {
        var cartao = {
        
        numero_cartao: $('#pagseguro_cartao_numero').val(),
        cvv_cartao: $('#pagseguro_cartao_cvv').val(),
        mes_cartao: $('#pagseguro_cartao_mes').val(),
        ano_cartao: $('#pagseguro_cartao_ano').val(),

        
    }

  
    }


    //Gera os conteúdos necessários
    $('#botao_comprar').click(function() {
        recebeCartao(); //Guarda as informações do cartão para gerar o token
        PagSeguroBuscaHashCliente(); //Cria o Hash identificador do Cliente usado na transição
        PagSeguroBuscaBandeira();   //Através do pagseguro_cartao_numero do cartão busca a bandeira
        PagSeguroBuscaToken();      //Através dos 4 campos acima gera o Token do cartão  
        setTimeout(function() {
            enviarPedido();
        }, 3000);
    });

    function enviarPedido() {
        alert($('#pagseguro_cliente_hash').val())
        alert($('#pagseguro_cartao_token').val())
       
        
        var data = {
            hash:  $('#pagseguro_cliente_hash').val(),
            token: $('#pagseguro_cartao_token').val(),
            nome_cliente: $('#nome_cliente').val(),
            email_cliente: $('#email_cliente').val(),
            ddd: $('#ddd').val(),
            telefone: $('#telefone').val(),
            endereco: $('#endereco').val(),
            data_nasc: $('#data_nasc').val(),
            cpf: $('#cpf').val(),
            numero: $('#numero').val(),
            bairro: $('#bairro').val(),
            cidade: $('#cidade').val(),
            complemento: $('#complemento').val(),
            estado: $('#estado').val(),
            cep: $('#cep').val(),
        };

        
        $.post('http://localhost:8000/examples/assinatura/assinando2.php', data, function(response) {
            alert(response);
        });
    }

    // function addRows(conn){
    // const sql = "INSERT INTO wp_signature (nome_cliente, email_cliente, ddd, telefone, endereco, data_nasc, cpf, numero, bairro, cidade, complemento, estado, cep) VALUES ?";

    // const values = [
    //         [$('#nome_cliente').val(), $('#email_cliente').val(), $('#ddd').val(), $('#telefone').val(), $('#endereco').val(), $('#data_nasc').val(), $('#cpf').val(), $('#numero').val(), $('#bairro').val(), $('#cidade').val(), $('#complemento').val(), $('#estado').val(), $('#cep').val()],
    //     ];
        
    // conn.query(sql, [values], function (error, results, fields){
    //         if(error) return console.log(error);
    //         alert('Adicionou registros!');
    //         conn.end();//fecha a conexão
    //     });
    // }


    

</script>