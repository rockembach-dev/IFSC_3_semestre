<?php

 class BancoDeDados
 {
  public $nomeDoBanco;
  public $nomeDaTabela;
  public $servidor;
  public $usuario;
  public $senha;

  function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeDoBanco, $nomeDaTabela)
  {
   $this->servidor     = $servidorBanco;
   $this->usuario      = $usuarioBanco;
   $this->senha        = $senhaBanco;
   $this->nomeDoBanco  = $nomeDoBanco;
   $this->nomeDaTabela = $nomeDaTabela;  
  }

  function criarConexao()
  {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR die($conexao->error);
   return $conexao;
  }

  function criarBanco($conexao)
  {
   $sql = "CREATE DATABASE IF NOT EXISTS
   $this->nomeDoBanco";
   $conexao->query($sql) OR die($conexao->error);
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
              id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
              nome VARCHAR(300) NOT NULL,
              orcamento DECIMAL(10,2) NOT NULL,
              data_inicio DATE NOT NULL,
              horas INT NOT NULL)ENGINE = InnoDB;";
             
   $conexao->query($sql) or die ($conexao->error);          
  }

  function desconectar($conexao)
  {
   $conexao->close();
  }
 }
?>