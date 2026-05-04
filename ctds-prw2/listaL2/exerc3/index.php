<!DOCTYPE html>
<html lang="pt-BR">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + MYSQL - Exercício 2 </h1>
 <fieldset>
  <legend> Supermercado GWM - Cadastro de produtos </legend>
  <form action="index.php" method="post">

   <label for="id"> ID:</label>
   <input type="text" id="id" name="id" autofocus><br>

   <label for="preco">Preço (un):</label>
   <input type="number" id="preco" name="preco" min="0" step="0.01"><br>

   <label for="estoque"> Estoque:</label>
   <input type="number" id="estoque" name="estoque" min="0"><br>

   <button type="submit" name="cadastrar"> Cadastrar produto </button>

  </form>
 </fieldset>

 <?php

 require 'bda.inc.php';
 require 'Produto.inc.php';

 // Vamos usar o método construtor para criar um objeto banco
 $banco = new BancoDeDados('localhost', 'root', '', 'db_escola', 'produtos_estoque');

 // Visualizando o conteúdo do objeto banco
 ##var_dump($banco);

 $conexao = $banco->conectar();

 // Criar o banco de dados alunos
 $banco->criarBanco($conexao);

 // Método para abrir o banco de dados
 $banco->abrirBanco($conexao);

 // Método para definir o charset do banco de dados
 $banco->definirCharset($conexao);

 // Método para criar a tabela alunos
 $banco->criarTabela($conexao);
 // Vamos criar o objeto aluno, a partir do construtor padrão da classe Aluno.
 $produto = new Produto();

 if (isset($_POST["cadastrar"])) {
  $produto->receberDadosForm($conexao);
  $produto->create($conexao, $banco->nomeTabela);
  echo "<p> Produto cadastrado com sucesso </p>";
 }

 ?>

 <!-- Modulo de atualização de porduto -->
 <fieldset>
  <legend> Supermercado GWM - Alteração de produto </legend>
  <form action="index.php" method="post">

   <label for="id"> ID do produto pesquisado:</label>
   <input type="text" id="id" name="id-pesquisado"><br>

   <label for="preco">Preço (un) para atualização:</label>
   <input type="number" id="preco" name="preco-atualizado" min="0" step="0.01"><br>

   <button type="submit" name="atualizar"> Atualizar produto </button>

  </form>
 </fieldset>

 <!-- Modulo de exclusão de porduto -->
 <fieldset>
  <legend> Supermercado GWM - Exclusão de produto </legend>
  <form action="index.php" method="post">

   <label for="id"> Estoque para exclusão: </label><br>
   <input type="number" id="id" name="estoque-minimo" min="0"><br>

   <button type="submit" name="excluir"> Excluir</button>

  </form>
 </fieldset>

 <?php


 if (isset($_POST["atualizar"])) {
  $produto->alterarDados($conexao, $banco->nomeTabela);
 }

 if (isset($_POST["excluir"])) {
  $produto->deleteEstoque($conexao, $banco->nomeTabela);
 }
 ?>
<form action="index.php" method="post">
 <button name="tabular" type="submit"> Mostrar dados</button>
</form>
 <?php

 if(isset($_POST["tabular"])){
  $produto->tabularDados($conexao, $banco->nomeTabela);
 }

 
 //Encerrar a conexão do PHP com o MySQL
 $banco->fecharConexao($conexao);

 ?>
</body>

</html>