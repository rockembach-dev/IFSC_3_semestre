<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Introdução à POO com PHP </title>
 <link rel="stylesheet" href="exerc1.css">
</head>

 <body>
  <h1> Fundamentos do PHP com POO - exemplo 2 </h1>

  <?php 
   require "exerc2.inc.php";

  $objCurso1 = new Curso("Desenvolvimento de Sisteams", 4);
  $objCurso2 = new Curso("Enfermagem", 2);

  //Utilizar os métodos que recuperam o nome de cda curso e sua classificação

  $class1 = $objCurso1->classificarCurso();
  $class2 = $objCurso2->classificarCurso();

  $nome1 = $objCurso1->mostrarNome();
  $nome2 = $objCurso2->mostrarNome();

  echo "<p> Nome do 1° Curso : $nome1 </p>
          Duração do 1°Curso : $class1 </p> <br>
          Nome do 2° Curso : $nome2 </p> 
          Duração do 2° Curso :  </p>";


 

  ?>
 </body>
 </html>