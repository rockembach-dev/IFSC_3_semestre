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
?>