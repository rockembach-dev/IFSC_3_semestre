<?php

 Class Livros {
  public $isbn;
  public $titulo;
  public $autor;
  public $preco;
  public $data_lancamento;

  function recebeDadosForm($conexao)
  {
   $this->isbn             = trim($conexao->escape_string($_POST["isbn"]));
   $this->titulo           = trim($conexao->escape_string($_POST["titulo"]));
   $this->autor            = trim($conexao->escape_string($_POST["autor"]));
   $this->preco            = str_replace(",", ".", $_POST["preco"]);
   $this->preco            = trim($conexao->escape_string($_POST["preco"]));
   $this->data_lancamento  = trim($conexao->escape_string($_POST["data-lancamento"]));
  }

  function cadastrar($conexao, $nomeDaTabela)
  {
   $sql = "INSERT INTO $nomeDaTabela VALUES(
             '$this->isbn',
             '$this->titulo',
             '$this->autor',
              $this->preco,
             '$this->data_lancamento')";

   $conexao->query($sql) or die ($conexao->error);          
  }

  function alterarData($conexao, $nomeDaTabela)
  {
   $isbnPesquisado = trim($conexao->escape_string($_POST['isbn-pesquisado']));
   $dataAlterada = trim($conexao->escape_string($_POST['data-alterada']));

   $sql = "UPDATE $nomeDaTabela SET data_lancamento = '$dataAlterada' WHERE isbn = '$isbnPesquisado';";
   $conexao->query($sql) or die($conexao->error);

   if($conexao->affected_rows > 0 ){
    echo "<p> Data do Livro alterada com sucesso!! </p>";
   } 
   else {
    echo "<p> Não foi possivel alterar a data. Verifique se o ISBN pesquisado existe";
   }
  }

  function excluirAntigas($conexao, $nomeDaTabela)
  {
   $livroDeletado = trim($conexao->escape_string($_POST["isbn-pesquisado"]));

   $sql = "DELETE FROM $nomeDaTabela WHERE isbn = '$livroDeletado' AND data_lancamento < '2024-01-01'";
   $conexao->query($sql) or die ($conexao->error);

   if($conexao->affected_rows == 0)
    {
     die("<p> O livro em questão não pode ser excluido pois foi lançado depois do ano de 2024, Por Favor tente novamento com outro livro </p>");
    }
     else{
       echo "<p> O livro de isbn: $livroDeletado tem mais de 2 anos de lançamento e foi deletado";
     }
  }

  function tabularLivros($conexao, $nomeDaTabela)
  {
   echo "<table class='w3-table-all w3-hoverable w3-card-4'>
           <caption class='w3-text-blue w3-large'> Livros Cadastrados </caption> 
           <tr> 
             <th> ISBN </th>
             <th> Título </th> 
             <th> Autor </th>
             <th> Preço de Venda </th> 
             <th> Data de Lançamento </th> 
           </tr>";

   $sql = "SELECT * FROM $nomeDaTabela ";
   
   $resultado = $conexao->query($sql) or die($conexao->error);

   while($vetorRegistro = $resultado->fetch_array())
    {
     $isbn             = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
     $titulo           = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
     $autor            = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
     $preco            = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
     $data_lancamento  = htmlentities($vetorRegistro[4], ENT_QUOTES, "UTF-8");

     echo "<tr> 
             <td> $isbn </td> 
             <td> $titulo </td>
             <td> $autor </td>
             <td> $preco </td>
             <td> $data_lancamento </td>
           </tr>";
    }
    echo "</table>";
  }
 }