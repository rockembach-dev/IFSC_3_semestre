<?php
  
Class carro {

  public $fabricante, $modelo, $preco;

  function __construct()
  {
   $formFabricante = $_POST['fabricante'];
   $formModelo = $_POST['modelo'];
   $formPreco = $_POST['preco'];

  //atribuindo os dados do formulário às variáveis de instância da classe
   $this->fabricante = $formFabricante;
   $this->modelo = $formModelo;
   $this->preco = $formPreco;

  }

  //método para exibir a classificação do carro de acordo com o preço
  function classifica()
  {
   if($this->preco <= 100000)
    {
      echo "<p> INFORMAÇÕES DO CARRO POPULAR <br>
         Fabricante = $this->fabricante <br>
         Modelo = $this->modelo <br>
         Preço = $this->preco <br>
        </p>";
    } 
    else if($this-> preco <= 300000)
     {
      echo "<p> CARRO INCLUSIVE - PERFORMANCE INTERMEDIÁRIA !! </P>";
     }
     else
      {
       echo "<p> CARRO DE ALTA PERFORMANCE !! </P>";
      }
  }


}
?>