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
    $conexao = new mysqli($this->servidor, $this->usuarip,$this->senha) OR die($conexao->error)
   }
  }