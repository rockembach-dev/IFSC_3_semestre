<?php  
  require "../includes/criar-classe-conexao.inc.php";
  require "../includes/criar-classe-clientes.inc.php";

  $banco = new BancoDeDados("localhost", "root", "", "sistema_lavacao", "clientes", "veiculos", "administrador");

  $conexao = $banco->criarConexao();
  $banco->criarBanco($conexao);
  $banco->abrirBanco($conexao);
  $banco->definirCharset($conexao);
  $banco->criarTabelaClientes($conexao);
  $banco->criarTabelaVeiculos($conexao);
  
  $clientes = new Clientes();

  $clientes->cadastrar($conexao, $banco->nomeDaTabelaClientes);
  header("location: protegida1.php");

?>