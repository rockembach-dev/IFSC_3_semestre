<?php

 class projetos
 {
  public $nome;
  public $orcamento;
  public $data_inicio;
  public $horas;
  
  function recebeDadosForm($conexao)
  {
   $this->nome            = trim($conexao->escape_string($_POST['nome']));
   $this->orcamento       = trim($conexao->escape_string($_POST['orcamento']));
   $this->data_inicio     = trim($conexao->escape_string($_POST['data-inicio']));
   $this->horas           = trim($conexao->escape_string($_POST['horas']));
  }

  function cadastrar($conexao, $nomeDaTabela)
  {
   $sql = "INSERT INTO $nomeDaTabela(nome,orcamento, data_inicio, horas) VALUES (  
            '$this->nome', 
             $this->orcamento,
            '$this->data_inicio',
             $this->horas)";
          
  $conexao->query($sql) or die ($conexao->error); 
  
  }

  function listarDados($conexao, $nomeDaTabela)
  {
   echo "<table class='w3-table-all w3-hoverable w3-card-4'>
           <caption class='w3-text-blue w3-large'> Projetos Cadastrados </caption> 
           <tr> 
             <th> Projeto </th>
             <th> ID </th>
             <th> Orçamento </th> 
             <th> Data de Início </th>
           </tr>";

   $sql = "SELECT nome,id, orcamento, data_inicio FROM $nomeDaTabela ";

   $resultado = $conexao->query($sql) or die ($conexao->error);

    while($vetorRegistro = $resultado->fetch_array())
    {
     $nome                = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
     $id                  = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
     $orcamento           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
     $data_inicio         = date('d/m/Y', strtotime($vetorRegistro[3]));

     echo "<tr> 
             <td> $nome </td>
             <td> $id </td> 
             <td> R$$orcamento </td>
             <td> $data_inicio </td>
           </tr>";
    }
    echo "</table>";
  }

  function listarTudo($conexao, $nomeDaTabela)
  {
    echo "<table class='w3-table-all w3-hoverable w3-card-4'>
           <caption class='w3-text-blue w3-large'> Projetos Cadastrados </caption> 
           <tr> 
             <th> ID </th>
             <th> Projeto </th>
             <th> Orçamento </th> 
             <th> Data de Início </th>
             <th> Horas para Execução </th>
           </tr>";

    $sql = "SELECT * FROM $nomeDaTabela";

    $resultado = $conexao->query($sql) or die ($conexao->error);

    while($vetorRegistro = $resultado->fetch_array())
      {
        $id                  = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
        $nome                = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
        $orcamento           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
        $data_inicio         = date('d/m/Y', strtotime($vetorRegistro[3]));
        $horas               = htmlentities($vetorRegistro[4], ENT_QUOTES, "UTF-8");

        echo "<tr> 
               <td> $id </td> 
               <td> $nome </td>
               <td> R$$orcamento </td>
               <td> $data_inicio </td>
               <td> {$horas}h </td>  
             </tr>";
      }

  }

  function numerosProjetos($conexao, $nomeDaTabela)
  {
   $sql = "SELECT COUNT(*) as total FROM $nomeDaTabela WHERE data_inicio > '2020-01-01'";

   $resultado = $conexao->query($sql) or die ($conexao->error);
   $linha = $resultado->fetch_array();
   $total = $linha['total'];

   if($total > 0 )
    {
     echo "<p> Número de Projetos com ínicio posterior a 01/01/2020: <strong> $total </strong></p>";


     echo "<table class='w3-table-all w3-hoverable w3-card-4'>
           <caption class='w3-text-blue w3-large'> Projetos com início posterior a 01/01/2020 </caption> 
           <tr> 
             <th> Projeto </th>
             <th> ID </th>
             <th> Orçamento </th> 
             <th> Data de Início </th>
           </tr>";

     $sql = "SELECT nome, id, orcamento, data_inicio FROM $nomeDaTabela WHERE data_inicio > '2020-01-01'";
     
     $resultado = $conexao->query($sql) or die ($conexao->error);

    while($vetorRegistro = $resultado->fetch_array())
    {
     $nome            =htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
     $id               = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
     $orcamento           = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
     $data_inicio      = date('d/m/Y', strtotime($vetorRegistro[3]));

     echo "<tr> 
             <td> $nome </td>
             <td> $id </td> 
             <td> R$$orcamento </td>
             <td> $data_inicio </td>
           </tr>";
    }
    echo "</table>";
    }
   else
    {
     echo "<p> Nenhum projeto com data de início posterior a 01/01/2020.</p>";
    } 
  }

  function excluir($conexao, $nomeDaTabela)
  {
   $sql = "DELETE FROM $nomeDaTabela WHERE horas < 100 and orcamento < 1000";

   $conexao->query($sql) or die ($conexao->error);

   if($conexao->affected_rows > 0 )
    {
     echo "<p> Registro deletado com sucesso!!.";
    }
   else
    {
     echo "<p> Não foi possivel deletar o registro. Tente Novamente.";
    } 
  }
 }
?>