<?php
// Agora para finalizarmos a segunda parte da aplicação envolvendo banco de dados, vamos criar a classe Alunos. Esta classe conterá métodos e propriedades necessários ao PHP para representarmos no MySQL, cada aluno sendo cadastrado. Esta classe será responsavél por implementar cada operação solicitada no exercício.
class Produto
{
 public $id, $preco, $estoque, $classificacao, $descricao;

 // Vamos então implemenar o método que recebe os dados do formulário e os atribui as propriedades do objeto aluno.
 function receberDadosForm($conexao)
 {
  // CUIDADO COM ESTA OPERAÇÃO: se não condificada corretamente, há a possibilidade de execução do atacaque conhecido como injeção de SQL.
  $this->id            = trim($conexao->escape_string($_POST['id']));
  $this->preco         = trim($conexao->escape_string($_POST['preco']));
  $this->estoque       = trim($conexao->escape_string($_POST['estoque']));
 }

 function create($conexao, $nomeTabela)
 {
  $sql = "INSERT INTO $nomeTabela (id, preco, estoque) VALUES ($this->id, $this->preco, $this->estoque)";
  $conexao->query($sql) or die($conexao->error);
 }

 // Método para percorrer o banco de dados e tabular os dados de cada aluno na página web 
 function tabularDados($conexao, $nomeDaTabela)
 {
  echo "<table>
         <caption> Dados dos produtos cadastrados </caption>
         <tr>
          <th>ID</th>
          <th>Preço</th>
          <th>Estoque</th>
         </tr>";

  // Vamos criar uma estrutura que permita que o código em PHP percorra todo o conjunto de dados enviado pelo banco na consulta SELECT. Esta estrutura pode ser comparada a uma matriz e permite o PHP receba os dados de cada aluno e mostre-os no formato de tabela na página web.
  $sql = "SELECT * FROM $nomeDaTabela";

  // Recebemos o resultado do SELECT e o colocamos na "matriz" $resultado.
  $resultado = $conexao->query($sql) or die($conexao->error);

  while ($vetorRegistro = $resultado->fetch_array()) {
   // Para evitarmos o ataque do tipo XSS, usamos o comando de sanitização a seguir
   $id = htmlentities($vetorRegistro[0], ENT_QUOTES, 'UTF-8');
   $preco = htmlentities($vetorRegistro[1], ENT_QUOTES, 'UTF-8');
   $estoque = htmlentities($vetorRegistro[2], ENT_QUOTES, 'UTF-8');

   echo "<tr>
  <td>$id</td>
  <td>$preco</td>
  <td>$estoque</td>
  </tr>";
  }
  echo "</table>";
 }

 function alterarDados($conexao, $nomeTabela){
  $idPesquisado = trim($conexao->escape_string($_POST['id-pesquisado']));
  $novoPreco = trim($conexao->escape_string($_POST['preco-atualizado']));

  $sql = "UPDATE $nomeTabela SET preco = $novoPreco WHERE id = $idPesquisado;";
  $conexao->query($sql) or die($conexao->error);

  // Antes de mostrarmos uma mensagem ao usuario testamos se algum registro foi atualizado no banco de dados
  if($conexao->affected_rows > 0){
   echo "<p> Produto atualizado com sucesso! </p>";
  } else {
   echo "<p> Não foi possível atualizar o produto. Verifique se o ID pesquisado existe. </p>";
  }
 }
 // Excluir produtos com estoque menor que o valor informado no formulário
 function deleteEstoque($conexao, $nomeTabela){
  $estoqueMinimo = trim($conexao->escape_string($_POST['estoque-minimo']));

  $sql = "DELETE FROM $nomeTabela WHERE estoque < $estoqueMinimo";
  $conexao->query($sql) or die($conexao->error);

  // Antes de mostrarmos uma mensagem ao usuario testamos se algum registro foi excluído no banco de dados
  if($conexao->affected_rows > 0){
   echo "<p> Produtos excluídos com sucesso! </p>";
  } else {
   echo "<p> Não há nenhum produto com o estoque com este número </p>";
  }
 }

}