<?php

class livros
{
 public $isbn;
 public $titulo;
 public $preco;

 function recebeDados($conexao)
 {
   $this->isbn = trim($conexao->escape_string($_POST["isbn"]));
   $this->titulo = trim($conexao->escape_string($_POST["titulo"]));
   $this->preco = str_replace(",", ".", $_POST["preco"]);
   $this->preco = trim($conexao->escape_string($_POST["preco"])); 
 }

 function cadastrar($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(isbn, titulo, preco)VALUES (
                      '$this->isbn',
                      '$this->titulo',
                       $this->preco)";
                      
  $conexao->query($sql) OR die ($conexao->error);                    
 }

 function precoBase($conexao, $nomeTabela, $pesquisaPreco)
 {
  echo "<table>
           <caption> Livros Cadastrados </caption> 
           <tr> 
             <th> ISBN </th>
             <th> Título </th> 
             <th> Preço </th>
           </tr>";

  $sql = "SELECT * FROM $nomeTabela WHERE preco < '$pesquisaPreco';";
 
  $resultado = $conexao->query($sql) or die($conexao->error);

   while($vetorRegistro = $resultado->fetch_array())
    {
     $isbn             = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
     $titulo           = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
     $preco            = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");

     echo "<tr> 
             <td> $isbn </td> 
             <td> $titulo </td>
             <td> $preco </td>
           </tr>";
    }
    echo "</table>";
 }

}
?>