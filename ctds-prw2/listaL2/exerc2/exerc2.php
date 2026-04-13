<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title> Fundamentos de Banco de Dados com PHP </title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <h1> PHP + MySQL - exercício 2 </h1>

 <form action="exerc2.php" method="post">
  <fieldset>
   <legend> Dados cadastrais do produto </legend>

   <label> ID Produto: </label> <br>
   <input type="text" name="produto" autofocus maxlength="20"> <br> <br>

   <label> Preço Unitário: </label> <br>
   <input type="number" name="preco" min="0" step="0.01"> <br> <br>

   <label> Estoque: </label> <br>
   <input type="number" name="estoque" min="0" step="1"> <br> <br>

   <label> Classificação: </label> <br>
   <input type="radio" name="classificacao" value="Perecivel"> <label> Produto Perecível </label> <br> 
   <input type="radio" name="classificacao" value="naoPerecivel"> <label> Produto não Perecível </label> <br> <br>
   
   <label> Descrição detalhada do produto: </label> <br>
   <textarea name="descricao" maxlength="500"></textarea>

   <div>
     <label> Escolha uma das Operações a seguir: </label> <br>
      <select name="operacoes">
         <option value="1"> Cadastrar produto</option>
         <option value="2"> Tabular dados dos produtos perecíveis</option>
         <option value="3"> Mostrar Descrição (menor estoque) </option>
         <option value="4"> Calcular faturamento (não perecíveis) </option>
      </select> <br> <br>
      <button name="enviarOperacao"> Executar operação</button>
   </div>
  </fieldset>
 </form> 

 <?php
  //vamos incluir os arquivos contendo as includes com a definição de classes
  require "criar-classe-banco-de-dados.inc.php";
  require "criar-classe-produtos.inc.php";

  //vamos usar o método construtor para criar um objeto banco
  $objBanco = new BancoDeDados("localhost", "root", "", "CTDS", "produtos");
  //visualizando o conteúdo de $objBanco

  //var_dump($objBanco);

  $conexao = $objBanco->criarConexao();

  //criar o banco de dados CTDS
  $objBanco->criarBanco($conexao);

  //abrindo o banco de dados criado no servidor
  $objBanco->abrirBanco($conexao);

  //definindo a tabela UTF8 como tabela de símbolos-padrão do MySQL
  $objBanco->definirCharset($conexao);

  //criando a tabela na base de dados
  $objBanco->criarTabela($conexao); 




  //vamos criar o objeto aluno, a partir do construtor padrão da classe Alunos
  $objProduto = new Produtos();  

  //testando se o botão geral de execução de uma operação foi acionado no formulário
  if(isset($_POST['enviarOperacao']))
   {
    //vamos descobrir qual option do select foi acionado no formulário
    $operacao = $_POST["operacoes"];
    
    if($operacao == "1")
     {
       $objProduto->receberDadosForm($conexao);
       $objProduto->cadastrar($conexao, $objBanco->nomeDaTabela);
       echo "<p> Dados do produto cadastrados com sucesso na base de dados. </p>";
     }

    if($operacao == "2")
     {
      $objProduto->tabularDados($conexao, $objBanco->nomeDaTabela);
     }

    if($operacao == "3")
     {

     }

    if($operacao == "4")
     {

     }
    
   }

  if(isset($_POST["tabular"]))
   {
   $objAluno->tabularDados($conexao, $objBanco->nomeDaTabela);
   }

  if(isset($_POST["contar"]))
   {
   $objAluno->contarAprovados($conexao, $objBanco->nomeDaTabela);
   } 
   
  //encerrar a conexão do PHP com o MySQL
  $objBanco->desconectar($conexao);
 ?>
</body>
</html>