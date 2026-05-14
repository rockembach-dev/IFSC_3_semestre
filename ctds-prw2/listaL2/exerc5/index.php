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
       <input type="date" name="data-lancamento"> <br> <br>


         <label> Forneça o isbn de um livro para ser excluido </label>
        <input type="text" name="deletar-livro">
     </fieldset>

     <div>
       <label> Selecione uma operação </label>
       <input type="radio" name="operacao" value="alterar"> <label> Alteração da data de lançamento </label> <br>
       <input type="radio" name="operacao" value="excluir"> <label> Excluir obras lançadas há mais de 2 anos </label> <br>
       <input type="radio" name="operacao" value="listar"> <label> Listar dados de todos livros </label><br>
       <input type="radio" name="operacao" value="cadastrar"> <label> Cadastrar livro </label><br>
       <button type="submit" name="enviar"> Enviar operação </button> <br> <br>
     </div>
   </form>

<?php
  require "banco.inc.php";
  require "livros.inc.php";
  
  $objBanco = new BancodeDados("localhost", "root", "", "CTDS", "livros");

  $conexao = $objBanco->criarConexao();

  $objBanco->criarBanco($conexao);

  $objBanco->abrirBanco($conexao);

  $objBanco->definirCharset($conexao);

  $objBanco->criarTabela($conexao);

  $objLivro = new Livros();

  
   if(isset($_POST["operacao"]))
    { 
      if($_POST["operacao"]== "cadastrar")
        {
        $objLivro->recebeDadosForm($conexao);
        $objLivro->cadastrar($conexao, $objBanco->nomeDaTabela);
        echo "<p> Dados dos livros cadastrados </p>";
        }
      if($_POST["operacao"] == "listar")
        {
          $objLivro->tabularLivros($conexao, $objBanco->nomeDaTabela);
        } 
      if($_POST["operacao"] == "excluir")
        {
          $objLivro->excluirAntigas($conexao, $objBanco->nomeDaTabela);
        }   
      if($_POST["operacao"] == "alterar")
        {
          $objLivro->alterarData($conexao, $objBanco->nomeDaTabela);
        }
    } 

   $objBanco->desconectar($conexao);
?>    
</body>
</html>