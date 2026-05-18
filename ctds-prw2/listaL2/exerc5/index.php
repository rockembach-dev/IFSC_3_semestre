<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <title> Livraria Virtual </title>
</head>

<body class="w3-light-grey"> 

<div class="w3-container w3-padding-32">

  <div class="w3-white w3-padding w3-round-large">
    <h1> Livraria do Rock </h1>

    <form action="index.php" method="post" class="w3-container">

      <fieldset class="w3-border w3-padding w3-margin-bottom">

        <legend class="w3-large w3-text-blue"> Cadastrar novo livro</legend>

       <div class="w3-margin-bottom"> 
        <label> ISBN: </label>
        <input type="text" name="isbn" placeholder="Preencha o ISBN do livro" autofocus class="w3-input w3-border w3-round">

        <label> Título: </label>
        <input type="text" name="titulo" class="w3-input w3-border w3-round">

        <label> Autor: </label>
        <input type="text" name="autor" class="w3-input w3-border w3-round">

        <label> Preço: </label>
        <input type="number" name="preco" step="0.01" class="w3-input w3-border w3-round">

        <label> Data de Lançamento: </label>
        <input type="date" name="data-lancamento" class="w3-input w3-border w3-round"> <br> <br>


          <label> Forneça o isbn para Alterar a data ou Excluir livro </label>
          <input type="text" name="isbn-pesquisado" class="w3-input w3-border w3-round"> <br>

          <label> Forneça a nova data de lançamento </label>
          <input type="date" name="data-alterada" class="w3-input w3-border w3-round">
       </div>  
      </fieldset>

      <div class="w3-panel w3-pale-blue w3-leftbar w3-border-blue">
        <h3> Selecione uma operação </h3>
          <div class="w3-margin-bottom">
            <input type="radio" name="operacao" value="alterar" class="w3-radio"> <label> Alteração da data de lançamento </label> <br>

            <input type="radio" name="operacao" value="excluir" class="w3-radio"> <label> Excluir obras lançadas há mais de 2 anos </label> <br>

            <input type="radio" name="operacao" value="listar" class="w3-radio"> <label> Listar dados de todos livros </label><br>

            <input type="radio" name="operacao" value="cadastrar" class="w3-radio"> <label> Cadastrar livro </label> <br> 

            <button type="submit" name="enviar" class="w3-button w3-blue w3-round w3-margin-top"> Enviar operação </button> <br> <br>
      </div>
  </form>

<?php
  require "banco.inc.php";
  require "livros.inc.php";
  
  $objBanco = new BancoDeDados("localhost", "root", "", "CTDS", "livros");

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
  </div>
</div> 
</body>
</html>