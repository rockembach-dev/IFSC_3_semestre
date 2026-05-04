<?php
 class Medicos {
  public $crm;
  public $medico;

 
  function receberDadosForm($conexao)
   {
   $this->crm         = trim($conexao->escape_string($_POST["crm"]));
   $this->medico      = trim($conexao->escape_string($_POST["medico"]));
   }

  function cadastrar($conexao, $nomeDaTabela1)
   {
   $sql = "INSERT INTO $nomeDaTabela1 VALUES(
            '$this->crm',
            '$this->medico'
            )";

   $conexao->query($sql) or die($conexao->error);
   }

   //método que recebe o nome do médio a ser pesquisado e verifica no banco de dados, quantos pacientes são atendidos por este médico

  function contarPacientesAtendidos($conexao, $nomeDaTabela1, $nomeDaTabela2)
  {
    $medicoPesquisado = trim($conexao->escape_string($_POST["pesquisa-medico"]));

    //a seguir, criamor a parte da consulta SQL que busca o CRM do médico pesquisado na tabela médicos
    $sql = "SELECT crm FROM $nomeDaTabela1 WHERE medico = '$medicoPesquisado'";
    $resultado = $conexao->query($sql) or die ($conexao->error);

    //testar se a consulta encontrou o médico pesquisado e retornou seu CRM
    if($conexao->affected_rows == 0)
     {
      die("<p> O nome do médico pesquisado <span> $medicoPesquisado </span> não foi encontrado na base de dados. Tente novamente! </p>");
     } 
     else
      {
      //passando por aqui, o MySQL encontrou e devolveu ao PHP o CRM do médico pesquisado. Vamos recuperar este CRM
      //o método fetch_array sempre retorna um vetor!
      $vetorRegistro = $resultado->fetch_array();  
      $crmPesquisado = htmlentities($vetorRegistro[0], ENT_QUOTES, "UTF-8");

      //por fim, com o CRM do médico pesquisado, vamos até a tabela de pacientes, no banco de dados, e contamos quantos pacientes estão sendo atendidos por este CRM
      $sql = "SELECT COUNT(*) FROM $nomeDaTabela2 WHERE crm_medico = '$crmPesquisado'"; 

      $resultado = $conexao->query($sql) or die ($conexao->error);

      $vetorRegistro = $resultado->fetch_array();

      $qtdPacientes = htmlentities($vetorRegistro[0],ENT_QUOTES, "UTF-8");

      echo "<p> Neste Momento, há um total de <span> $qtdPacientes </span> Paciente(s) atendido(s) pelo médico <span> $medicoPesquisado </span> </p>";
       }
  }

 }