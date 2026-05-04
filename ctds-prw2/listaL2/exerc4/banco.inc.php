<?php
 class BancoDeDados 
  {
  public $nomeDoBanco;
  public $nomeDaTabela1, $nomeDaTabela2;
  public $servidor;
  public $usuario;
  public $senha;

  function __construct($servidorBanco, $usuarioBanco, $senhaBanco, $nomeBanco, $nomeDaTabela1, $nomeDaTabela2)
   {
   $this->servidor     = $servidorBanco;
   $this->usuario      = $usuarioBanco;
   $this->senha        = $senhaBanco;
   $this->nomeDoBanco  = $nomeBanco;
   $this->nomeDaTabela1 = $nomeDaTabela1;
   $this->nomeDaTabela2 = $nomeDaTabela2;
   }

  function criarConexao()
   {
   $conexao = new mysqli($this->servidor, $this->usuario, $this->senha) OR die($conexao->error);
   return $conexao;
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

  function criarTabela1($conexao)
   {
   $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela1 (
            crm VARCHAR(20) PRIMARY KEY,
            medico VARCHAR(150)
            ) ENGINE=innoDB;";

   $conexao->query($sql) OR die($conexao->error);
   }

   function criarTabela2($conexao){
    $sql = "CREATE TABLE IF NOT EXISTS $this->nomeDaTabela2(
            id INT PRIMARY KEY AUTO_INCREMENT,
            paciente VARCHAR(150),
            data_internacao DATE,
            crm_medico VARCHAR(20),
            FOREIGN KEY (crm_medico) REFERENCES {$this -> nomeDaTabela1}(crm)
            ) ENGINE=innoDB;";

   $conexao->query($sql) OR die($conexao->error);         
   }

  function desconectar($conexao)
   {
   $conexao->close();
   }
  }