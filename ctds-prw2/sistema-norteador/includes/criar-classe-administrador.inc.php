<?php

class administradores
{
 public $login;
 public $senha;

 function definirCredenciais($conexao, $nomeDaTabelaAdmin)
 {
  $this->login = "admin";
  $this->senha = "123";

  $senhaCriptografada = password_hash($this->senha, PASSWORD_ARGON2I);

  $sql = "INSERT $nomeDaTabelaAdmin VALUES(
          null,
          '$this->login',
          '$senhaCriptografada')";
     
  $conexao->query($sql) OR die ($conexao->error);   
 }
 
 function logar($conexao, $nomeDaTabela)
  {
   $login = trim($conexao->escape_string($_POST["login"])); 
   $senha = trim($conexao->escape_string($_POST["senha"])); 

   $senhaCriptografada = password_hash($senha, PASSWORD_ARGON2I);

   $sql = "SELECT senha_admin FROM $nomeDaTabela WHERE login_admin='$login'";
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
?>