<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Loja de Jogos </title>
 <link rel="stylesheet" href="style.css">
</head>
<body>

 <h1> Loja de JOGOS </h1>
 
 <form action="index.php" method="post">
   <fieldset>
     <legend> Cadastro de jogos </legend>

     <label> Nome do Jogo: </label>
     <input type="text" name="nome" autofocus> <br>

     <label> Preço: </label>
     <input type="number" name="preco" min="0" step="0.01" max="550"> <br> <br>

     <caption> GENERO DO JOGO </caption> <br>
     <input type="radio" name="generos" value="rpg"><label> RPG </label> 
     <input type="radio" name="generos" value="acao"><label> AÇÃO </label> 
     <input type="radio" name="generos" value="aventura"><label> AVENTURA </label>  <br> <br>

     <button name="cadastrar"> Cadastrar Jogo </button>
   </fieldset>

   <fieldset>
      <legend> Funções da loja </legend>

      <input type="radio" name="funcoes" value="listarTudo"><label> Mostrar Jogos Cadastrados </label> <br>
      
      <input type="radio" name="funcoes" value="mediaAventura"><label> Mostrar Média de Preço (AVENTURA) </label> <br> 

      <input type="radio" name="funcoes" value="alteraPrecoJogo"><label> Alterar Preço de jogo</label> <br> <br>
      <label> Qual Jogo você deseja alterar o preço? </label>
      <input type="text" name="jogoBuscado"> <br> <br>
      <label> Digite o Novo Preço aqui! </label>
      <input type="number" name="alterarPreco" min="0" step="0.01" max="550"> <br> <br>

      <button name="enviarFuncao"> Enviar Função </button>
   </fieldset>
 </form>

<?php

require "banco.inc.php";
require "jogos.inc.php";

$banco = new BancoDeDados("localhost", "root", "", "CTDS", "LojaJogos");

$conexao = $banco->criarConexao();

$banco->criarBanco($conexao);

$banco->abrirBanco($conexao);

$banco->definirCharset($conexao);

$banco->criarTabela($conexao);

$jogos = new jogos();

if(isset($_POST["cadastrar"]))
 {
  if(!isset($_POST['generos']) || empty($_POST['generos']))
   {
    echo "<p> Por favor, selecione um gênero! </p> ";
   }
   else{
    $jogos->recebeDados($conexao);
    $jogos->cadastrar($conexao,$banco->nomeTabela);
   }
 }

 if(isset($_POST["enviarFuncao"]))
  {
   if(!isset($_POST["funcoes"]) || empty($_POST["funcoes"]))
    {
     echo "<p> Por favor, selecione uma função! </p>";
    }
    else
    { 
     if($_POST["funcoes"] == "listarTudo")
      {
       $jogos->listarTudo($conexao, $banco->nomeTabela);
      }
     if($_POST["funcoes"] == "mediaAventura")
      {
       $jogos->mediaAventura($conexao, $banco->nomeTabela);
      }
      if($_POST["funcoes"] == "alteraPrecoJogo")
       {
        $jogos->alterarPreco($conexao, $banco->nomeTabela);
       }
    } 
  }

$banco->desconectar($conexao);

?>
</body>
</html>