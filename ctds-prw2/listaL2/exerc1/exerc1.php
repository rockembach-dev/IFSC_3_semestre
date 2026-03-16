<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + SQL - exercício 1 </h1>

  <form action="exerc1.php" method="post">
    <fieldset>
      <legend> Dados Cadastrais do aluno </legend>
      
      <label> Aluno: </label> <br>
      <input type="text" name="aluno" placeholder="Informe o Nome do Aluno" autofocus> <br> <br>

      <label> Matrícula: </label> <br>
      <input type="text" name="matricula" placeholder="Informe a matrícula do Aluno"> <br> <br>

      <label> Média final de PWRII: </label> <br>
      <input type="number" name="media" placeholder="Informe a média final do aluno" min="0" max="10" step="0.1"> <br> <br>

      <div>
       <button name="cadastrar"> Cadastrar Aluno </button>
       <button name="tabular"> Mostrar Dados </button>
       <button name="contar"> Mostrar Aprovados </button>
      </div>
    </fieldset>
  </form>
   <?php
   //vamos incluir os arquivos contendo as includes com a definição de classes
   require "criar-banco.inc.php";
   require "alunos.inc.php";

   //Vamos usar o método construtor para criar um objeto banco
   $objBanco = new BancoDeDados("localhost", "root", "", "CTDS", "alunos");

   //visualizando o conteúdo de $objBanco
   //var_dump($objBanco);
   $conexao = $objBanco->criarConexao();
   echo"<p> Conexão do PHP com o MySQL efetuada com sucesso! </p>";

   //Vamos fazer o PHP descobrir qual botão do formulário foi clicado
    if(isset($_POST["cadastrar"]))
     {

     }

     if(isset($_POST["tabular"]))
      {

      }

      if(isset($_POST["contar"]))
       {

       }
   ?>
</body>
</html>