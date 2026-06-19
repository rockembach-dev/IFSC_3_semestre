<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Concessionária RCK </title>
</head>
<body>

  <h1> Concessionária RCK </h1>

  <form action="index.php" method="post">
    <fieldset>
        <legend> Cadastro de Automovel </legend>

        <label> Placa: </label>
        <input type="text" name="placa">
        <label> Modelo: </label>
        <input type="text" name="modelo">
        <label> Marca: </label>
        <input type="text" name="marca">
        <label> Cor: </label>
        <input type="text" name="cor">
    </fieldset>

    <button name="cadastrar"> Cadastrar Automóvel </button>

    <fieldset>
        <legend> Funções Disponiveis </legend>
        <input type="radio" name="funcao" value="todos"><label> Ver Todos os Carros Cadastrados </label>
        <input type="radio" name="funcao" value="marca"><label> Filtrar por marca digitada </label> <input type="text" name="marcaDigitada">
        <button name="funcoes"> 000000 </button>
    </fieldset>
  </form> 

  
 <?php
 
  require "banco.inc.php";
  require "veiculos.inc.php";

  $Banco = new bancoDeDados("localhost", "root", "", "TESTES", "concessionaria");

  $conexao = $Banco->criarConexao();

  $Banco->criarBanco($conexao);

  $Banco->abrirBanco($conexao);

  $Banco->definirCharset($conexao);

  $Banco->criarTabela($conexao);

  $veiculos = new veiculos();

  if(isset($_POST["cadastrar"]))
    {
      $veiculos->recebeDados($conexao);
      $veiculos->cadastrar($conexao, $Banco->nomeTabela);
    }

  
  if(isset($_POST["funcoes"]))
    {  
      if($_POST["funcao"] == "todos")
        {
          $veiculos -> listarTodos($conexao, $Banco->nomeTabela);
        }  
      if($_POST["funcao"] == "marca")
        {
          $veiculos -> listarPorMarca($conexao, $Banco->nomeTabela, $_POST['$marcaDigitada']);
        }  
    } 
  $Banco->desconectar($conexao);
 ?>
</body>
</html>