<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Livraria </title>
</head>
<body>

 <h1> LIVRARIA ASBDAUDAUDASIA </h1>

 <form action="index.php" method="post">
   <fieldset>
      <legend> Cadastro de livro </legend>

      <label> ISBN: </label>
      <input type="text" name="isbn"> <br>
      <label> Titulo: </label>
      <input type="text" name="titulo"> <br>
      <label> Preço: </label>
      <input type="number" name="preco" min="0" step="0.01"> <br> <br>

      <button name="cadastrar" type="submit"> CADASTRAR LIVRO </button>
   </fieldset>
      
   <fieldset>
     <legend> Pesquisa Por Preço </legend>
     <label> Pesquise por preço base: </label>
     <input type="number" name="pesquisaPreco">
     <button name="pesquisa"> ° </button>
   </fieldset>
 </form>
 
<?php

require "banco.inc.php";
require "livros.inc.php";

$banco = new BancoDeDados("localhost", "root", "", "CTDS", "livrosTestes");

$conexao = $banco->criarConexao();

$banco->criarBanco($conexao);

$banco->abrirBanco($conexao);

$banco->definirCharset($conexao);

$banco->criarTabela($conexao);

$livros = new livros();

if(isset($_POST['cadastrar']))
 {
  $livros->recebeDados($conexao);
  $livros->cadastrar($conexao, $banco->nomeTabela);
 }

if(isset($_POST['pesquisa'])) 
 {
  $livros->precoBase($conexao, $banco->nomeTabela, $_POST['pesquisaPreco']);
 }
$banco->desconectar($conexao);

?>

</body>
</html>