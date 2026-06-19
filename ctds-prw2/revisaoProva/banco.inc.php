<?php

class bancoDeDados
{
 public $nomeBanco;
 public $nomeTabela;
 public $servidor;
 public $usuario;
 public $senha;

 function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela)
 {
  $this->servidor = $servidorBanco;
  $this->usuario = $usuarioBanco;
  $this->senha = $senhaBanco;
  $this->nomeBanco = $nomeBanco;
  $this->nomeTabela = $nomeTabela;
 }

 function criarConexao()
 {
  $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR DIE ($conexao->error);
  return $conexao;
 }

 function criarBanco($conexao)
 {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeBanco";
  $conexao->query($sql) OR DIE ($conexao->error);
 }

 function abrirBanco($conexao)
 {
  $conexao->select_db($this->nomeBanco); 
 }

 function definirCharset($conexao)
 {
  $conexao->set_charset("utf8");
 }

 function criarTabela($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeTabela (
              placa VARCHAR(10) NOT NULL PRIMARY KEY,
              modelo VARCHAR(100) NOT NULL,
              marca VARCHAR(100) NOT NULL,
              cor VARCHAR(100) NOT NULL)ENGINE = InnoDB;"; 

  $conexao->query($sql) OR die($conexao->error);            
 }

 function desconectar($conexao)
 {
  $conexao->close();
 }
} 

?>