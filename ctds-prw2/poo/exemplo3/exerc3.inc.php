<?php

class ContaBancaria
{

   public $saldo;


   function __construct($inicializaSaldo)
   {
   $this->saldo = $inicializaSaldo;
   }


   function depositar($valor)
   {
    $this->saldo +=  $valor;
   }

   function saque($valor)
   {
    if($this->saldo < $valor)
     {
      echo "<p> ... </p> ";
     }
     else{
    $this->saldo -= $valor;
     }
   }

   function mostrarSaldo()
   {
    return $this->saldo;
   }
}








?>