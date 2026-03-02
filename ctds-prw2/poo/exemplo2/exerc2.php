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
   require "exerc2.inc.php";

  $objCurso1 = new Curso("Desenvolvimento de Sisteams", 40);
  $objCurso2 = new Curso("Enfermagem", 2);

  //Mostrando informações do 1°Curso

  echo "<p> Duração do 1°Curso : ", $objCurso1->duracao,"hrs </p>";
  echo "<p> Nome do 1° Curso : ", $objCurso1->nome,"</p>";

 

  ?>
 </body>
 </html>