<?php
 require "../includes/criar-classe-conexao.inc.php";
  $banco = new bancoDeDados("localhost", "root", "", "sistema_lavacao", "clientes", "veiculos", "administrador");
  $banco->logout();
?>