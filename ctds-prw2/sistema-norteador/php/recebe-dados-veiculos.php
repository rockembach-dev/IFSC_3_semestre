<!DOCTYPE html> 
<html lang="pt-BR"> 
<head> 
  <meta charset="utf-8"> 
  <title> Sistemas Norteador - protótipo de aplicação web para lavação de automóveis  </title> 
  <link rel="stylesheet" href="../css/formata-lavacao.css">
</head> 

<body> 
 <div class="conteiner">

  <header>
   <h1> Lavação - Sistema Norteador </h1>
  </header>  
 
  <main>
   <?php
    require "../includes/criar-classe-conexao.inc.php";
    require "../includes/criar-classe-veiculos.inc.php";

    $objBanco = new BancoDeDados("localhost", "root", "", "sistema_lavacao", "clientes", "veiculos", "administrador");

    $conexao = $objBanco->criarConexao();
    $objBanco-> criarBanco($conexao);
    $objBanco-> abrirBanco($conexao);
    $objBanco-> definirCharset($conexao);
    $objBanco-> criarTabelaClientes($conexao);
    $objBanco-> criarTabelaVeiculos($conexao);

    $objVeiculos = new Veiculos();
    $objVeiculos->receberDadosForm($conexao);
    $objVeiculos->cadastrar($conexao, $objBanco->nomeDaTabelaVeiculos);
    
    $objBanco-> desconectar($conexao);
   ?>

   <p> Veiculo cadastrado com sucesso! </p>

   <form action="../html/cadastro-veiculo.html" method="post">
    <button> Cadastrar outro Veiuclo </button>
   </form>
  </main>
</body> 
</html> 