<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="https://www.w3schools.com/w3css/5/w3.css">
 <title> Empresa de Projetos </title>
</head>
<body class="w3-light-blue">


<div class="w3-container w3-padding-32">

 <div class="w3-light-grey w3-padding w3-round-large">
   <h1> Empresa de Projetos</h1>

   <form action="index.php" method="post" class="w3-container">

      <fieldset class="w3-border w3-padding w3-margin-bottom">

         <legend class="w3-large w3-text-blue"> Informações de Projeto </legend>

        <div class="w3-margin-bottom"> 
         <label> Nome do Projeto: </label>
         <input type="text" name="nome" class="w3-input w3-border"> <br> <br>

         <label> Orçamento: </label>
         <input type="number" name="orcamento" min="0" step="0.01" autofocus class="w3-input w3-border"> <br> <br>

         <label> Data de Inicio: </label>
         <input type="date" name="data-inicio" min="2010-01-01" class="w3-input w3-border"> <br> <br>

         <label> Horas para execução: </label>
         <input type="number" name="horas" class="w3-input w3-border"> <br> <br>
        </div> 
      </fieldset>

      
      <fieldset>
         <input type="radio" name="operacao" value="cadastrar" class="w3-radio"><label> Cadastrar informações </label> <br> <br>
         <input type="radio" name="operacao" value="listar" class="w3-radio"><label> Listar ID e orçamento </label> <br> <br>
         <input type="radio" name="operacao" value="mostrar" class="w3-radio"><label> Projetos com ínicio posterior a 01/01/2020 </label> <br> <br>
         <input type="radio" name="operacao" value="excluir" class="w3-radio"><label> Excluir registror (menor que 100horas e orçamento inferior a R$1000,00) </label> <br> <br>

      </fieldset>

     <button name="enviar" class="w3-button w3-blue w3-round w3-margin-top"> Enviar Operação </button>
  </form>

<?php

 require "banco.inc.php";
 require "projetos.inc.php";

 $objBanco = new BancoDeDados("localhost", "root", "", "CTDS", "projetos");

 $conexao = $objBanco->criarConexao();

 $objBanco->criarBanco($conexao);

 $objBanco->abrirBanco($conexao);

 $objBanco->definirCharset($conexao);

 $objBanco->criarTabela($conexao);

 $objProjetos = new projetos();

 if(isset($_POST["operacao"]))
  {
   if($_POST["operacao"] == "cadastrar")
    {
     $objProjetos->recebeDadosForm($conexao);
     $objProjetos->cadastrar($conexao, $objBanco->nomeDaTabela);
    echo "<p> Projeto Cadastrado com sucesso!!";
    }
   if($_POST["operacao"] == "listar")
    {
     $objProjetos->listarDados($conexao, $objBanco->nomeDaTabela);
    } 
   if($_POST["operacao"] == "mostrar") 
    {
     $objProjetos->numerosProjetos($conexao, $objBanco->nomeDaTabela);
    }
   if($_POST["operacao"] == "excluir") 
    {
     $objProjetos->excluir($conexao, $objBanco->nomeDaTabela);
    }
  }

 $objBanco->desconectar($conexao); 
?>
 
</body>
</html>