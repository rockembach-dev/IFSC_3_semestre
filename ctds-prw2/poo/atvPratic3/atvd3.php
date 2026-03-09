<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="atvd.css">
 <title> Atividade Prática 3 - POO em PHP </title>
</head>
<body>
 <h1> Atividade Prática 3 - POO em PHP </h1>

<?php
   require_once"atvd3.inc.php";

   $objItem = new itemInformatica();

   $objItem-> desconto();

   $objItem-> mostrarDados();






?>
 
</body>
</html>