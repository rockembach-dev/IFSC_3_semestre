<?php

  Class itemInformatica {

  public $nome, $opcao, $preco;

  function __construct()
  {
   $formNome = $_POST['nome'];
   $formOpcao = $_POST['opcao'];
   $formPreco = $_POST['preco'];


   $this->nome = $formNome;
   $this->opcao = $formOpcao;
   $this->preco = $formPreco;
  }

  function desconto()
  {
   if($this->opcao == "software")
    {
     return $this->preco * 0.05;
    }
    else
     {
      return $this->preco * 0.07;
     }
  }

  function mostrarDados()
  {
   // ". ." == concatenação de métodos em PHP
   echo "<p> DADOS DO ITEM CADASTRADO  <br>
         Item = $this->nome   <br>
         Categoria = $this->opcao <br>
         Preco = R$$this->preco <br>
         Desconto = " . $this-> desconto() . "% <br>
         Preço Final = R$" . $this->preco - $this-> desconto() . "
         </p>";
  }

  }






?>