<!DOCTYPE html>
<html lang="pt-BR">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/style.css">

 <title> Sistema de Cadastro </title>
</head>
<body>
  <h1> Cadastro de usuário </h1>

  <form action="cadastro.php" method="post">
   <fieldset>
    <legend> Módulo de cadastro de usuário </legend>

    <label class="alinha"> Nome Completo: </label>
    <input type="text" name="nome">

    <label class="alinha"> E-mail: </label>
    <input type="text" name="email">

    <label class="alinha"> Nome de Usuário: </label>
    <input type="text" name="username">

    <label class="alinha"> Senha: </label>
    <input type="password" name="senha">

   <div>
    <button name="cadastrar"> Cadastrar usuário </button>
    </div> 
   </fieldset>
  </form>
 
</body>
</html>