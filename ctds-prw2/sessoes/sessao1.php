<?php
 session_start();   //linha obrigatória 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Sessões com PHP</title>
</head>

<body>

 <h1> Gravando informações com sessões no servidor - página 1 </h1>
 
 <form action="sessao1.php" method="post">
   <fieldset>
     <legend> Dados Cadastrais </legend>

      <label> Aluno: </label>
      <input type="text" name="aluno"> <br> <br>

      <label> Média de PRW II: </label>
      <input type="number" name="media"> <br> <br> 
   </fieldset>

   <button name="enviar" type="submit" > Criar sessão e mostrar variáveis de </button>
 </form> <br> <br>

 <?php 
   if(isset($_POST["enviar"]))
    {

     //criando o vetor de sessão 
     $_SESSION["aluno"] = $_POST['aluno'];
     $_SESSION["media"] = $_POST['media'];
     $_SESSION["data"]  = date("d/m/Y");   //Y maiusculo retorna "2026" se for minusculo retorna "26"
    }
 ?>

 <a href="sessao2.php"> Próxima página </a>
</body>
</html>