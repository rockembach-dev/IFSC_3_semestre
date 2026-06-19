<?php
 class Clientes {
  public $nome;
  public $endereco;
  public $email;
  public $celular;
  public $usuario;
  public $senha;

  function receberDadosForm($conexao)
   {
   $this->nome           = trim($conexao->escape_string($_POST["cliente"]));
   $this->endereco       = trim($conexao->escape_string($_POST["endereco"]));
   $this->email          = trim($conexao->escape_string($_POST["email"]));
   $this->celular        = trim($conexao->escape_string($_POST["celular"]));
   $this->usuario        = trim($conexao->escape_string($_POST["login"]));
   $senha                = trim($conexao->escape_string($_POST["senha"]));
   $senhaCriptografada   = password_hash($senha, PASSWORD_ARGON2I);
   $this->senha          = $senhaCriptografada;
   }

  //método que, de verdade, grava os dados na tabela do banco de dados
  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
             null,
            '$this->nome',
            '$this->endereco',
            '$this->email',
            '$this->celular',
            '$this->usuario',
            '$this->senha')";

   $conexao->query($sql) or die($conexao->error);
   session_start();
   $_SESSION["conectado"] = true;
   }

  function logar($conexao, $nomeDaTabela)
  {
   $usuario = trim($conexao->escape_string($_POST["login"])); 
   $senha = trim($conexao->escape_string($_POST["senha"])); 

   $senhaCriptografada = password_hash($senha, PASSWORD_ARGON2I);

   $sql = "SELECT senha FROM $nomeDaTabela WHERE usuario='$usuario'";
   $resultado = $conexao->query($sql) or die ($conexao->error);

   $senhaDoBanco = false;

   if($conexao->affected_rows != 0)
    {
      $vetorRegistro = $resultado->fetch_array();
      $senhaCriptografada = $vetorRegistro[0];
    
      $senhaDoBanco = password_verify($senha, $senhaCriptografada);
    }

    if($senhaDoBanco == true)
    {
      session_start();
      $_SESSION["conectado"] = true;

      header("location: ../php/protegida1.php");
    }
    else
    {
    echo "<p> Credenciais de autenticação de usuário incorretas. </p>";  
    }
  } 
 }