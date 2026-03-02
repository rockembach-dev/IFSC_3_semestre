<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <title>Document</title>
</head>
<body>
 
   <h1> Fundamentos do PHP com POO - exemplo 3 </h1>

<?php

   require "exerc3.inc.php";

   $objConta1 = new ContaBancaria(5000);
   $objConta2 = new ContaBancaria(10000);


   //depositar
   $objConta1->depositar(135);
   $objConta2->depositar(309);

   //sacar
   $objConta1->saque(5000);
   $objConta2->saque(10000);

   //acessar saldo
   $saldoAtual1 = $objConta1->mostrarSaldo();
   $saldoAtual2 = $objConta2->mostrarSaldo();

   echo "<p> Após as operações de saque e deposito, seu saldo atual para ambas as contas, é o seguinte : <br> 
   CONTA 1 = R$$saldoAtual1 <br>
   CONTA 2 = R$$saldoAtual2 </p> ";

?> 
  
</body>
</html>