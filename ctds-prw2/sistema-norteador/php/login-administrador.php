<?php  
  require "../includes/criar-classe-conexao.inc.php";
  require "../includes/criar-classe-administrador.inc.php";

  $banco = new BancoDeDados("localhost", "root", "", "sistema_lavacao", "clientes", "veiculos", "administrador");

  $conexao = $banco->criarConexao();
  $banco->criarBanco($conexao);
  $banco->abrirBanco($conexao);
  $banco->definirCharset($conexao);
  $banco->criarTabelaAdmin($conexao);

  $admin = new administradores();

  $admin->definirCredenciais($conexao, $banco->nomeDaTabelaAdmin);

  $admin->logar($conexao, $banco->nomeDaTabelaAdmin);
?>