<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Livraria Virtual </title>
</head>
<body> 
  <h1> Livraria do Rock </h1>

   <form action="index.php" method="post">
     <fieldset>
      <legend> Cadastrar novo livro</legend>
       <label> ISBN: </label>
       <input type="text" name="isbn" placeholder="Preencha o ISBN do livro" autofocus>
       <label> Título: </label>
       <input type="text" name="titulo">
       <label> Autor: </label>
       <input type="text" name="autor">
       <label> Preço: </label>
       <input type="number" name="preco">
       <label> Data de Lançamento: </label>
       <input type="date" name="dataLanc">
     </fieldset>

     <div>
       <label> Selecione uma operação </label>
       <input type="radio" name="operacao" value="alteracao"> <label> Alteração da data de lançamento </label> <br>
       <input type="radio" name="operacao" value="exclusao"> <label> Excluir obras lançadas há mais de 2 anos </label> <br>
       <input type="radio" name="operacao" value="listar"> <label> Listar dados de todos livros </label><br>
       <button> Execultar operação </button>
     </div>
   </form>

<?php
  require "banco.inc.php";
  require "livros.inc.php";
  
  $objBanco = new BancodeDados("localhost", "root", "", "CTDS", "livros");
   
</body>
</html>