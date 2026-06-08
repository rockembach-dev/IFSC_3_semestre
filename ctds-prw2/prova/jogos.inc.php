<?php

class jogos
{
 public $nome;
 public $preco;
 public $genero;

 function recebeDados($conexao)
 {
  $this->nome = trim($conexao->escape_string($_POST['nome'])); 
  $this->preco = trim($conexao->escape_string($_POST['preco'])); 
  $this->genero = trim($conexao->escape_string($_POST['generos'])); 
 }

 function cadastrar($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(nome, preco, genero) VALUES(
                       '$this->nome',
                        $this->preco,
                       '$this->genero')";

  if($conexao->query($sql))
   {
    echo "<p> Jogo Cadastrado com sucesso!!";
   }
   else
   {
    $conexao->error;
    echo "<p> Não foi possivel cadastrar o jogo!";
   }                     
 }

 function mediaAventura($conexao, $nomeTabela)
 {
  $sql = "SELECT AVG(preco) AS media_aventura FROM $nomeTabela WHERE genero = 'aventura'";

  $resultado = $conexao->query($sql);

  if($resultado)
   {
   $resultadoBusca = $resultado->fetch_array();

    if($resultadoBusca[0] !== null)
     {
      echo "<p> A média de preços dos jogos de aventura é: R$ ".number_format($resultadoBusca[0], 2, ',', '.'). "</p>";
     }
     else
      {
       echo "<p> Nenhum Jogo de Aventura cadastrado até o momento! </p>"; 
      }
   }
   else
    {
     $conexao->error;
     echo "<p> Erro ao buscar média de preços";
    }
 }

 function alterarPreco($conexao, $nomeTabela)
 {
  $alterarPreco = trim($conexao->escape_string($_POST['alterarPreco']));
  $jogoBuscado = trim($conexao->escape_string($_POST['jogoBuscado']));

  $sql = "UPDATE $nomeTabela SET preco = '$alterarPreco' WHERE nome = '$jogoBuscado';";

  $conexao->query($sql);

  if($conexao->affected_rows == 0)
   {
    die("<p> Erro ao alterar Preço do jogo! </p>");
   }
   else
    {
     echo "<p> O Jogo $jogoBuscado, teve seu preço alterado para: $alterarPreco";
    }
 }

 function listarTudo($conexao, $nomeDaTabela)
  {
    echo "<table>
           <caption> Jogos Cadastrados </caption> 
           <tr> 
             <th> ID </th>
             <th> Jogo </th>
             <th> Preço: </th> 
             <th> Gênero </th>
           </tr>";

    $sql = "SELECT * FROM $nomeDaTabela";

    $resultado = $conexao->query($sql) or die ($conexao->error);

    while($vetorRegistro = $resultado->fetch_array())
      {
        $id                  = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
        $nome                = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
        $preco           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
        $genero               = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");

        echo "<tr> 
               <td> $id </td> 
               <td> $nome </td>
               <td> R$$preco </td>
               <td> $genero </td>  
             </tr>";
      }

  }

}

?>