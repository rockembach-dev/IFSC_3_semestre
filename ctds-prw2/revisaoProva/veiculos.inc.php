<?php

class veiculos
{
 public $placa;
 public $modelo;
 public $marca;
 public $cor;

 function recebeDados($conexao)
 {
  $this->placa = trim($conexao->escape_string($_POST['placa']));
  $this->modelo = trim($conexao->escape_string($_POST['modelo']));
  $this->marca = trim($conexao->escape_string($_POST['marca']));
  $this->cor = trim($conexao->escape_string($_POST['cor']));
 }

 function cadastrar($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela(placa, modelo, marca, cor) VALUES (
                       '$this->placa',
                       '$this->marca',    
                       '$this->modelo',
                       '$this->cor')";

 if($conexao->query($sql))
  {
   echo "<p> Veiculo Cadastrado com sucesso";
  }
  else
   {
    $conexao->error;
    echo "<p> Erro ao cadastrar veiculo! Tente Novamente";
   }                    
 }

 function listarTodos($conexao, $nomeTabela)
 {
  echo "<table class='w3-table-all w3-hoverable w3-card-4'>
           <caption class='w3-text-blue w3-large'> Projetos Cadastrados </caption> 
           <tr> 
             <th> Placa </th>
             <th> Modelo </th>
             <th> Marca </th> 
             <th> Cor </th>
           </tr>";

    $sql = "SELECT * FROM $nomeTabela";

    $resultado = $conexao->query($sql) or die ($conexao->error);

    while($vetorRegistro = $resultado->fetch_array())
      {
        $placa                  = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
        $modelo                = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
        $marca           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
        $cor         = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");


        echo "<tr> 
               <td> $placa </td> 
               <td> $modelo </td>
               <td> $marca </td>
               <td> $cor </td>  
             </tr>";
      }
      echo "</table>";
 }

 function listarPorMarca($conexao, $nomeTabela, $marcaDigitada)
 {
  echo "<table>
           <caption> Filtro Por Marca </caption> 
             <tr> 
               <th> Placa </th> 
               <th> Modelo </th> 
               <th> Marca </th> 
               <th> Cor </th> 
             </tr>";

  $sql = "SELECT * FROM $nomeTabela WHERE marca = '$marcaDigitada'";     
  
  $resultado = $conexao->query($sql) or die ($conexao->error);

  while($vetorRegistro = $resultado->fetch_array())
      {
        $placa                  = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
        $modelo                = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
        $marca           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
        $cor         = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");


        echo "<tr> 
               <td> $placa </td> 
               <td> $modelo </td>
               <td> $marca </td>
               <td> $cor </td>  
             </tr>";
      }
      echo "</table>";
 }
}

?>