<?php
 class Pacientes {
 public $paciente;
 public $crmMedico;
 public $data; 
 
  function receberDadosForm($conexao)
   {
   $this->paciente       = trim($conexao->escape_string($_POST["paciente"]));
   $this->crmMedico      = trim($conexao->escape_string($_POST["crm-medico"]));
   $this->data           = trim($conexao->escape_string($_POST["data"]));
   }

  function cadastrar($conexao, $nomeDaTabela2)
   {
   $sql = "INSERT $nomeDaTabela2 VALUES(
              null,
            '$this->paciente',
            '$this->data',
            '$this->crmMedico')";
            

   $conexao->query($sql) or die($conexao->error);
   }

   function relatorio($conexao, $nomeDaTabela2)
   {
    $dataPesquisada = trim($conexao->escape_string($_POST["pesquisa-data"]));

    //vamos criar a consulta que seleciona todos os pacientes com a data de internação pesquisada
    $sql = "SELECT * FROM $nomeDaTabela2 WHERE data_internacao = '$dataPesquisada'";

    $resultado = $conexao->query($sql) or die($conexao->error);

    $vetorData = explode("-", $dataPesquisada);
    $dataFormatada = $vetorData[2]."/".$vetorData[1]."/".$vetorData[0];

    if($conexao->affected_rows == 0)
     {
      die("<p> Nenhum paciente foi internado na data pesquisada : <span> $dataFormatada </span>. Tente Novamente! </p>");
     }
     else
      {
       //Aqui, montamos toda a estrutura da tabela para exibir as informações dos clientes que deram entrada, na clínica, na data pesquisada
       echo "<table>
          <caption> Relatório dos pacientes com internação na data: $dataFormatada. </caption>
          <tr>
           <th> ID: </th>
           <th> Paciente: </th>
           <th> CRM do Médico </th>
          </tr>";

       while($vetorRegistro = $resultado->fetch_array())
       {
       //para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
       $id        = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");
       $paciente  = htmlentities($vetorRegistro[1], ENT_QUOTES, "UTF-8");
       $data      = htmlentities($vetorRegistro[2], ENT_QUOTES, "UTF-8");
       $crm       = htmlentities($vetorRegistro[3], ENT_QUOTES, "UTF-8");
       
       $vetorData = explode("-", $data);
       $dataFormatada = $vetorData[2]."/".$vetorData[1]."/".$vetorData[0];


       echo "<tr>
            <td> $id </td>
            <td> $paciente </td>
            <td> $dataFormatada </td>
            <td> $crm </td>
            </tr>";
    
       }
   echo "</table>";
      }
   }
 }