<?php
// Esta include cria a classe que encapsula todo o comportamento da conexão do PHP com o banco de dados
class BancoDeDados
{
 public $nome;
 public $nomeTabela;
 public $servidor;
 public $usuario;
 public $senha;

 // Método construtor da classe
 public function __construct($servidor, $usuario, $senha, $nome, $nomeTabela)
 {
  $this->servidor = $servidor;
  $this->usuario = $usuario;
  $this->senha = $senha;
  $this->nome = $nome;
  $this->nomeTabela = $nomeTabela;
 }

 // Método que estabelece a ligação virtual entre o nosso código PHP e o servidor MySQL (que o PHP "converse" com o MySQL)
 function conectar()
 {
  $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) or die($conexao->connect_error);
  return $conexao;
 }
 // Método para criar o banco de dados no servidor
 function criarBanco($conexao)
 {
  $sql = "CREATE DATABASE IF NOT EXISTS " . $this->nome;
  $conexao->query($sql) or die($conexao->error);
 }
 // Método para abrir a base de dados criada anteriormente
 function abrirBanco($conexao)
 {
  $conexao->select_db($this->nome) or die($conexao->error);
 }
 // Método para definir, noMySQL, a tabela utf-8 como tabela padrão de caracteres especiais
 function definirCharset($conexao)
 {
  $conexao->set_charset("utf8") or die($conexao->error);
 }
 // Método para criar a tabela no banco de dados
 function criarTabela($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS " . $this->nomeTabela . "(
   id VARCHAR(20) NOT NULL PRIMARY KEY,
   preco DECIMAL(6,2) NOT NULL,
   estoque INT NOT NULL
  )engine=InnoDB;";
  $conexao->query($sql) or die($conexao->error);
 }
 function fecharConexao($conexao)
 {
  $conexao->close();
 }
}