<?php
 //declarando a classe Item

 class Item 
 {
  //definindo os atributos ou variáveis de instância

  public $nome;
  public $preco;
  public $categoria;

  //método que retorna a categoria do item
  function getCategoria()
  {
   return $this-> categoria; //NOTE BEM: dentro de um método, o uso de um atributo nunca leva o $
  }

  //método que modificao preço de um item
  function setPreco($novoPreco)
  {
   $this->preco = $novoPreco;
  }

  //método para mostrar o preço de um item
  function getPreco()
  {
   return $this->preco;
  }
 } 



 ?>