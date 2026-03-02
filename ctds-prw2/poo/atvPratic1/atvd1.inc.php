<?php
 
 class Livro {

  public $titulo,  $autor, $isbn, $preco, $desc;

  function __construct()
  {
   $formTitulo = $_POST["titulo"];
   $formAutor = $_POST["autor"];
   $formISBN = $_POST["isbn"];
   $formPreco = $_POST["preco"];
   $formDesc = $_POST["desconto"];

   //atribuindo os dados do formulário às variáveis de instância da classe
   $this->titulo = $formTitulo;
   $this->autor = $formAutor;
   $this->isbn = $formISBN; 
   $this->preco = $formPreco;
   $this->desc = $formDesc;
  
  }

  function calcularDesconto()
  {
   $desconto = $this->preco * ($this->desc/100);
   $this->preco -= $desconto;
  }

  function mostrarDados()
  {
   echo "<p> Dados atualizados do livro cadastrado, após o deconto: <br>
   Título = $this->titulo <br>
   Autor = $this->autor <br>
   ISBN = $this->isbn <br> 
   Preço = R$$this->preco </p>";
  }
  
 }




?>