<?php
 class Produtos {
  public $produto;
  public $preco;
  public $estoque;
  public $classificacao;
  public $descricao;

  function receberDadosForm($conexao)
   {
   //CUIDADO COM ESTA OPERAÇÃO: se não codificada corretamente, há a possibilidade de execução do ataque conhecido como injeção de SQL
   $this->produto           = trim($conexao->escape_string($_POST["produto"]));
   $this->preco             = trim($conexao->escape_string($_POST["preco"]));
   $this->estoque           = trim($conexao->escape_string($_POST["estoque"]));
   $this->classificacao     = trim($conexao->escape_string($_POST["classificacao"]));
   $this->descricao         = trim($conexao->escape_string($_POST["descricao"]));
   }

  //método que, de verdade, grava os dados na tabela do banco de dados
  function cadastrar($conexao, $nomeDaTabela)
   {
   $sql = "INSERT $nomeDaTabela VALUES(
              '$this->produto',
               $this->preco,
               $this->estoque,
              '$this->classificacao',
              '$this->descricao')";

   $conexao->query($sql) or die($conexao->error);
   }

  //método para percorrer o banco de dados e tabular os dados de cada aluno na página web
  function tabularDados($conexao, $nomeDaTabela)
   {
   echo "<table>
          <caption> Dados tabulados dos produtos Perecíveis </caption>
          <tr>
           <th> ID </th>
           <th> Preço </th>
           <th> Estoque </th>
           <th> Classificação </th>
           <th> Descrição </th>
          </tr>";

   //Fazendo a tabulação dos dados apenas os produtos que são Perecíveis
   $sql = "SELECT * FROM $nomeDaTabela WHERE classificacao = 'Perecivel' ORDER BY estoque DESC";

   //recebemos o resultado do select e o colocamos na "matriz" $resultado
   $resultado = $conexao->query($sql) or die($conexao->error);

   while($vetorRegistro = $resultado->fetch_array())
    {
    //para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
    $produto = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
    $preco  = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
    $estoque  = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
    $classificacao  = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
    $descricao  = htmlentities($vetorRegistro[4], ENT_QUOTES, "UTF-8");

    echo "<tr>
           <td> $produto </td>
           <td> $preco </td>
           <td> $estoque </td>
           <td> $classificacao </td>
           <td> $descricao </td>
          </tr>";
    
    }
   echo "</table>";
   }

  //Mostrando a Descrição do produto com a menor quantidade em estoque 
  function descMenorQtd($conexao, $nomeDaTabela) 
   {
   $sql = "SELECT descricao FROM $nomeDaTabela WHERE estoque > ";
   $resultado = $conexao->query($sql) or die($conexao->error);

   $vetorRegistro = $resultado->fetch_array();

   $numeroAlunosAprovados = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");

   echo "<p> Número de alunos aprovados em PRWII e registrados no banco de dados = <span> $numeroAlunosAprovados </span> aluno(s) </p>";
   }
 }