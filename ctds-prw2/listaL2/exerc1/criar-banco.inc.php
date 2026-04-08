<?php
 //Esta include cria a classe que encapsula todo o comportamento da conexão do PHP com o Banco de Dados
 class BancoDeDados {
   public $nomeDoBanco;
   public $nomeDaTabela;
   public $servidor;
   public $usuario;
   public $senha;

   //método construtor da classe
   function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeTabela)
   {
    $this -> servidor = $servidorBanco;
    $this -> usuario = $usuarioBanco;
    $this -> senha = $senhaBanco;
    $this -> nomeDoBanco = $nomeBanco;
    $this -> nomeDaTabela = $nomeTabela; 
   }
   
  //método que estabelece a ligação virtual entre o nosso código PHP e o servidor MySQL (que o PHP "converse" com MySQL)
  function criarConexao()
  {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR die($conexao->error);
   return $conexao;
  }
 }

 function criarBanco($conexao)
 {
  $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
  $conexao->query($sql) or die($conexao->error);
 }

 function abrirBanco($conexao)
 {
  $conexao->select_db($this->nomeDoBanco);
 }

 function definirCharset($conexao)
 {
  $conexao->set_charset("utf8");
 }

 function criarTabela($conexao)
 {
  $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela(
          matricula VARCHAR(20) PRIMARY KEY,
          aluno VARCHAR(100),
          media DECIMAL(3,1)
          )"
 }
?>