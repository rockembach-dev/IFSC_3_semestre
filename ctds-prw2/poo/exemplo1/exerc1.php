<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="exerc1.css">
</head>

 <body>
  <h1> Fundamentos do PHP com POO - exemplo 1 </h1>

  <?php 
   require_once "exerc1.inc.php";

   //criar um objeto Item
   $objItem1 = new Item();

   //adicionando valores aos atributos do objeto Item
   $objItem1-> nome = "Impressora";
   $objItem1-> categoria = "Periférico";
   $objItem1-> preco = 200.50;

   //Invocando o método que mostra a categoria do Item

   echo "<p> Categoria : ",$objItem1-> getCategoria(),"</p>"; 

   //Invocando o método que mostra o preço atual do Item
   echo "<p> Preço Atual : R$",$objItem1-> getPreco(), "</p>";
  

   //Modificar o preço atual do Item
   $objItem1->setPreco(309.99);

   //Valor alterado 
   echo "<p> Novo Preço do Item : R$", $objItem1-> getPreco(), "</p>";

  ?>
 </body>
 </html>