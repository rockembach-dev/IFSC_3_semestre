<?php

Class bancoDeDados
{
 public $servidor;
 public $usuario;
 public $senha;
 public $nomeBanco;
 public $nomeTabela;

 function __construct($servidor, $usuario, $senha, $nomeBanco, $nomeTabela)
 {
  $this->servidor = $servidor;
  $this->usuario  = $usuario;
  $this->senha = $senha;
  $this->nomeBanco = $nomeBanco;
  $this->nomeTabela = $nomeTabela;
 }

 function criarConexao()
 {
  $conexao = new mysqli($this->servidor,$this->usuario, $this->senha) OR die ($conexao->error);
  return $conexao;
 }

 function criarBanco($conexao)
 {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeBanco";
  $conexao->query($sql) OR die($conexao->error);
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
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeTabela(
                 id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                 nome VARCHAR(200) NOT NULL UNIQUE,
                 preco DECIMAL(5,2) NOT NULL,
                 genero VARCHAR(100) NOT NULL)ENGINE = InnoDB;";

 $conexao->query($sql) OR die($conexao->error);                
 }


 function desconectar($conexao)
 {
  $conexao->close();
 }

}

?>