<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Atividade Prática 1 - POO em PHP </title>
  <link rel="stylesheet" href="atvd.css">
</head>
<body>
  <h1> Atividade Prática 1 - POO em PHP </h1>
 
<?php
  require"atvd1.inc.php";

  //Criando objeto livro
  $objLivro = new Livro();

  //aplicar o desconto e atualizar o preço
  $objLivro->calcularDesconto();

  //mostrar os dados
  $objLivro->mostrarDados();




?>
  
</body>
</html>