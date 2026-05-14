<?php
  class BancoDeDados
  {
   public $nomeDoBanco;
   public $nomeDaTabela;
   public $servidor;
   public $usuario;
   public $senha;

   function __construct($servidorBanco, $usuarioBanco,
   $senhabanco, $nomeBanco, $nomeDaTabela)
   {
    $this->servidor = $servidorBanco;
    $this->usuario = $usuarioBanco;
    $this->senha = $senhabanco;
    $this->nomeDoBanco = $nomeBanco;
    $this->nomeDaTabela = $nomeDaTabela;
   }

   function criarConexao()
   {
    $conexao = new mysqli($this->servidor, $this->usuario,$this->senha) OR die($conexao->error);
    return $conexao;
   }

   function criarBanco($conexao)
   {
    $sql = "CREATE DATABASE IF NOT EXISTS $this->nomeDoBanco";
    $conexao->query($sql) or die ($conexao->error);
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
    $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela (
              isbn VARCHAR(50) PRIMARY KEY,
              titulo VARCHAR(200),
              autor VARCHAR(400),
              preco INT,
              data_lancamento DATE)ENGINE = InnoDB;";

    $conexao->query($sql) or die ($conexao->error);          
   }

   function desconectar($conexao)
   {
    $conexao->close();
   }
  }