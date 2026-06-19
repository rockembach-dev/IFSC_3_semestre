<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Conteúdo restrito - página 1 </title>
 <link rel="stylesheet" href="../css/formata-login.css">
</head>

<body>
 <?php
 require "../includes/criar-classe-conexao.inc.php";
 $banco = new bancoDeDados("localhost", "root", "", "sistema_lavacao", "clientes", "veiculos", "administrador");
 $banco->testarSessao();
 ?>
 
 <h1> Bem-vindo, caro usuário ou administrador! Sinta-se à vontade para explorar e utilizar todo o conteúdo restrito, que você acessa neste momento, de nossa aplicação web. </h1>

 <form action="../php/logout.php" method="post">
  <fieldset>
   <legend> Desconectar usuário ou administrador </legend>
   <button> Logout do sistema </button>
  </fieldset>
 </form>
</body>
</html>